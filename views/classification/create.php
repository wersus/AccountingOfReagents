<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Classification */

$this->title = Yii::t('app', 'Create Classification');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Classifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
