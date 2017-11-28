<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Solutions]].
 *
 * @see Solutions
 */
class SolutionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Solutions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Solutions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
