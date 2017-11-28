<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reagents */

$this->title = Yii::t('app', 'Create Reagents');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reagents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
