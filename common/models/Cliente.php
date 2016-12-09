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
 * @property Inmueble[] $inmuebles
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
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'prioridad' => Yii::t('app', 'Prioridad'),
            'telefono' => Yii::t('app', 'Telefono'),
            'email' => Yii::t('app', 'Email'),
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
    public function getInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['idCliente' => 'id']);
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

    /**
     * @inheritdoc
     * @return ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClienteQuery(get_called_class());
    }
}
