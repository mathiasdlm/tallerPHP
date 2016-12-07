<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "favoritos".
 *
 * @property integer $idInmueble
 * @property integer $idUser
 *
 * @property Inmueble $idInmueble0
 * @property User $idUser0
 */
class Favoritos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favoritos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInmueble', 'idUser'], 'required'],
            [['idInmueble', 'idUser'], 'integer'],
            [['idInmueble'], 'exist', 'skipOnError' => true, 'targetClass' => Inmueble::className(), 'targetAttribute' => ['idInmueble' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInmueble' => 'Id Inmueble',
            'idUser' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInmueble0()
    {
        return $this->hasOne(Inmueble::className(), ['id' => 'idInmueble']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
}
