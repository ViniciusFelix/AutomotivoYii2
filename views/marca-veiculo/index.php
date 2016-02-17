<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marca Veiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-veiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'nomemarca',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

	<p align="center">
        <?= Html::a('Nova Marca Veiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
