<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Statement $model */

$this->title = 'Решение заявки: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все заявки', 'url' => ['statement/admin']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Решение заявки';
?>
<div class="statement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formTrue', [
        'model' => $model,
    ]) ?>

</div>
