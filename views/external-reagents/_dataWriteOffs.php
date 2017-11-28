<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->writeOffs,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'guid',
        ['attribute' => 'lock', 'visible' => false],
        ['attribute' => 'id', 'visible' => false],
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'write-offs'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
