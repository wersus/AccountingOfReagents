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
        'id_reagents',
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
        <h4>Solutions<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSolutions = [
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
