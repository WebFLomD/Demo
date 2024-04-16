<?php

use app\models\Statement;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Отправить заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_user',
            'title',
            'num_car',
            'description:ntext',
            'date',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->statusText();
                }
            ],
//            'status',
            'answer:ntext',
        ],
    ]); ?>


</div>
