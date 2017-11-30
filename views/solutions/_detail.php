<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Solutions */

?>
<div class="solutions-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'shelfLifes.short',
            'label' => Yii::t('app', 'Id Shelf Lifes'),
        ],
        'name:ntext',
        [
            'attribute' => 'concentrations.short_name',
            'label' => Yii::t('app', 'Id Concentrations'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>