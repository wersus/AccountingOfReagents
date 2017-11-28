<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ExternalReagents */

?>
<div class="external-reagents-view">

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
            'attribute' => 'manufacturers.name',
            'label' => Yii::t('app', 'Id Manufacturers'),
        ],
        'create_date',
        [
            'attribute' => 'reagents.name',
            'label' => Yii::t('app', 'Id Reagents'),
        ],
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
</div>