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
            [['id_external_reagents', 'id_internal_solutions', 'id_internal_solutions_two', 'volume', 'weight', 'id_users'], 'integer'],
            [['reason'], 'string'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
