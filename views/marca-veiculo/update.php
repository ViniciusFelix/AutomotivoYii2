<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MarcaVeiculo */

$this->title = 'Alterar Marca Veiculo';
$this->params['breadcrumbs'][] = ['label' => 'Marca Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmarcaveiculo, 'url' => ['view', 'id' => $model->idmarcaveiculo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marca-veiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
