<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MarcaVeiculo;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use app\models\Veiculo;

/* @var $this yii\web\View */
/* @var $model app\models\Veiculo */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="veiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeveiculo')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'cor')->textInput(['maxlength' => true,'style'=>'width:200px']) ?>
    
    <?= $form->field($model, 'idmarcaveiculo')->dropDownList(ArrayHelper::map(MarcaVeiculo::find()->all(), 'idmarcaveiculo', 'nomemarca'),['prompt'=>'Selecione uma marca','style'=>'width:200px']) ?>

	<table>
		<tr>
			<td>
				<?= $form->field($model, 'anofabricacao')->textInput(['maxlength'=>4,'style'=>'width:150px','integerOnly'=>true]) ?>
			</td>
			<td>
				<?= $form->field($model, 'anomodelo')->textInput(['maxlength'=>4,'style'=>'width:150px','integerOnly'=>true]) ?>
			</td>
		</tr>
	</table>
	
	
	<?= $form->field($model, 'datacompra')->widget(DatePicker::classname(), [
	    'language' => 'pt',
	    'dateFormat' => 'dd/MM/yyyy',
		'options' => ['style'=>'width:300px;', 'class'=>'form-control'],
	]) ?>
	
	<?=
		$form->field($model, 'atributoveiculo')->widget(Select2::classname(), [
			'language' => 'pt',
			'data' => ArrayHelper::map($model->atributoveiculo, 'idatributoveiculo', 'descricaoatributo'),
			'pluginOptions' => [
				'placeholder' => 'Informe atributos do veiculo ...',
				'multiple' => true,
				'tags' => true
			],
		]);
	?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
