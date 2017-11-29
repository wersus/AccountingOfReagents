<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ActOfRenewalReagents */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Act Of Renewal Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-of-renewal-reagents-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Act Of Renewal Reagents').' '. Html::encode($this->title) ?></h2>
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
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'externalReagents.id',
            'label' => Yii::t('app', 'Id External Reagents'),
        ],
        'best_before',
        'date',
        [
            'attribute' => 'shelfLifes.id',
            'label' => Yii::t('app', 'Id Shelf Lifes'),
        ],
        [
            'attribute' => 'methods.name',
            'label' => Yii::t('app', 'Id Methods'),
        ],
        'relative_error',
        [
            'attribute' => 'measurements.id',
            'label' => Yii::t('app', 'Id Measurements'),
        ],
        'conclusion:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>ExternalReagents<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnExternalReagents = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'id_manufacturers',
        'create_date',
        'id_reagents',
        'document',
        'best_before',
        'batch',
        'weight',
        'volume',
        'id_qualifications',
        'description',
        [
            'attribute' => 'shelfLifes.id',
            'label' => Yii::t('app', 'Id Shelf Lifes'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model->externalReagents,
        'attributes' => $gridColumnExternalReagents    ]);
    ?>
    <div class="row">
        <h4>Measurements<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnMeasurements = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'date',
        'mass_consentarion',
        'Kk',
        'control standard',
    ];
    echo DetailView::widget([
        'model' => $model->measurements,
        'attributes' => $gridColumnMeasurements    ]);
    ?>
    <div class="row">
        <h4>Methods<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnMethods = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'name',
        'short',
        'document',
        'index',
    ];
    echo DetailView::widget([
        'model' => $model->methods,
        'attributes' => $gridColumnMethods    ]);
    ?>
    <div class="row">
        <h4>ShelfLifes<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnShelfLifes = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'value',
        'short',
    ];
    echo DetailView::widget([
        'model' => $model->shelfLifes,
        'attributes' => $gridColumnShelfLifes    ]);
    ?>
</div>
