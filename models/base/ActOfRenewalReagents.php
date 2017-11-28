<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "act_of_renewal_reagents".
 *
 * @property string $guid
 * @property integer $deleted_by
 * @property integer $updated_by
 * @property integer $lock
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $id
 * @property integer $id_external_reagents
 * @property string $best_before
 * @property string $date
 * @property integer $id_shelf_lifes
 * @property integer $id_methods
 * @property integer $relative_error
 * @property integer $id_measurements
 * @property string $conclusion
 *
 * @property \app\models\ExternalReagents $externalReagents
 * @property \app\models\Measurements $measurements
 * @property \app\models\Methods $methods
 * @property \app\models\ShelfLifes $shelfLifes
 */
class ActOfRenewalReagents extends \yii\db\ActiveRecord
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
            'externalReagents',
            'measurements',
            'methods',
            'shelfLifes'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'conclusion'], 'string'],
            [['deleted_by', 'updated_by', 'lock', 'id_external_reagents', 'id_shelf_lifes', 'id_methods', 'relative_error', 'id_measurements'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'best_before', 'date'], 'safe'],
            [['id_methods'], 'required'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'act_of_renewal_reagents';
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
            'id_external_reagents' => Yii::t('app', 'Id External Reagents'),
            'best_before' => Yii::t('app', 'Best Before'),
            'date' => Yii::t('app', 'Date'),
            'id_shelf_lifes' => Yii::t('app', 'Id Shelf Lifes'),
            'id_methods' => Yii::t('app', 'Id Methods'),
            'relative_error' => Yii::t('app', 'Relative Error'),
            'id_measurements' => Yii::t('app', 'Id Measurements'),
            'conclusion' => Yii::t('app', 'Conclusion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExternalReagents()
    {
        return $this->hasOne(\app\models\ExternalReagents::className(), ['id' => 'id_external_reagents']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeasurements()
    {
        return $this->hasOne(\app\models\Measurements::className(), ['id' => 'id_measurements']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMethods()
    {
        return $this->hasOne(\app\models\Methods::className(), ['id' => 'id_methods']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShelfLifes()
    {
        return $this->hasOne(\app\models\ShelfLifes::className(), ['id' => 'id_shelf_lifes']);
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
     * @return \app\models\ActOfRenewalReagentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\ActOfRenewalReagentsQuery(get_called_class());
        return $query->where(['act_of_renewal_reagents.deleted_by' => 0]);
    }
}
