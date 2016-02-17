<?php

namespace app\controllers;

use app\models\Atributoveiculo;
class AtributoVeiculoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDelete($id)
    {
    	Atributoveiculo::deleteAll(['idveiculo' => $id]);
    }
}
