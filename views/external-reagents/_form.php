<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ExternalReagents */
/* @var $form yii\widgets\ActiveForm */
/*
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'ActOfRenewalReagents',
        'relID' => 'act-of-renewal-reagents',
        'value' => \yii\helpers\Json::encode($model->actOfRenewalReagents),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'WriteOffs',
        'relID' => 'write-offs',
        'value' => \yii\helpers\Json::encode($model->writeOffs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]); */
?>

<div class="external-reagents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_reagents')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Reagents::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose {model}', ['model' => Yii::t('app', 'Reagent')])],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_manufacturers')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Manufacturers::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose {model}', ['model' => Yii::t('app', 'Manufacturer')])],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_qualifications')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Qualifications::find()->orderBy('id')->asArray()->all(), 'id', 'short'),
        'options' => ['placeholder' => Yii::t('app', 'Choose {model}', ['model' => Yii::t('app', 'Qualification')])],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'document')->textInput(['placeholder' => Yii::t('app', 'Document')]) ?>

    <?= $model->isNewRecord ?'':$form->field($model, 'create_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose {model}', ['model' => Yii::t('app', 'Create Date')]),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'batch')->textInput(['placeholder' => Yii::t('app', 'Batch')]) ?>

    <?= $form->field($model, 'weight')->textInput(['placeholder' => Yii::t('app', 'Weight')]) ?>

    <?= $form->field($model, 'id_shelf_lifes')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\ShelfLifes::find()->orderBy('id')->asArray()->all(), 'id', 'short'),
        'options' => [
            'placeholder' => Yii::t('app', 'Choose {model}', ['model' => Yii::t('app', 'Shelf Life')]),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php /*
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'ActOfRenewalReagents')),
            'content' => $this->render('_formActOfRenewalReagents', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->actOfRenewalReagents),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'WriteOffs')),
            'content' => $this->render('_formWriteOffs', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->writeOffs),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]); */
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
