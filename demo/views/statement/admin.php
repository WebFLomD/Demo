<?php

use app\models\Statement;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Все заявки';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                    'attribute' => 'id_user',
                    'value' => 'user.fio',
            ],
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
            //'answer:ntext',
            [
                    'attribute' => 'Решение заявки',
                    'format' => 'html',
                    'value' => function ($data) {
                        switch ($data->status)
                        {
                            case 1: return Html::a('Решить', 'true/?id='.$data->id).'/'.Html::a('Отклонить', 'false/?id='.$data->id);
                            case 2: return 'Заявка решено!';
                            case 3: return 'Заявка отклонено!';
                        }

                    }
            ],
        ],
    ]); ?>


</div>
