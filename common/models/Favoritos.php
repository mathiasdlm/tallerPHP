<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favoritos".
 *
 * @property integer $idInmueble
 * @property integer $idUser
 *
 * @property User $idUser0
 * @property Inmueble $idInmueble0
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
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
            [['idInmueble'], 'exist', 'skipOnError' => true, 'targetClass' => Inmueble::className(), 'targetAttribute' => ['idInmueble' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInmueble' => Yii::t('app', 'Id Inmueble'),
            'idUser' => Yii::t('app', 'Id User'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInmueble0()
    {
        return $this->hasOne(Inmueble::className(), ['id' => 'idInmueble']);
    }

    /**
     * @inheritdoc
     * @return FavoritosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FavoritosQuery(get_called_class());
    }
}
