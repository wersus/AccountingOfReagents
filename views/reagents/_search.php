<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReagentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reagents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'reagent_id') ?>

    <?= $form->field($model, 'manufacturer_id') ?>

    <?= $form->field($model, 'classification_id') ?>

    <?php // echo $form->field($model, 'concentration_id') ?>

    <?php // echo $form->field($model, 'method_id') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'formula') ?>

    <?php // echo $form->field($model, 'best_before') ?>

    <?php // echo $form->field($model, 'density') ?>

    <?php // echo $form->field($model, 'reagent_type')->checkbox() ?>

    <?php // echo $form->field($model, 'liquid')->checkbox() ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
