<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $activado
 *
 * @property Favoritos[] $favoritos
 * @property Inmueble[] $idInmuebles
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface, \OAuth2\Storage\UserCredentialsInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 10;
    const STATUS_ACTIVE = 20;
    
    public $handshake_code = null;
    public $return_url = null;
    
    private $access_token = null;   
    private $fb_data = array();
    
    public $fb_id;
    public $fb_name;        
        
    

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Activo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
           
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasMany(Favoritos::className(), ['idUser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['id' => 'idInmueble'])->viaTable('favoritos', ['idUser' => 'id']);
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        /** @var \filsh\yii2\oauth2server\Module $module */
        $module = Yii::$app->getModule('oauth2');
        $token = $module->getServer()->getResourceController()->getToken();

        return !empty($token['user_id'])
                    ? static::findIdentity($token['user_id'])
                    : null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function authenticate()
        {       
                
                $url = "https://graph.facebook.com/oauth/access_token"
                ."?client_id=".Yii::$app->params['FB_APP_ID']
                ."&redirect_uri={$this->return_url}"
                ."&client_secret=".Yii::$app->params['FB_SECRET_KEY']
                ."&code=".$this->handshake_code;
                
                $response = file_get_contents($url);
                if (empty($response))                   
                        throw new CHttpException(500, 'Problem z autoryzacjÄ…!');
                $response = str_replace("access_token=","", $response);
                
                $this->access_token = $response;
                
                
                // retrieve user ID
                $url = "https://graph.facebook.com/me?access_token=".$response;
                $response = file_get_contents($url);
                if (empty($response))                   
                        throw new CHttpException(500, 'Problem z pobraniem danych profilu!');
                        
                $data = json_decode($response);
                
                $this->fb_id = $data->id;               
                $this->fb_data = $data;
                $this->fb_name = $data->name;
                $exist = static::findOne(["auth_key" => $this->fb_id]);
                 
                if(!isset($exist)){
                    $date = date_create();
                    $usr = new User();
                    $usr->email = $this->fb_name;
                    $usr->username = $this->fb_name;
                    $usr->auth_key = $this->fb_id;
                    $usr->status = User::STATUS_ACTIVE;   
                    $usr->setPassword($this->fb_id);
                    $usr->password_reset_token = $this->fb_id;
                    $usr->created_at =date_timestamp_get($date);
                    $usr->updated_at = date_timestamp_get($date);
                    $saved = $usr->save();
                    Yii::$app->user->login($usr,  3600 * 24 * 30 );
                }else{
                    Yii::$app->user->login( $exist,  3600 * 24 * 30 );
                }
                
                return !empty($this->fb_id) && ($this->fb_id > 0);                
               
        }
    
    public function checkUserCredentials($username, $password)
    {
        $user = static::findByEmail($username);
        if (empty($user)) {
            return false;
        }
        return $user->validatePassword($password);
    }

    public function getUserDetails($username)
    {
        $user = static::findByEmail($username);
        return ['user_id' => $user->getId()];
    }

     public function getEstado($id)
    {
        if($this->findIdentity($id)){
            return 'Activo';
        }else{
            return 'Inactivo';
        }
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

 
}
