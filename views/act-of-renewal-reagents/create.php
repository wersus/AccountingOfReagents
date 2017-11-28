<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ActOfRenewalReagents */

$this->title = Yii::t('app', 'Create Act Of Renewal Reagents');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Act Of Renewal Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-of-renewal-reagents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
