<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Method */

$this->title = Yii::t('app', 'Update Method:') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Methods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="method-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>