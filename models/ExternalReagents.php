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
            [['guid', 'document', 'description'], 'string'],
            [['weight', 'volume'], 'double'],
            [['deleted_by', 'updated_by', 'lock', 'id_manufacturers', 'id_reagents', 'batch', 'id_qualifications', 'id_shelf_lifes'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'create_date', 'best_before'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
