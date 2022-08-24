<?php

namespace app\modules\controllers;

use app\models\Dlicencia;
use app\models\Licencia;
use app\models\Mc;
use app\modules\searchs\DlicenciaSearch;
use Yii;
use yii\db\Transaction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;

/**
 * DlicenciaController implements the CRUD actions for Dlicencia model.
 */
class DlicenciaController extends Controller
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
     * Lists all Dlicencia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DlicenciaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dlicencia model.
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
     * Creates a new Dlicencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Mc;
        $modelsDlicencia = [new Dlicencia];
        
        if ($model->load(Yii::$app->request->post())) {

            $modelsDlicencia = Model::createMultiple(Dlicencia::classname());
            Model::loadMultiple($modelsDlicencia, Yii::$app->request->post());

            // validate Mc and Dlicencias models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDlicencia) && $valid;

            

            if ($valid) {
				
				$transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
						
                       foreach ($modelsDlicencia as $indexDlicencia => $modelDlicencia) {

                            if ($flag === false) {
                                break;
                            }

                            $modelDlicencia->idp = $model->id;
							$modelDlicencia->fecha = $model->fecha;
							$modelDlicencia->destino = $model->destino;
							$modelDlicencia->num_final=$modelDlicencia->num_inicial+$modelDlicencia->cant;
							$inicio=$modelDlicencia->num_inicial;
							$fin=$modelDlicencia->num_final;

                            if (!($flag = $modelDlicencia->save(false))) {
                                break;
                            }
							
							while ( $inicio<= $fin)
									{
										 if ($flag === false) {break;                            }
									$model1 = new Licencia(); 
									$model1->destino= $model->destino; 
									$model1->idp= $modelDlicencia->id;
									$model1->obs= $modelDlicencia->obs;
									$model1->fecha= $model->fecha;
									$model1->serial= strtoupper($modelDlicencia->siglas).$inicio;
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
            'modelsModelo' => (empty($modelsDlicencia)) ? [new Dlicencia] : $modelsDlicencia,
        ]);
    }

    /**
     * Updates an existing Dlicencia model.
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
     * Deletes an existing Dlicencia model.
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
     * Finds the Dlicencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Dlicencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dlicencia::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
