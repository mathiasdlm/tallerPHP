<?php

namespace app\models;

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
            'id' => Yii::t('app', 'ID'),
            'horaDesde' => Yii::t('app', 'Hora Desde'),
            'horaHasta' => Yii::t('app', 'Hora Hasta'),
            'idCliente' => Yii::t('app', 'Id Cliente'),
            'idInmueble' => Yii::t('app', 'Id Inmueble'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'idCliente']);
    }

    /**
     * @inheritdoc
     * @return HorarioAtencionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HorarioAtencionQuery(get_called_class());
    }
}
