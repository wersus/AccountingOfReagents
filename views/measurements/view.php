<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Measurements */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Measurements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="measurements-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Measurements').' '. Html::encode($this->title) ?></h2>
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
        'date',
        'mass_concentration',
        'Kk',
        'control_standard',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerActOfRenewalReagents->totalCount){
    $gridColumnActOfRenewalReagents = [
        ['class' => 'yii\grid\SerialColumn'],
            'guid',
            ['attribute' => 'lock', 'visible' => false],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'externalReagents.id',
                'label' => Yii::t('app', 'Id External Reagents')
            ],
            'best_before',
            'date',
            [
                'attribute' => 'shelfLifes.id',
                'label' => Yii::t('app', 'Id Shelf Lifes')
            ],
            [
                'attribute' => 'methods.name',
                'label' => Yii::t('app', 'Id Methods')
            ],
            'relative_error',
                        'conclusion:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerActOfRenewalReagents,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-act-of-renewal-reagents']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Act Of Renewal Reagents')),
        ],
        'columns' => $gridColumnActOfRenewalReagents
    ]);
}
?>

    </div>
</div>
