<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reagents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reagents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reagent_id')->textInput() ?>

    <?= $form->field($model, 'manufacturer_id')->textInput() ?>

    <?= $form->field($model, 'classification_id')->textInput() ?>

    <?= $form->field($model, 'concentration_id')->textInput() ?>

    <?= $form->field($model, 'method_id')->textInput() ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'formula')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'best_before')->textInput() ?>

    <?= $form->field($model, 'density')->textInput() ?>

    <?= $form->field($model, 'reagent_type')->checkbox() ?>

    <?= $form->field($model, 'liquid')->checkbox() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
