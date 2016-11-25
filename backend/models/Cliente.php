<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $prioridad
 * @property string $telefono
 * @property string $email
 *
 * @property HorarioAtencion[] $horarioAtencions
 * @property InmuebleCliente[] $inmuebleClientes
 * @property Inmueble[] $idInmuebles
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'prioridad', 'telefono', 'email'], 'required'],
            [['prioridad'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['telefono', 'email'], 'string', 'max' => 20],
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
            'prioridad' => 'Prioridad',
            'telefono' => 'Telefono',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarioAtencions()
    {
        return $this->hasMany(HorarioAtencion::className(), ['idCliente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebleClientes()
    {
        return $this->hasMany(InmuebleCliente::className(), ['idCliente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['id' => 'idInmueble'])->viaTable('inmuebleCliente', ['idCliente' => 'id']);
    }
}
