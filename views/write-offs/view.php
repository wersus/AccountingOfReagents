<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\WriteOffs */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Write Offs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="write-offs-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Write Offs').' '. Html::encode($this->title) ?></h2>
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
        [
            'attribute' => 'internalSolutions.id',
            'label' => Yii::t('app', 'Id Internal Solutions'),
        ],
        [
            'attribute' => 'internalSolutionsTwo.id',
            'label' => Yii::t('app', 'Id Internal Solutions Two'),
        ],
        'volume',
        'weight',
        'reason:ntext',
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
        'id_shelf_lifes',
    ];
    echo DetailView::widget([
        'model' => $model->externalReagents,
        'attributes' => $gridColumnExternalReagents    ]);
    ?>
    <div class="row">
        <h4>InternalSolutions<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnInternalSolutions = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'create_date',
        'best_before',
        'volume',
        'description',
        'id_solutions',
    ];
    echo DetailView::widget([
        'model' => $model->internalSolutions,
        'attributes' => $gridColumnInternalSolutions    ]);
    ?>
    <div class="row">
        <h4>InternalSolutions<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnInternalSolutions = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'create_date',
        'best_before',
        'volume',
        'description',
        'id_solutions',
    ];
    echo DetailView::widget([
        'model' => $model->internalSolutionsTwo,
        'attributes' => $gridColumnInternalSolutions    ]);
    ?>
</div>
