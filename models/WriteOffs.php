<?php

namespace app\models;

use Yii;
use \app\models\base\WriteOffs as BaseWriteOffs;

/**
 * This is the model class for table "write_offs".
 */
class WriteOffs extends BaseWriteOffs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['guid', 'reason'], 'string'],
            [['deleted_by', 'updated_by', 'lock', 'id_external_reagents', 'id_internal_solutions', 'id_internal_solutions_two', 'volume', 'weight'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
