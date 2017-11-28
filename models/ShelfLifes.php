<?php

namespace app\models;

use Yii;
use \app\models\base\ShelfLifes as BaseShelfLifes;

/**
 * This is the model class for table "shelf_lifes".
 */
class ShelfLifes extends BaseShelfLifes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['value'], 'integer'],
            [['short'], 'string'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
