<?php

namespace app\models;

use Yii;
use \app\models\base\Solutions as BaseSolutions;

/**
 * This is the model class for table "solutions".
 */
class Solutions extends BaseSolutions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_shelf_lifes', 'id_concentrations'], 'integer'],
            [['name'], 'string'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
