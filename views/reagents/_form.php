<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reagents */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'ExternalReagents', 
        'relID' => 'external-reagents', 
        'value' => \yii\helpers\Json::encode($model->externalReagents),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SolutionToExternalReagents', 
        'relID' => 'solution-to-external-reagents', 
        'value' => \yii\helpers\Json::encode($model->solutionToExternalReagents),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="reagents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Name')]) ?>

    <?= $form->field($model, 'formula')->textInput(['placeholder' => Yii::t('app', 'Formula')]) ?>

    <?= $form->field($model, 'short')->textInput(['placeholder' => Yii::t('app', 'Short')]) ?>

    <?= $form->field($model, 'liquid')->checkbox() ?>

    <?= $form->field($model, 'density')->textInput(['placeholder' => Yii::t('app', 'Density')]) ?>

    <?= $form->field($model, 'short_formula')->textInput(['placeholder' => Yii::t('app', 'Short Formula')]) ?>

    <?php
    /*$forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'ExternalReagents')),
            'content' => $this->render('_formExternalReagents', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->externalReagents),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'SolutionToExternalReagents')),
            'content' => $this->render('_formSolutionToExternalReagents', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->solutionToExternalReagents),
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
    ]);*/
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
