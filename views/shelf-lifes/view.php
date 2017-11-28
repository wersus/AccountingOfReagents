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
        <div class="col-sm-3" style="margin-top: 15px">
            
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
            'id_measurements',
            'conclusion:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerActOfRenewalReagents,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-act-of-renewal-reagents']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Act Of Renewal Reagents')),
        ],
        'export' => false,
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
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'manufacturers.name',
                'label' => Yii::t('app', 'Id Manufacturers')
            ],
            'create_date',
            'id_reagents',
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-external-reagents']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'External Reagents')),
        ],
        'export' => false,
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
            ['attribute' => 'id', 'visible' => false],
                        'name:ntext',
            [
                'attribute' => 'concentrations.name',
                'label' => Yii::t('app', 'Id Concentrations')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSolutions,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-solutions']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Solutions')),
        ],
        'export' => false,
        'columns' => $gridColumnSolutions
    ]);
}
?>

    </div>
</div>
