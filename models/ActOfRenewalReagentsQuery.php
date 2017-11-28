<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ActOfRenewalReagents]].
 *
 * @see ActOfRenewalReagents
 */
class ActOfRenewalReagentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ActOfRenewalReagents[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ActOfRenewalReagents|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
