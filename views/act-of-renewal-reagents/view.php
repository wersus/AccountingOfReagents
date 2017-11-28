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
        'id_measurements',
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
        <h4>Methods<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnMethods = [
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
</div>
