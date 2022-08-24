<?php

namespace app\modules\controllers;

use app\models\Dcertifico;
use app\models\Mc;
use app\models\Certifico;
use app\modules\searchs\DcertificoSearch;
use Yii;
use yii\db\Transaction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\controllers\Model;
use Exception;

/**
 * DcertificoController implements the CRUD actions for Dcertifico model.
 */
class DcertificoController extends Controller
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
     * Lists all Dcertifico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DcertificoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dcertifico model.
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
     * Creates a new Dcertifico model.
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
     * Updates an existing Dcertifico model.
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
     * Deletes an existing Dcertifico model.
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
     * Finds the Dcertifico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Dcertifico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dcertifico::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
