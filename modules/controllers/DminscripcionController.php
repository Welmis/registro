<?php

namespace app\modules\controllers;

use app\models\Dminscripcion;
use app\models\Mc;
use app\models\Minscripcion;
use app\modules\searchs\DminscripcionSearch;
use Yii;
use yii\db\Transaction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;
/**
 * DminscripcionController implements the CRUD actions for Dminscripcion model.
 */
class DminscripcionController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Dminscripcion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DminscripcionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dminscripcion model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dminscripcion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
   {
        $model = new Mc;
        $modelsDminscripcion = [new Dminscripcion];
        
        if ($model->load(Yii::$app->request->post())) {

            $modelsDminscripcion = Model::createMultiple(Dminscripcion::classname());
            Model::loadMultiple($modelsDminscripcion, Yii::$app->request->post());

            // validate Mc and Dminscripcions models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDminscripcion) && $valid;

            

            if ($valid) {
				
				$transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
						
                       foreach ($modelsDminscripcion as $indexDminscripcion => $modelDminscripcion) {

                            if ($flag === false) {
                                break;
                            }

                            $modelDminscripcion->idp = $model->id;
							$modelDminscripcion->fecha = $model->fecha;
							$modelDminscripcion->destino = $model->destino;
							$modelDminscripcion->num_final=$modelDminscripcion->num_inicial+$modelDminscripcion->cant;
							$inicio=$modelDminscripcion->num_inicial;
							$fin=$modelDminscripcion->num_final;

                            if (!($flag = $modelDminscripcion->save(false))) {
                                break;
                            }
							
							while ( $inicio<= $fin)
									{
										 if ($flag === false) {break;                            }
									$model1 = new Minscripcion(); 
									$model1->destino= $model->destino; 
									$model1->idp= $modelDminscripcion->id;
									$model1->obs= $modelDminscripcion->obs;
									$model1->fecha= $model->fecha;
									$model1->serial= strtoupper($modelDminscripcion->siglas).$inicio;
									 if (!($flag = $model1->save())) {
										 Yii::$app->session->setFlash('warning', "No es Posible Procesar la Información se genera un duplicado con el CODIGO  -->  ".$model1->serial);
										$transaction->rollBack();
									break;
									}
									$inicio++;
									}

                            
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
						Yii::$app->session->setFlash('success', "Operación realizada Exito!!!!");
                        return $this->redirect(['index']);
                    } else {
						 
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
					
                    $transaction->rollBack();
                }
				
            }//modelos validados
        }

        return $this->render('create', [
            'model' => $model,
            'modelsModelo' => (empty($modelsDminscripcion)) ? [new Dminscripcion] : $modelsDminscripcion,
        ]);
    } /**
     * Updates an existing Dminscripcion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dminscripcion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dminscripcion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Dminscripcion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dminscripcion::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
