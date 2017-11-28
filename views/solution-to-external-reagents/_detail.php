<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\SolutionToExternalReagents */

?>
<div class="solution-to-external-reagents-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
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
</div>