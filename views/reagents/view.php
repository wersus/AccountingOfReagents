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
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-external-reagents']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'External Reagents')),
        ],
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-solution-to-external-reagents']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Solution To External Reagents')),
        ],
        'columns' => $gridColumnSolutionToExternalReagents
    ]);
}
?>

    </div>
</div>
