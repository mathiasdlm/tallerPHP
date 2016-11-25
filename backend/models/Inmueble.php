<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inmueble".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $coordenadas
 * @property integer $cantDormitorios
 * @property integer $cantBanos
 * @property integer $metrosTotales
 * @property integer $metrosEdificados
 * @property integer $cochera
 * @property integer $patio
 * @property integer $idTipo
 *
 * @property TipoInmueble $id0
 * @property InmuebleCliente[] $inmuebleClientes
 * @property Cliente[] $idClientes
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
            [['nombre', 'coordenadas', 'cantDormitorios', 'cantBanos', 'metrosTotales', 'metrosEdificados', 'cochera', 'patio', 'idTipo'], 'required'],
            [['coordenadas'], 'string'],
            [['cantDormitorios', 'cantBanos', 'metrosTotales', 'metrosEdificados', 'cochera', 'patio', 'idTipo'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoInmueble::className(), 'targetAttribute' => ['id' => 'id']],
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
            'coordenadas' => 'Coordenadas',
            'cantDormitorios' => 'Cant Dormitorios',
            'cantBanos' => 'Cant Banos',
            'metrosTotales' => 'Metros Totales',
            'metrosEdificados' => 'Metros Edificados',
            'cochera' => 'Cochera',
            'patio' => 'Patio',
            'idTipo' => 'Id Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(TipoInmueble::className(), ['id' => 'id']);
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
}
