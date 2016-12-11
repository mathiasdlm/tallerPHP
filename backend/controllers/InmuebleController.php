<?php

namespace backend\controllers;

use Yii;
use common\models\Inmueble;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InmuebleController implements the CRUD actions for Inmueble model.
 */
class InmuebleController extends BaseController
{


    public function dropDown()
    {

    $items = ArrayHelper::map(Inmueble::find()->all(), 'idCliente','nombre');

    return $this->render('view',['model'=>$model, 'items'=>$items]);

    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Inmueble models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Inmueble::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inmueble model.
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
     * Creates a new Inmueble model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inmueble();

        if ($model->load(Yii::$app->request->post())) {
            $base = explode('/backend', realpath(Yii::$app->basePath));

            $upload_file1 = $model->uploadFile1();
            // $upload_file2 = $model->uploadFile2();
            // $upload_file3 = $model->uploadFile3();

            if($model->save()){
                if ($upload_file1 !== false) {
                    $path = $model->getUploadedFile1();
                    $upload_file1->saveAs($base[0] . $path);
                }

                 // if ($upload_file2 !== false) {
                 //            $path = $model->getUploadedFile2();
                 //            $upload_file2->saveAs($path);
                 //        }

                 // if ($upload_file3 !== false) {
                 //            $path = $model->getUploadedFile3();
                 //            $upload_file13->saveAs($path);
                 //        } 
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inmueble model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inmueble model.
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
     * Finds the Inmueble model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inmueble the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inmueble::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
