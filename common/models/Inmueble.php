<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "inmueble".
 *
 * @property integer $id
 * @property string $nombre
 * @property double $lat
 * @property double $lon
 * @property integer $cantDormitorios
 * @property integer $cantBanos
 * @property integer $metrosTotales
 * @property integer $metrosEdificados
 * @property integer $cochera
 * @property integer $patio
 * @property integer $idTipo
 * @property integer $idCliente
 *
 * @property Favoritos[] $favoritos
 * @property User[] $idUsers
 * @property TipoInmueble $idTipo0
 * @property Cliente $idCliente0
 * @property InmuebleCliente[] $inmuebleClientes
 * @property Cliente[] $idClientes
 */
class Inmueble extends \yii\db\ActiveRecord
{
    public $tipoFiltro;
    public $upload_file1;
    public $upload_file2;
    public $upload_file3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inmueble';
    }

    public function fields()
    {
        return ['id', 'nombre', 'lat', 'lon', 'cantDormitorios', 'cantBanos', 'metrosTotales', 'metrosEdificados', 'cliente', 'tipo', 'cochera', 'patio', 'imagen1', 'imagen2', 'imagen3'];
    }

    function afterFind(){ 
        if($this->getTipo()->one() != null);
        $this->tipoFiltro = $this->getTipo()->one();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'lat', 'lon', 'cantDormitorios', 'cantBanos', 'metrosTotales', 'metrosEdificados', 'idTipo', 'idCliente'], 'required'],
            [['lat', 'lon'], 'number'],
            [['cantDormitorios', 'cantBanos', 'metrosTotales', 'metrosEdificados', 'cochera', 'patio', 'idTipo', 'idCliente'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['idTipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoInmueble::className(), 'targetAttribute' => ['idTipo' => 'id']],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['idCliente' => 'id']],
            [['tipoFiltro'], 'safe'],
            [['imagen1','imagen2','imagen3'], 'string', 'max' => 255],
            [['upload_file1'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['upload_file2'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['upload_file3'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'nombre' => Yii::t('app', 'Nombre'),
            'lat' => Yii::t('app', 'Lat'),
            'lon' => Yii::t('app', 'Lon'),
            'cantDormitorios' => Yii::t('app', 'Cant Dormitorios'),
            'cantBanos' => Yii::t('app', 'Cant Banos'),
            'metrosTotales' => Yii::t('app', 'Metros Totales'),
            'metrosEdificados' => Yii::t('app', 'Metros Edificados'),
            'cochera' => Yii::t('app', 'Cochera'),
            'patio' => Yii::t('app', 'Patio'),
            'idTipo' => Yii::t('app', 'Id Tipo'),
            'idCliente' => Yii::t('app', 'Id Cliente'),
            'upload_file1' => 'Agregar primera imagen:',
            'upload_file2' => 'Agregar suganda imagen:',
            'upload_file3' => 'Agregar tercer imagen: ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasMany(Favoritos::className(), ['idInmueble' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'idUser'])->viaTable('favoritos', ['idInmueble' => 'id']);
    }

    public function getTipo()
    {
        return $this->hasOne(TipoInmueble::className(), ['id' => 'idTipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'idCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebleClientes()
    {
        return $this->hasMany(InmuebleCliente::className(), ['idInmueble' => 'id']);
    }
   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClientes()
    {
        return $this->hasMany(Cliente::className(), ['id' => 'idCliente'])->viaTable('inmuebleCliente', ['idInmueble' => 'id']);
    }

    /**
     * @inheritdoc
     * @return InmuebleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InmuebleQuery(get_called_class());
    }

    public function uploadFile1() {
        // get the uploaded file instance
        $image = UploadedFile::getInstance($this, 'upload_file1');
 
        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }
 
        // generate random name for the file
        $this->imagen1 = time(). '1.' . $image->extension;
 
        // the uploaded image instance
        return $image;
    }
 
    public function getUploadedFile1() {
        // return a default image placeholder if your source avatar is not found
        $imagen1 = isset($this->imagen1) ? $this->imagen1 : 'default1.png';
        return Yii::$app->params['fileUploadUrl'] . $imagen1;
    }


    public function uploadFile2() {
        // get the uploaded file instance
        $image = UploadedFile::getInstance($this, 'upload_file2');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // generate random name for the file
        $this->imagen2 = time(). '2.' . $image->extension;

        // the uploaded image instance
        return $image;
    }
 
    public function getUploadedFile2() {
        // return a default image placeholder if your source avatar is not found
        $imagen2 = isset($this->imagen2) ? $this->imagen2 : 'default2.png';
        return Yii::$app->params['fileUploadUrl'] . $imagen2;
    }

    public function uploadFile3() {
        // get the uploaded file instance
        $image = UploadedFile::getInstance($this, 'upload_file3');
 
        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }
 
        // generate random name for the file
        $this->imagen3 = time(). '3.' . $image->extension;
 
        // the uploaded image instance
        return $image;
    }
 
    public function getUploadedFile3() {
        // return a default image placeholder if your source avatar is not found
        $imagen3 = isset($this->imagen3) ? $this->imagen3 : 'default3.png';
        return Yii::$app->params['fileUploadUrl'] . $imagen3;
    }
}
