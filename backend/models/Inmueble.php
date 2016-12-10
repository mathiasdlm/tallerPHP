<?php

namespace backend\models;

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
 * @property Cliente $idCliente0
 * @property TipoInmueble $idTipo0
 */
class Inmueble extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inmueble';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'lat', 'lon', 'cantDormitorios', 'cantBanos', 'idTipo', 'idCliente'], 'required'],
            [['lat', 'lon'], 'number'],
            [['cantDormitorios', 'cantBanos', 'metrosTotales', 'metrosEdificados', 'cochera', 'patio', 'idTipo', 'idCliente'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['idCliente' => 'id']],
            [['idTipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoInmueble::className(), 'targetAttribute' => ['idTipo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'lat' => 'Lat',
            'lon' => 'Lon',
            'cantDormitorios' => 'Cant Dormitorios',
            'cantBanos' => 'Cant Banos',
            'metrosTotales' => 'Metros Totales',
            'metrosEdificados' => 'Metros Edificados',
            'cochera' => 'Cochera',
            'patio' => 'Patio',
            'idTipo' => 'Id Tipo',
            'idCliente' => 'Id Cliente',
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
    public function getIdCliente0()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'idCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipo0()
    {
        return $this->hasOne(TipoInmueble::className(), ['id' => 'idTipo']);
    }
}
