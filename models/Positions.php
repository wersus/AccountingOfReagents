<?php

namespace app\models;

use Yii;
use \app\models\base\Positions as BasePositions;

/**
 * This is the model class for table "positions".
 */
class Positions extends BasePositions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'string'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
