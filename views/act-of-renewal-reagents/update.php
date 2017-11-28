<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActOfRenewalReagents */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Act Of Renewal Reagents',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Act Of Renewal Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="act-of-renewal-reagents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
