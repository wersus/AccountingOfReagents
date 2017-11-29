<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "internal_solutions".
 *
 * @property string $guid
 * @property integer $deleted_by
 * @property integer $updated_by
 * @property integer $lock
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $id
 * @property string $create_date
 * @property string $best_before
 * @property integer $volume
 * @property string $description
 * @property integer $id_solutions
 *
 * @property \app\models\Solutions $solutions
 * @property \app\models\WriteOffs[] $writeOffs
 */
class InternalSolutions extends \yii\db\ActiveRecord
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
            'solutions',
            'writeOffs'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'description'], 'string'],
            [['deleted_by', 'updated_by', 'lock', 'volume', 'id_solutions'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'create_date', 'best_before'], 'safe'],
            [['best_before', 'id_solutions'], 'required'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'internal_solutions';
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
            'create_date' => Yii::t('app', 'Create Date'),
            'best_before' => Yii::t('app', 'Best Before'),
            'volume' => Yii::t('app', 'Volume'),
            'description' => Yii::t('app', 'Description'),
            'id_solutions' => Yii::t('app', 'Id Solutions'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasOne(\app\models\Solutions::className(), ['id' => 'id_solutions']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWriteOffs()
    {
        return $this->hasMany(\app\models\WriteOffs::className(), ['id_internal_solutions_two' => 'id']);
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
     * @return \app\models\InternalSolutionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return parent::find()->where(['deleted_by' => null])->orWhere(['deleted_by' => 0]);
    }
}
