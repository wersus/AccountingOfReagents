<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "external_reagents".
 *
 * @property string $guid
 * @property integer $deleted_by
 * @property integer $updated_by
 * @property integer $lock
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $id
 * @property integer $id_manufacturers
 * @property string $create_date
 * @property integer $id_reagents
 * @property string $document
 * @property string $best_before
 * @property integer $batch
 * @property integer $weight
 * @property integer $volume
 * @property integer $id_qualifications
 * @property string $description
 * @property integer $id_shelf_lifes
 *
 * @property \app\models\ActOfRenewalReagents[] $actOfRenewalReagents
 * @property \app\models\Manufacturers $manufacturers
 * @property \app\models\Qualifications $qualifications
 * @property \app\models\Reagents $reagents
 * @property \app\models\ShelfLifes $shelfLifes
 * @property \app\models\WriteOffs[] $writeOffs
 */
class ExternalReagents extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => \Yii::$app->user->id,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
    }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'actOfRenewalReagents',
            'manufacturers',
            'qualifications',
            'reagents',
            'shelfLifes',
            'writeOffs'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'document', 'description'], 'string'],
            [['deleted_by', 'updated_by', 'lock', 'id_manufacturers', 'id_reagents', 'batch', 'weight', 'volume', 'id_qualifications', 'id_shelf_lifes'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'create_date', 'best_before'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'external_reagents';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'lock' => Yii::t('app', 'Lock'),
            'id' => Yii::t('app', 'ID'),
            'id_manufacturers' => Yii::t('app', 'Id Manufacturers'),
            'create_date' => Yii::t('app', 'Create Date'),
            'id_reagents' => Yii::t('app', 'Id Reagents'),
            'document' => Yii::t('app', 'Document'),
            'best_before' => Yii::t('app', 'Best Before'),
            'batch' => Yii::t('app', 'Batch'),
            'weight' => Yii::t('app', 'Weight'),
            'volume' => Yii::t('app', 'Volume'),
            'id_qualifications' => Yii::t('app', 'Id Qualifications'),
            'description' => Yii::t('app', 'Description'),
            'id_shelf_lifes' => Yii::t('app', 'Id Shelf Lifes'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActOfRenewalReagents()
    {
        return $this->hasMany(\app\models\ActOfRenewalReagents::className(), ['id_external_reagents' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturers()
    {
        return $this->hasOne(\app\models\Manufacturers::className(), ['id' => 'id_manufacturers']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQualifications()
    {
        return $this->hasOne(\app\models\Qualifications::className(), ['id' => 'id_qualifications']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagents()
    {
        return $this->hasOne(\app\models\Reagents::className(), ['id' => 'id_reagents']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShelfLifes()
    {
        return $this->hasOne(\app\models\ShelfLifes::className(), ['id' => 'id_shelf_lifes']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWriteOffs()
    {
        return $this->hasMany(\app\models\WriteOffs::className(), ['id_external_reagents' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'guid',
            ],
        ];
    }

    /**
     * The following code shows how to apply a default condition for all queries:
     *
     * ```php
     * class Customer extends ActiveRecord
     * {
     *     public static function find()
     *     {
     *         return parent::find()->where(['deleted' => false]);
     *     }
     * }
     *
     * // Use andWhere()/orWhere() to apply the default condition
     * // SELECT FROM customer WHERE `deleted`=:deleted AND age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     *
     * // Use where() to ignore the default condition
     * // SELECT FROM customer WHERE age>30
     * $customers = Customer::find()->where('age>30')->all();
     * ```
     */

    /**
     * @inheritdoc
     * @return \app\models\ExternalReagentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\ExternalReagentsQuery(get_called_class());
        return $query->where(['external_reagents.deleted_by' => 0]);
    }
}
