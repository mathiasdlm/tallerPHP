<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HorarioAtencion]].
 *
 * @see HorarioAtencion
 */
class HorarioAtencionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return HorarioAtencion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HorarioAtencion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
