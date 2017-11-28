<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ExternalReagents */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'External Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="external-reagents-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'External Reagents').' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'manufacturers.name',
            'label' => Yii::t('app', 'Id Manufacturers'),
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
            'label' => Yii::t('app', 'Id Qualifications'),
        ],
        'description:ntext',
        [
            'attribute' => 'shelfLifes.id',
            'label' => Yii::t('app', 'Id Shelf Lifes'),
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
if($providerActOfRenewalReagents->totalCount){
    $gridColumnActOfRenewalReagents = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'best_before',
            'date',
            [
                'attribute' => 'shelfLifes.id',
                'label' => Yii::t('app', 'Id Shelf Lifes')
            ],
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
        <h4>Manufacturers<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnManufacturers = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'short',
    ];
    echo DetailView::widget([
        'model' => $model->manufacturers,
        'attributes' => $gridColumnManufacturers    ]);
    ?>
    <div class="row">
        <h4>Qualifications<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnQualifications = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'short',
    ];
    echo DetailView::widget([
        'model' => $model->qualifications,
        'attributes' => $gridColumnQualifications    ]);
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
    <div class="row">
        <h4>Users<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUsers = [
        ['attribute' => 'id', 'visible' => false],
        'surname',
        'name',
        'patronymic',
        'id_positions',
    ];
    echo DetailView::widget([
        'model' => $model->users,
        'attributes' => $gridColumnUsers    ]);
    ?>
    
    <div class="row">
<?php
if($providerWriteOffs->totalCount){
    $gridColumnWriteOffs = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'id_internal_solutions',
            'id_internal_solutions_two',
            'volume',
            'weight',
            'reason:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerWriteOffs,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-write-offs']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Write Offs')),
        ],
        'export' => false,
        'columns' => $gridColumnWriteOffs
    ]);
}
?>

    </div>
</div>
