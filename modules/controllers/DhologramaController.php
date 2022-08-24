<?php

namespace app\modules\controllers;

use app\models\Dholograma;
use app\models\Holograma;
use app\models\Mc;
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
        $modelsDholograma = [new Dholograma];
        
        if ($model->load(Yii::$app->request->post())) {

            $modelsDholograma = Model::createMultiple(Dholograma::classname());
            Model::loadMultiple($modelsDholograma, Yii::$app->request->post());

            // validate Mc and Dhologramas models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDholograma) && $valid;

            

            if ($valid) {
				
				$transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
						
                       foreach ($modelsDholograma as $indexDholograma => $modelDholograma) {

                            if ($flag === false) {
                                break;
                            }

                            $modelDholograma->idp = $model->id;
							$modelDholograma->fecha = $model->fecha;
							$modelDholograma->destino = $model->destino;
							$modelDholograma->num_final=$modelDholograma->num_inicial+$modelDholograma->cant;
							$inicio=$modelDholograma->num_inicial;
							$fin=$modelDholograma->num_final;

                            if (!($flag = $modelDholograma->save(false))) {
                                break;
                            }
							
							while ( $inicio<= $fin)
									{
										 if ($flag === false) {break;                            }
									$model1 = new Holograma(); 
									$model1->destino= $model->destino; 
									$model1->idp= $modelDholograma->id;
									$model1->obs= $modelDholograma->obs;
									$model1->fecha= $model->fecha;
									$model1->serial= strtoupper($modelDholograma->siglas).$inicio;
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
            'modelsModelo' => (empty($modelsDholograma)) ? [new Dholograma] : $modelsDholograma,
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
