<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InternalSolutions */

$this->title = Yii::t('app', 'Create Internal Solutions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Internal Solutions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="internal-solutions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
