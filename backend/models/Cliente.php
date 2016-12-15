<?php

namespace backend\models;

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
            [['nombre', 'telefono', 'email'], 'required'],
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
    public function getInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['idCliente' => 'id']);
    }
}
