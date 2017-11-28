<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Solutions */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solutions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solutions-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Solutions').' '. Html::encode($this->title) ?></h2>
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
        [
            'attribute' => 'shelfLifes.id',
            'label' => Yii::t('app', 'Id Shelf Lifes'),
        ],
        'name:ntext',
        [
            'attribute' => 'concentrations.name',
            'label' => Yii::t('app', 'Id Concentrations'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerSolutionToExternalReagents->totalCount){
    $gridColumnSolutionToExternalReagents = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                                    [
                'attribute' => 'methods.name',
                'label' => Yii::t('app', 'Id Methods')
            ],
            'id_reagents',
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
        'export' => false,
        'columns' => $gridColumnSolutionToExternalReagents
    ]);
}
?>

    </div>
    <div class="row">
        <h4>Concentrations<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnConcentrations = [
        ['attribute' => 'id', 'visible' => false],
        'name:ntext',
        'short_name',
    ];
    echo DetailView::widget([
        'model' => $model->concentrations,
        'attributes' => $gridColumnConcentrations    ]);
    ?>
    <div class="row">
        <h4>ShelfLifes<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnShelfLifes = [
        ['attribute' => 'id', 'visible' => false],
        'value',
        'short',
    ];
    echo DetailView::widget([
        'model' => $model->shelfLifes,
        'attributes' => $gridColumnShelfLifes    ]);
    ?>
</div>
