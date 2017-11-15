<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manufacturer".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Reagents[] $reagents
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagents()
    {
        return $this->hasMany(Reagents::className(), ['manufacturer_id' => 'id']);
    }
}
