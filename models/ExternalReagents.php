<?php

namespace app\models;

use Yii;
use \app\models\base\ExternalReagents as BaseExternalReagents;

/**
 * This is the model class for table "external_reagents".
 */
class ExternalReagents extends BaseExternalReagents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_manufacturers', 'id_reagents', 'batch', 'weight', 'volume', 'id_qualifications', 'id_users', 'id_shelf_lifes'], 'integer'],
            [['create_date', 'best_before'], 'safe'],
            [['document', 'description'], 'string'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
