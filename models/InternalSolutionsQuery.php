<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[InternalSolutions]].
 *
 * @see InternalSolutions
 */
class InternalSolutionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return InternalSolutions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InternalSolutions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
