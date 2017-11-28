<?php

namespace app\models;

use Yii;
use \app\models\base\ActOfRenewalReagents as BaseActOfRenewalReagents;

/**
 * This is the model class for table "act_of_renewal_reagents".
 */
class ActOfRenewalReagents extends BaseActOfRenewalReagents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_external_reagents', 'id_shelf_lifes', 'id_methods', 'relative_error', 'id_users', 'id_measurements'], 'integer'],
            [['best_before', 'date'], 'safe'],
            [['id_methods'], 'required'],
            [['conclusion'], 'string'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
