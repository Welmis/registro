<?php

namespace app\modules\controllers;

use app\models\Mc;
use app\models\Dpegatina;
use app\models\Pegatina;
use app\modules\searchs\DpegatinaSearch;
use Yii;
use yii\db\Transaction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;

/**
 * DpegatinaController implements the CRUD actions for Dpegatina model.
 */
class DpegatinaController extends Controller
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
     * Lists all Dpegatina models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DpegatinaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dpegatina model.
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
     * Creates a new Dpegatina model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
   {
        $model = new Mc;
        $modelsDpegatina = [new Dpegatina];
        
        if ($model->load(Yii::$app->request->post())) {

            $modelsDpegatina = Model::createMultiple(Dpegatina::classname());
            Model::loadMultiple($modelsDpegatina, Yii::$app->request->post());

            // validate Mc and Dpegatinas models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDpegatina) && $valid;

            

            if ($valid) {
				
				$transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
						
                       foreach ($modelsDpegatina as $indexDpegatina => $modelDpegatina) {

                            if ($flag === false) {
                                break;
                            }

                            $modelDpegatina->idp = $model->id;
									
							$modelDpegatina->fecha = $model->fecha;
							$modelDpegatina->destino = $model->destino;
							$modelDpegatina->num_final=$modelDpegatina->num_inicial+$modelDpegatina->cant;
							$inicio=$modelDpegatina->num_inicial;
							$fin=$modelDpegatina->num_final;

                            if (!($flag = $modelDpegatina->save(false))) {
                                break;
                            }
							
							while ( $inicio<= $fin)
									{
										 if ($flag === false) {break;                            }
									$model1 = new Pegatina(); 
									$model1->destino= $model->destino; 
									$model1->anno= $modelDpegatina->anno;
									$model1->idp= $modelDpegatina->id;
									$model1->obs= $modelDpegatina->obs;
									$model1->fecha= $model->fecha;
									$model1->serial= strtoupper($modelDpegatina->siglas).str_pad($inicio,  4, "0", STR_PAD_LEFT).'-'.$model1->anno;
									
									
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
            'modelsModelo' => (empty($modelsDpegatina)) ? [new Dpegatina] : $modelsDpegatina,
        ]);
    }/**
     * Updates an existing Dpegatina model.
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
     * Deletes an existing Dpegatina model.
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
     * Finds the Dpegatina model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Dpegatina the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dpegatina::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
