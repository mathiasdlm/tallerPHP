<?php

namespace backend\controllers;

use Yii;
use common\models\Favoritos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavoritosController implements the CRUD actions for Favoritos model.
 */
class FavoritosController extends Controller
{
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
     * Lists all Favoritos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Favoritos::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Favoritos model.
     * @param integer $idInmueble
     * @param integer $idUser
     * @return mixed
     */
    public function actionView($idInmueble, $idUser)
    {
        return $this->render('view', [
            'model' => $this->findModel($idInmueble, $idUser),
        ]);
    }

    /**
     * Creates a new Favoritos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Favoritos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idInmueble' => $model->idInmueble, 'idUser' => $model->idUser]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Favoritos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idInmueble
     * @param integer $idUser
     * @return mixed
     */
    public function actionUpdate($idInmueble, $idUser)
    {
        $model = $this->findModel($idInmueble, $idUser);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idInmueble' => $model->idInmueble, 'idUser' => $model->idUser]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Favoritos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idInmueble
     * @param integer $idUser
     * @return mixed
     */
    public function actionDelete($idInmueble, $idUser)
    {
        $this->findModel($idInmueble, $idUser)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Favoritos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idInmueble
     * @param integer $idUser
     * @return Favoritos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idInmueble, $idUser)
    {
        if (($model = Favoritos::findOne(['idInmueble' => $idInmueble, 'idUser' => $idUser])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
