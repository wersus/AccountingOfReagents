<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Reagents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reagents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'reagent')->widget(Select2::class, ['items' => $model->reagent_list,
        'clientOptions' => [
                'multiple' => true,
            ]
    ]) ?>

    <?= $form->field($model, 'manufacturer')->widget(Select2::class, ['items' => $model->manufacturer_list]);?>

    <?= $form->field($model, 'classification')->widget(Select2::class, ['items' => $model->classification_list]) ?>

    <?= $form->field($model, 'concentration')->widget(Select2::class, ['items' => $model->concentration_list]) ?>

    <?= $form->field($model, 'method')->widget(Select2::class, ['items' => $model->method_list]) ?>

    <?= $form->field($model, 'create_date')->widget(DatePicker::className(),[
        'language' => 'ru',
        'clientOptions' => [
            'placeholder' => 'TEST',
            'autoclose' => true,
            'format' => 'dd.mm.yyyy'
        ]
    ]);?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'formula')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'best_before')->widget(DatePicker::className(),[
        'language' => 'ru',
        'clientOptions' => [
            'placeholder' => Yii::t('app', 'best_before'),
            'autoclose' => true,
            'format' => 'dd.mm.yyyy'
        ]
    ]);?>

    <?= $form->field($model, 'density')->textInput() ?>

    <?= $form->field($model, 'reagent_type')->checkbox() ?>

    <?= $form->field($model, 'liquid')->checkbox() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
