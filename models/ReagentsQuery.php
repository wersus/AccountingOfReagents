<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Reagents]].
 *
 * @see Reagents
 */
class ReagentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Reagents[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Reagents|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
