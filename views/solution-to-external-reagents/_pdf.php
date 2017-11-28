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
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
        [
                'attribute' => 'reagents.name',
                'label' => Yii::t('app', 'Id Reagents')
            ],
        'part',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
