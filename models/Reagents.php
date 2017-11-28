<?php

namespace app\models;

use Yii;
use \app\models\base\Reagents as BaseReagents;

/**
 * This is the model class for table "reagents".
 */
class Reagents extends BaseReagents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['guid', 'name', 'formula', 'short', 'short_formula'], 'string'],
            [['deleted_by', 'updated_by', 'lock'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['liquid'], 'boolean'],
            [['density'], 'number'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
