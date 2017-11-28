<?php

namespace app\models;

use Yii;
use \app\models\base\Concentrations as BaseConcentrations;

/**
 * This is the model class for table "concentrations".
 */
class Concentrations extends BaseConcentrations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'short_name'], 'string'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
