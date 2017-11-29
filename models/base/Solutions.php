<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "solutions".
 *
 * @property string $guid
 * @property integer $deleted_by
 * @property integer $updated_by
 * @property integer $lock
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $id
 * @property integer $id_shelf_lifes
 * @property string $name
 * @property integer $id_concentrations
 *
 * @property \app\models\InternalSolutions[] $internalSolutions
 * @property \app\models\SolutionToExternalReagents[] $solutionToExternalReagents
 * @property \app\models\Concentrations $concentrations
 * @property \app\models\ShelfLifes $shelfLifes
 */
class Solutions extends \yii\db\ActiveRecord
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
            'internalSolutions',
            'solutionToExternalReagents',
            'concentrations',
            'shelfLifes'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'name'], 'string'],
            [['deleted_by', 'updated_by', 'lock', 'id_shelf_lifes', 'id_concentrations'], 'integer'],
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
        return 'solutions';
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
            'id_shelf_lifes' => Yii::t('app', 'Id Shelf Lifes'),
            'name' => Yii::t('app', 'Name'),
            'id_concentrations' => Yii::t('app', 'Id Concentrations'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInternalSolutions()
    {
        return $this->hasMany(\app\models\InternalSolutions::className(), ['id_solutions' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionToExternalReagents()
    {
        return $this->hasMany(\app\models\SolutionToExternalReagents::className(), ['id_solutions_two' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcentrations()
    {
        return $this->hasOne(\app\models\Concentrations::className(), ['id' => 'id_concentrations']);
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
     * @return \app\models\SolutionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\SolutionsQuery(get_called_class());
        return $query->where(['solutions.deleted_by' => 0]);
    }
}
