<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WriteOffs */

$this->title = Yii::t('app', 'Create Write Offs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Write Offs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="write-offs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
