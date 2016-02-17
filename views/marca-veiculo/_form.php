<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MarcaVeiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marca-veiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomemarca')->textInput(['maxlength' => true]) ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
