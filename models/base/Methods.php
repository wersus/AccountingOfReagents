<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "methods".
 *
 * @property string $guid
 * @property integer $deleted_by
 * @property integer $updated_by
 * @property integer $lock
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $id
 * @property string $name
 * @property string $short
 * @property string $document
 * @property string $index
 *
 * @property \app\models\ActOfRenewalReagents[] $actOfRenewalReagents
 * @property \app\models\SolutionToExternalReagents[] $solutionToExternalReagents
 */
class Methods extends \yii\db\ActiveRecord
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
            'solutionToExternalReagents'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'name', 'short', 'document', 'index'], 'string'],
            [['deleted_by', 'updated_by', 'lock'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'methods';
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
            'name' => Yii::t('app', 'Name'),
            'short' => Yii::t('app', 'Short'),
            'document' => Yii::t('app', 'Document'),
            'index' => Yii::t('app', 'Index'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActOfRenewalReagents()
    {
        return $this->hasMany(\app\models\ActOfRenewalReagents::className(), ['id_methods' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionToExternalReagents()
    {
        return $this->hasMany(\app\models\SolutionToExternalReagents::className(), ['id_methods' => 'id']);
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
     * @return \app\models\MethodsQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\MethodsQuery(get_called_class());
        return $query->where(['methods.deleted_by' => 0]);
    }
}