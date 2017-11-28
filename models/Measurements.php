<?php

namespace app\models;

use Yii;
use \app\models\base\Measurements as BaseMeasurements;

/**
 * This is the model class for table "measurements".
 */
class Measurements extends BaseMeasurements
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['guid'], 'string'],
            [['deleted_by', 'updated_by', 'lock'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'date'], 'safe'],
            [['mass_consentarion', 'Kk', 'control standard'], 'number'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
