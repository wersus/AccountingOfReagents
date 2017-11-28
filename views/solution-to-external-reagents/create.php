<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SolutionToExternalReagents */

$this->title = Yii::t('app', 'Create Solution To External Reagents');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solution To External Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solution-to-external-reagents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
