<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "solution_to_external_reagents".
 *
 * @property string $guid
 * @property integer $deleted_by
 * @property integer $updated_by
 * @property integer $lock
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $id
 * @property integer $id_solutions
 * @property integer $id_solutions_two
 * @property integer $id_methods
 * @property integer $id_reagents
 * @property integer $part
 *
 * @property \app\models\Methods $methods
 * @property \app\models\Reagents $reagents
 * @property \app\models\Solutions $solutions
 * @property \app\models\Solutions $solutionsTwo
 */
class SolutionToExternalReagents extends \yii\db\ActiveRecord
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
            'methods',
            'reagents',
            'solutions',
            'solutionsTwo'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid'], 'string'],
            [['deleted_by', 'updated_by', 'lock', 'id_solutions', 'id_solutions_two', 'id_methods', 'id_reagents', 'part'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        return 'solution_to_external_reagents';
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
            'id_solutions' => Yii::t('app', 'Id Solutions'),
            'id_solutions_two' => Yii::t('app', 'Id Solutions Two'),
            'id_methods' => Yii::t('app', 'Id Methods'),
            'id_reagents' => Yii::t('app', 'Id Reagents'),
            'part' => Yii::t('app', 'Part'),
        ];
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
    public function getReagents()
    {
        return $this->hasOne(\app\models\Reagents::className(), ['id' => 'id_reagents']);
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
    public function getSolutionsTwo()
    {
        return $this->hasOne(\app\models\Solutions::className(), ['id' => 'id_solutions_two']);
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
     * @return \app\models\SolutionToExternalReagentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\SolutionToExternalReagentsQuery(get_called_class());
        return $query->where(['solution_to_external_reagents.deleted_by' => 0]);
    }
}
