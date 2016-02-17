<?php

namespace app\controllers;

use Yii;
use app\models\Veiculo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MarcaVeiculo;
use app\models\Atributoveiculo;
use app\controllers\AtributoVeiculoController;
use yii\base\Object;

/**
 * VeiculoController implements the CRUD actions for Veiculo model.
 */
class VeiculoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Veiculo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Veiculo::find()
        				->joinWith('marcaveiculo'),
        ]);
		
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Veiculo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Veiculo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Veiculo();
		
        if ($model->load(Yii::$app->request->post())) {
        	$model->datacompra = implode("-",array_reverse(explode("/",$_POST['Veiculo']['datacompra'])));
        	
        	if($model->save()){
	        	foreach ($_POST['Veiculo']['atributoveiculos'] as $key => $value) {
					$atributo = new Atributoveiculo();
					
					$atributo->descricaoatributo = $value;
					$atributo->idveiculo = $model->idveiculo;
					
					if($atributo->save()){
						return $this->redirect(['view', 'id' => $model->idveiculo]);
					}else{
						return $this->render('create', [
								'model' => $model,
						]);
					}
	        	}
        	}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Veiculo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
        	$model->datacompra = implode("-",array_reverse(explode("/",$_POST['Veiculo']['datacompra'])));
        	
        	if($model->save()){
        		if($_POST['Veiculo']['atributoveiculo']){
	        		foreach ($_POST['Veiculo']['atributoveiculo'] as $key => $value) {
	        			$atributo = new Atributoveiculo();
	        			
	        			$atributo->descricaoatributo = $value;
	        			$atributo->idveiculo = $model->idveiculo;
	        				
	        			$atributo->save();
	        		}
	        		
	        		if($atributo->idatributoveiculo){
	        			return $this->redirect(['view', 'id' => $model->idveiculo]);
	        		}else{
	        			return $this->render('update', [
	        					'model' => $model,
	        			]);
	        		}
        		}else{
        			return $this->redirect(['view', 'id' => $model->idveiculo]);
        		}
        	}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Veiculo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Veiculo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Veiculo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Veiculo::find()->joinWith('atributoveiculo')->where(['veiculo.idveiculo' => $id])->one()) !== null) {
        	return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
