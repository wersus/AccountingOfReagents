<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "measurements".
 *
 * @property string $guid
 * @property integer $deleted_by
 * @property integer $updated_by
 * @property integer $lock
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $id
 * @property string $date
 * @property double $mass_consentarion
 * @property double $Kk
 * @property double $control standard
 *
 * @property \app\models\ActOfRenewalReagents[] $actOfRenewalReagents
 */
class Measurements extends \yii\db\ActiveRecord
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
            'actOfRenewalReagents'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid'], 'string'],
            [['deleted_by', 'updated_by', 'lock'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'date'], 'safe'],
            [['mass_consentarion', 'Kk', 'control standard'], 'number'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'measurements';
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
            'date' => Yii::t('app', 'Date'),
            'mass_consentarion' => Yii::t('app', 'Mass Consentarion'),
            'Kk' => Yii::t('app', 'Kk'),
            'control standard' => Yii::t('app', 'Control Standard'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActOfRenewalReagents()
    {
        return $this->hasMany(\app\models\ActOfRenewalReagents::className(), ['id_measurements' => 'id']);
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
     * @return \app\models\MeasurementsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return parent::find()->where(['deleted_by' => null])->orWhere(['deleted_by' => 0]);
    }
}
