<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Favoritos]].
 *
 * @see Favoritos
 */
class FavoritosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Favoritos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Favoritos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
