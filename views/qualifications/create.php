<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Qualifications */

$this->title = Yii::t('app', 'Create Qualifications');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qualifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qualifications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
