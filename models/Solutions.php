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
            [['guid', 'name'], 'string'],
            [['deleted_by', 'updated_by', 'lock', 'id_shelf_lifes', 'id_concentrations'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
