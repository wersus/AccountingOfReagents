<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConcentrationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-concentrations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Name')]) ?>

    <?= $form->field($model, 'short_name')->textInput(['placeholder' => Yii::t('app', 'Short Name')]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
