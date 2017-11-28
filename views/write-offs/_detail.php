<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\WriteOffs */

?>
<div class="write-offs-view">

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
</div>