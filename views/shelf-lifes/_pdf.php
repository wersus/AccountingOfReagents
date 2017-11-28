<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ShelfLifes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shelf Lifes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shelf-lifes-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Shelf Lifes').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'value',
        'short:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerActOfRenewalReagents->totalCount){
    $gridColumnActOfRenewalReagents = [
        ['class' => 'yii\grid\SerialColumn'],
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'externalReagents.id',
                'label' => Yii::t('app', 'Id External Reagents')
            ],
        'best_before',
        'date',
                [
                'attribute' => 'methods.name',
                'label' => Yii::t('app', 'Id Methods')
            ],
        'relative_error',
        [
                'attribute' => 'measurements.id',
                'label' => Yii::t('app', 'Id Measurements')
            ],
        'conclusion:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerActOfRenewalReagents,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Act Of Renewal Reagents')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnActOfRenewalReagents
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerExternalReagents->totalCount){
    $gridColumnExternalReagents = [
        ['class' => 'yii\grid\SerialColumn'],
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'manufacturers.name',
                'label' => Yii::t('app', 'Id Manufacturers')
            ],
        'create_date',
        [
                'attribute' => 'reagents.name',
                'label' => Yii::t('app', 'Id Reagents')
            ],
        'document:ntext',
        'best_before',
        'batch',
        'weight',
        'volume',
        [
                'attribute' => 'qualifications.name',
                'label' => Yii::t('app', 'Id Qualifications')
            ],
        'description:ntext',
            ];
    echo Gridview::widget([
        'dataProvider' => $providerExternalReagents,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'External Reagents')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnExternalReagents
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerSolutions->totalCount){
    $gridColumnSolutions = [
        ['class' => 'yii\grid\SerialColumn'],
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
                'name:ntext',
        [
                'attribute' => 'concentrations.name',
                'label' => Yii::t('app', 'Id Concentrations')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSolutions,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Solutions')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnSolutions
    ]);
}
?>
    </div>
</div>
