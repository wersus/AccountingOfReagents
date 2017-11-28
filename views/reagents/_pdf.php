<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Reagents */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reagents-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Reagents').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'name:ntext',
        'formula:ntext',
        'short:ntext',
        'liquid:boolean',
        'density',
        'short_formula:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
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
        [
                'attribute' => 'shelfLifes.id',
                'label' => Yii::t('app', 'Id Shelf Lifes')
            ],
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
if($providerSolutionToExternalReagents->totalCount){
    $gridColumnSolutionToExternalReagents = [
        ['class' => 'yii\grid\SerialColumn'],
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'solutions.name',
                'label' => Yii::t('app', 'Id Solutions')
            ],
        [
                'attribute' => 'solutionsTwo.name',
                'label' => Yii::t('app', 'Id Solutions Two')
            ],
        [
                'attribute' => 'methods.name',
                'label' => Yii::t('app', 'Id Methods')
            ],
                'part',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSolutionToExternalReagents,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Solution To External Reagents')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnSolutionToExternalReagents
    ]);
}
?>
    </div>
</div>
