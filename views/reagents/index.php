<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReagentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reagents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reagents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Reagents'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name:ntext',
            //'reagent_id',
            'manufacturer.title:ntext:'.Yii::t('app', 'Manufacturer'),
            'classification.title:ntext:'.Yii::t('app', 'Classification'),
            'concentration.title:ntext:'.Yii::t('app', 'Concentration'),
            'method.name:ntext:'.Yii::t('app', 'Method'),
             'create_date:date',
             'amount:integer',
             'formula:ntext',
//             'best_before::date',
//             'density',
//             'reagent_type:boolean',
//             'liquid:boolean',
            // 'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
