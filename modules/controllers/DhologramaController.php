<?php

namespace app\modules\controllers;

use app\models\Dholograma;
use app\models\Holograma;
use app\modules\searchs\DhologramaSearch;
use Yii;
use yii\db\Transaction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;

/**
 * DhologramaController implements the CRUD actions for Dholograma model.
 */
class DhologramaController extends Controller
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
     * Lists all Dholograma models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DhologramaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dholograma model.
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
     * Creates a new Dholograma model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Mc;
        $modelsDcertifico = [new Dcertifico];
        
        if ($model->load(Yii::$app->request->post())) {

            $modelsDcertifico = Model::createMultiple(Dcertifico::classname());
            Model::loadMultiple($modelsDcertifico, Yii::$app->request->post());

            // validate Mc and Dcertificos models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDcertifico) && $valid;

            

            if ($valid) {
				
				$transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
						
                       foreach ($modelsDcertifico as $indexDcertifico => $modelDcertifico) {

                            if ($flag === false) {
                                break;
                            }

                            $modelDcertifico->idp = $model->id;
							$modelDcertifico->fecha = $model->fecha;
							$modelDcertifico->destino = $model->destino;
							$modelDcertifico->num_final=$modelDcertifico->num_inicial+$modelDcertifico->cant;
							$inicio=$modelDcertifico->num_inicial;
							$fin=$modelDcertifico->num_final;

                            if (!($flag = $modelDcertifico->save(false))) {
                                break;
                            }
							
							while ( $inicio<= $fin)
									{
										 if ($flag === false) {break;                            }
									$model1 = new Certifico(); 
									$model1->destino= $model->destino; 
									$model1->idp= $modelDcertifico->id;
									$model1->obs= $modelDcertifico->obs;
									$model1->fecha= $model->fecha;
									$model1->serial= strtoupper($modelDcertifico->siglas).$inicio;
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
            'modelsModelo' => (empty($modelsDcertifico)) ? [new Dcertifico] : $modelsDcertifico,
        ]);
    }

    /**
     * Updates an existing Dholograma model.
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
     * Deletes an existing Dholograma model.
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
     * Finds the Dholograma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Dholograma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dholograma::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
