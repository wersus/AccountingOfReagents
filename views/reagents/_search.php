<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReagentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-reagents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'formula')->textInput() ?>

    <?php /* echo $form->field($model, 'short')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'liquid')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'density')->textInput(['placeholder' => 'Density']) */ ?>

    <?php /* echo $form->field($model, 'short_formula')->textarea(['rows' => 6]) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
