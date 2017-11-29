<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\SolutionToExternalReagents */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solution To External Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solution-to-external-reagents-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Solution To External Reagents').' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'solutions.name',
            'label' => Yii::t('app', 'Id Solutions'),
        ],
        [
            'attribute' => 'solutionsTwo.name',
            'label' => Yii::t('app', 'Id Solutions Two'),
        ],
        [
            'attribute' => 'methods.name',
            'label' => Yii::t('app', 'Id Methods'),
        ],
        [
            'attribute' => 'reagents.name',
            'label' => Yii::t('app', 'Id Reagents'),
        ],
        'part',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
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
        <h4>Reagents<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnReagents = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'name',
        'formula',
        'short',
        'liquid',
        'density',
        'short_formula',
    ];
    echo DetailView::widget([
        'model' => $model->reagents,
        'attributes' => $gridColumnReagents    ]);
    ?>
    <div class="row">
        <h4>Solutions<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSolutions = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'id_shelf_lifes',
        'name',
        'id_concentrations',
    ];
    echo DetailView::widget([
        'model' => $model->solutions,
        'attributes' => $gridColumnSolutions    ]);
    ?>
    <div class="row">
        <h4>Solutions<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSolutions = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        'id_shelf_lifes',
        'name',
        'id_concentrations',
    ];
    echo DetailView::widget([
        'model' => $model->solutionsTwo,
        'attributes' => $gridColumnSolutions    ]);
    ?>
</div>
