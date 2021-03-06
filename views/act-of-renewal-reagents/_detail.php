<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ActOfRenewalReagents */

?>
<div class="act-of-renewal-reagents-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
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
</div>