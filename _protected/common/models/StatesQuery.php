<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[States]].
 *
 * @see States
 */
class StatesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return States[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return States|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}