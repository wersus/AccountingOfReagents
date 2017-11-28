<?php

namespace app\models;

use Yii;
use \app\models\base\InternalSolutions as BaseInternalSolutions;

/**
 * This is the model class for table "internal_solutions".
 */
class InternalSolutions extends BaseInternalSolutions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['guid', 'description'], 'string'],
            [['deleted_by', 'updated_by', 'lock', 'volume', 'id_solutions'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'create_date', 'best_before'], 'safe'],
            [['best_before', 'id_solutions'], 'required'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
