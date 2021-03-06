<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BaseController
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
       
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
   
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->identity->rol === 10){
            $model = new User();

            if($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                    return $this->render('create', ['model' => $model,]);}
        }else{
                throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->identity->rol === 10){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                    return $this->render('update', ['model' => $model,]);
            }
        }else{
            throw new ForbiddenHttpException; 
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->identity->rol === 10){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException;
            
        }
    }

    public function actionActivar($id){


            $model = $this->findModel($id);
            $model->status = 20;
            //var_dump($model);exit;
           if($model->update()){
                return $this->redirect(['index']);

           }else{
           
            return $this->redirect(['index']);
             throw new NotFoundHttpException('Error al Activar Usuario');

           }
    }
    public function actionDesactivar($id){


            $model = $this->findModel($id);
            $model->status = 10;
            //var_dump($model);exit;
           if($model->update()){
                return $this->redirect(['index']);

           }else{
           
            return $this->redirect(['index']);
             throw new NotFoundHttpException('Error al Activar Usuario');

           }
    }

    public static function getEstado($id){

        $model = $this->findModel($id);

        if($model->findOne($id)->status == 10){
            return 'Inactivo';
        }else{
            return 'Activo';
        } 
    }
    


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
