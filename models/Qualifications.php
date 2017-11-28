<?php

namespace app\models;

use Yii;
use \app\models\base\Qualifications as BaseQualifications;

/**
 * This is the model class for table "qualifications".
 */
class Qualifications extends BaseQualifications
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['guid', 'name', 'short'], 'string'],
            [['deleted_by', 'updated_by', 'lock'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
