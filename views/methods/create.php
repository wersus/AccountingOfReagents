<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Methods */

$this->title = Yii::t('app', 'Create Methods');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Methods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="methods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
