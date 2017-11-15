<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reagents_to_reagents".
 *
 * @property integer $id
 * @property integer $reagent
 * @property integer $reagent_id
 *
 * @property Reagents[] $reagents
 * @property Reagents $reagent0
 * @property Reagents $reagent1
 */
class ReagentsToReagents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reagents_to_reagents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reagent', 'reagent_id'], 'integer'],
            [['reagent'], 'exist', 'skipOnError' => true, 'targetClass' => Reagents::className(), 'targetAttribute' => ['reagent' => 'id']],
            [['reagent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reagents::className(), 'targetAttribute' => ['reagent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reagent' => Yii::t('app', 'Reagent'),
            'reagent_id' => Yii::t('app', 'Reagent ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagents()
    {
        return $this->hasMany(Reagents::className(), ['reagent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagent0()
    {
        return $this->hasOne(Reagents::className(), ['id' => 'reagent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagent1()
    {
        return $this->hasOne(Reagents::className(), ['id' => 'reagent_id']);
    }
}
