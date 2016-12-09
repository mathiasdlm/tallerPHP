<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoInmueble".
 *
 * @property integer $id
 * @property string $Nombre
 *
 * @property Inmueble[] $inmuebles
 */
class TipoInmueble extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoInmueble';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['idTipo' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TipoInmuebleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoInmuebleQuery(get_called_class());
    }
}
