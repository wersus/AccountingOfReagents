<?php

namespace app\models;

use Yii;
use \app\models\base\SolutionToExternalReagents as BaseSolutionToExternalReagents;

/**
 * This is the model class for table "solution_to_external_reagents".
 */
class SolutionToExternalReagents extends BaseSolutionToExternalReagents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_solutions', 'id_solutions_two', 'id_methods', 'id_reagents', 'part'], 'integer'],
            [['id_methods'], 'required'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
