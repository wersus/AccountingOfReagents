<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Concentration */

$this->title = Yii::t('app', 'Create Concentration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Concentrations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concentration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
