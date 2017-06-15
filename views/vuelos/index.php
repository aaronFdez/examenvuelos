<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VueloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vuelos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vuelo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear vuelo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id_vuelo',
            [
            'attribute' => 'origen.den_aero',
            'value' => function ($model, $key, $index, $column) {
                return Html::a(
                    $model->origen->den_aero,
                    ['aeropuertos/view', 'id' => $model->origen->id]
                );
            },
            'format' => 'html',
            ],
            [
            'attribute' => 'destino.den_aero',
            'value' => function ($model, $key, $index, $column) {
                return Html::a(
                    $model->destino->den_aero,
                    ['aeropuertos/view', 'id' => $model->destino->id]
                );
            },
            'format' => 'html',
            ],
            [
            'attribute' => 'compania.den_comp',
            'value' => function ($model, $key, $index, $column) {
                return Html::a(
                    $model->compania->den_comp,
                    ['companias/view', 'id' => $model->compania->id]
                );
            },
            'format' => 'html',
            ],
            'salida:datetime',
            'llegada:datetime',
            'plazas',
            'precio',

        ],
    ]); ?>
</div>
