<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Statement $model */

$this->title = 'Создание заявки';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
