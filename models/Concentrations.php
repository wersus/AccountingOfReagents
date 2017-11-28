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
            [['guid', 'name', 'short_name'], 'string'],
            [['deleted_by', 'updated_by', 'lock'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
