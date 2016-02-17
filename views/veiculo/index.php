<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de veiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

        	'nomeveiculo',
        	'cor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p align="center">
        <?= Html::a('Novo veiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
