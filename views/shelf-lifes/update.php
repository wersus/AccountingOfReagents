<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShelfLifes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => lcfirst(Yii::t('app', 'Shelf Lifes')),
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shelf Lifes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="shelf-lifes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
