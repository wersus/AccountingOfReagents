<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SolutionToExternalReagents */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Solution To External Reagents',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solution To External Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="solution-to-external-reagents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
