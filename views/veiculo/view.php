<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Veiculo */

$this->title = $model->nomeveiculo;
$this->params['breadcrumbs'][] = ['label' => 'Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

function listaAtributoVeiculo($atributos){
	$lista = "";
	foreach ($atributos as $key => $value) {
		$lista .= "<li>".($value->descricaoatributo)."</li>";
	}
	return $lista;
}

?>
<div class="veiculo-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomeveiculo',
        	'cor',
        	[
        		'attribute'=>'datacompra', 
            	'format'=>['date', 'd/M/y']
    		],
            'anofabricacao',
            'anomodelo',
            'marcaveiculo.nomemarca',
        	[
        		'label' => 'Atributos',
        		'format'=> 'raw',
        		'value' => listaAtributoVeiculo($model->atributoveiculo),
        	],
        ],
    ]) ?>
    
    <p align="center">
        <?= Html::a('Alterar', ['update', 'id' => $model->idveiculo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->idveiculo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja excluir esse veiculo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
