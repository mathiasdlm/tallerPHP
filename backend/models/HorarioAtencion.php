<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "horarioAtencion".
 *
 * @property integer $id
 * @property string $horaDesde
 * @property string $horaHasta
 * @property integer $idCliente
 * @property integer $idInmueble
 *
 * @property Cliente $idCliente0
 */
class HorarioAtencion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horarioAtencion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['horaDesde', 'horaHasta', 'idCliente', 'idInmueble'], 'required'],
            [['horaDesde', 'horaHasta'], 'safe'],
            [['idCliente', 'idInmueble'], 'integer'],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['idCliente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'horaDesde' => 'Hora Desde',
            'horaHasta' => 'Hora Hasta',
            'idCliente' => 'Id Cliente',
            'idInmueble' => 'Id Inmueble',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'idCliente']);
    }
}
