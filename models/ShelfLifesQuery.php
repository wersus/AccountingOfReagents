<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShelfLifes]].
 *
 * @see ShelfLifes
 */
class ShelfLifesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ShelfLifes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShelfLifes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
