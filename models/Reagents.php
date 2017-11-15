<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reagents".
 *
 * @property integer $id
 * @property string $name
 * @property integer $reagent_id
 * @property integer $manufacturer_id
 * @property integer $classification_id
 * @property integer $concentration_id
 * @property integer $method_id
 * @property string $create_date
 * @property integer $amount
 * @property string $formula
 * @property string $best_before
 * @property double $density
 * @property boolean $reagent_type
 * @property boolean $liquid
 * @property string $description
 *
 * @property Classification $classification
 * @property Concentration $concentration
 * @property Manufacturer $manufacturer
 * @property Method $method
 * @property ReagentsToReagents $reagent
 * @property ReagentsToReagents[] $reagentsToReagents
 * @property ReagentsToReagents[] $reagentsToReagents0
 */
class Reagents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reagents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'manufacturer_id', 'classification_id', 'concentration_id', 'method_id', 'create_date', 'amount'], 'required'],
            [['name', 'formula', 'description'], 'string'],
            [['reagent_id', 'manufacturer_id', 'classification_id', 'concentration_id', 'method_id', 'amount'], 'integer'],
            [['create_date', 'best_before'], 'safe'],
            [['density'], 'number'],
            [['reagent_type', 'liquid'], 'boolean'],
            [['classification_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classification::className(), 'targetAttribute' => ['classification_id' => 'id']],
            [['concentration_id'], 'exist', 'skipOnError' => true, 'targetClass' => Concentration::className(), 'targetAttribute' => ['concentration_id' => 'id']],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::className(), 'targetAttribute' => ['manufacturer_id' => 'id']],
            [['method_id'], 'exist', 'skipOnError' => true, 'targetClass' => Method::className(), 'targetAttribute' => ['method_id' => 'id']],
            [['reagent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReagentsToReagents::className(), 'targetAttribute' => ['reagent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'reagent_id' => Yii::t('app', 'Reagent ID'),
            'manufacturer_id' => Yii::t('app', 'Manufacturer ID'),
            'classification_id' => Yii::t('app', 'Classification ID'),
            'concentration_id' => Yii::t('app', 'Concentration ID'),
            'method_id' => Yii::t('app', 'Method ID'),
            'create_date' => Yii::t('app', 'Create Date'),
            'amount' => Yii::t('app', 'Amount'),
            'formula' => Yii::t('app', 'Formula'),
            'best_before' => Yii::t('app', 'Best Before'),
            'density' => Yii::t('app', 'Density'),
            'reagent_type' => Yii::t('app', 'Reagent Type'),
            'liquid' => Yii::t('app', 'Liquid'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassification()
    {
        return $this->hasOne(Classification::className(), ['id' => 'classification_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcentration()
    {
        return $this->hasOne(Concentration::className(), ['id' => 'concentration_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['id' => 'manufacturer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMethod()
    {
        return $this->hasOne(Method::className(), ['id' => 'method_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagent()
    {
        return $this->hasOne(ReagentsToReagents::className(), ['id' => 'reagent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagentsToReagents()
    {
        return $this->hasMany(ReagentsToReagents::className(), ['reagent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagentsToReagents0()
    {
        return $this->hasMany(ReagentsToReagents::className(), ['reagent_id' => 'id']);
    }
}
