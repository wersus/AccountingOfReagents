<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Methods]].
 *
 * @see Methods
 */
class MethodsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Methods[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Methods|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
