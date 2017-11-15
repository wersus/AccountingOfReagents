<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classification".
 *
 * @property integer $id
 * @property string $title
 * @property string $short_title
 *
 * @property Reagents[] $reagents
 */
class Classification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'short_title'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'short_title' => Yii::t('app', 'Short Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagents()
    {
        return $this->hasMany(Reagents::className(), ['classification_id' => 'id']);
    }
}
