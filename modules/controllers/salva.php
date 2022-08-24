<?php
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
					
                    
                        foreach ($modelsDcertifico as $indexDcertifico => $modelDcertifico) {

									$modelDcertifico->fecha = $model->fecha;
									$modelDcertifico->destino = $model->destino;
									$modelDcertifico->num_final=$modelDcertifico->num_inicial+$modelDcertifico->cant;
									$inicio=$modelDcertifico->num_inicial;
									$fin=$modelDcertifico->num_final;
									if ($flag = $modelDcertifico->save()) {

									while ( $inicio<= $fin)
									{
									$model1 = new Certifico(); 
									$model1->destino= $model->destino; $model1->idp= $model->id;
									$model1->obs= $model->obs;
									$model1->fecha= $model->fecha;               
									$model1->serial= strtoupper($model->siglas).$inicio;

									if (!($flag = $model1->save())) {
									$transaction->rollBack();
									Yii::$app->session->setFlash('danger', 'Error esta Operacion Genera un  Duplicado con el Serial '.$model1->serial);
									break;
									}
									$inicio++;
									} 
									}  
									}
                    

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsDcertifico' => (empty($modelsDcertifico)) ? [new Dcertifico] : $modelsDcertifico,
        ]);
    }
	
	
	
	{
        $modelPerson = new Person;
        $modelsHouse = [new House];
        $modelsRoom = [[new Room]];

        if ($modelPerson->load(Yii::$app->request->post())) {

            $modelsHouse = Model::createMultiple(House::classname());
            Model::loadMultiple($modelsHouse, Yii::$app->request->post());

            // validate person and houses models
            $valid = $modelPerson->validate();
            $valid = Model::validateMultiple($modelsHouse) && $valid;

            if (isset($_POST['Room'][0][0])) {
                foreach ($_POST['Room'] as $indexHouse => $rooms) {
                    foreach ($rooms as $indexRoom => $room) {
                        $data['Room'] = $room;
                        $modelRoom = new Room;
                        $modelRoom->load($data);
                        $modelsRoom[$indexHouse][$indexRoom] = $modelRoom;
                        $valid = $modelRoom->validate();
                    }
                }
            }

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPerson->save(false)) {
                        foreach ($modelsHouse as $indexHouse => $modelHouse) {

                            if ($flag === false) {
                                break;
                            }

                            $modelHouse->person_id = $modelPerson->id;

                            if (!($flag = $modelHouse->save(false))) {
                                break;
                            }

                            if (isset($modelsRoom[$indexHouse]) && is_array($modelsRoom[$indexHouse])) {
                                foreach ($modelsRoom[$indexHouse] as $indexRoom => $modelRoom) {
                                    $modelRoom->house_id = $modelHouse->id;
                                    if (!($flag = $modelRoom->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelPerson->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelPerson' => $modelPerson,
            'modelsHouse' => (empty($modelsHouse)) ? [new House] : $modelsHouse,
            'modelsRoom' => (empty($modelsRoom)) ? [[new Room]] : $modelsRoom,
        ]);
    }