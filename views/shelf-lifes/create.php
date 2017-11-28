<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShelfLifes */

$this->title = Yii::t('app', 'Create Shelf Lifes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shelf Lifes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shelf-lifes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
