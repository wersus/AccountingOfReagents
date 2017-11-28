<?php

namespace app\models;

use Yii;
use \app\models\base\Manufacturers as BaseManufacturers;

/**
 * This is the model class for table "manufacturers".
 */
class Manufacturers extends BaseManufacturers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'short'], 'string'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
