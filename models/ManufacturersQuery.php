<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Manufacturers]].
 *
 * @see Manufacturers
 */
class ManufacturersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Manufacturers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Manufacturers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
