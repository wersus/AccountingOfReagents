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
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'externalReagents.id',
                'label' => Yii::t('app', 'Id External Reagents')
            ],
        [
                'attribute' => 'internalSolutions.id',
                'label' => Yii::t('app', 'Id Internal Solutions')
            ],
        [
                'attribute' => 'internalSolutionsTwo.id',
                'label' => Yii::t('app', 'Id Internal Solutions Two')
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
