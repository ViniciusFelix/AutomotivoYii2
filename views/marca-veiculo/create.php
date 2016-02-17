<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MarcaVeiculo */

$this->title = 'Nova Marca Veiculo';
$this->params['breadcrumbs'][] = ['label' => 'Marca Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-veiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
