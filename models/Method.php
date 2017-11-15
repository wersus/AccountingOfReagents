<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "method".
 *
 * @property integer $id
 * @property string $number
 * @property string $name
 *
 * @property Reagents[] $reagents
 */
class Method extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'method';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'name'], 'required'],
            [['number', 'name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'number' => Yii::t('app', 'Number'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReagents()
    {
        return $this->hasMany(Reagents::className(), ['method_id' => 'id']);
    }
}
