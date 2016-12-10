<?php

namespace common\models;

use Yii;

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
    public $tipo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inmueble';
    }
    function afterFind(){ 
        if($this->getTipo()->one() != null);
        $this->tipo = $this->getTipo()->one();
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
             [['tipo',], 'safe'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipo0()
    {
        return $this->hasOne(TipoInmueble::className(), ['id' => 'idTipo']);
    }
    public function getTipo()
    {
        return $this->hasOne(TipoInmueble::className(), ['id' => 'idTipo']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
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
}
