<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use common\models\Inmueble;
use common\models\InmuebleQuery;
use common\models\LoginForm;
use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;
use common\models\SignupForm;
use common\models\ContactForm;
use common\models\InmuebleSearch;
use common\models\Favoritos; 
use common\models\User; 
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays buscador.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionFbhandshake(){
        if( Yii::$app->user->isGuest){
            
        
            if (!isset($_REQUEST['code']))
                {
                        if (isset($_REQUEST['error_description']))
                                $error = $_REQUEST['error_description'];
                        else
                                $error = "Auth error";
                        throw new CHttpException(403, $error);
                }
                        
                        
            $identity = new User();
            $identity->handshake_code = $_REQUEST['code'];         
            $identity->return_url = Yii::$app->params['FB_HANDSHAKE_URL'];
            $auth = $identity->authenticate();
            if ($auth) 
                {
                   $this->redirect('index');  
                }else{
                     $this->redirect('index');
                } 

        }else{
               $this->redirect('index');
        }
    }
    public function actionFblogin()
    {
        if( Yii::$app->user->isGuest){
            $this->redirect(
                            "https://graph.facebook.com/oauth/authorize" 
                            ."?type=web_server"
                            ."&redirect_uri=".Yii::$app->params['FB_HANDSHAKE_URL']
                            ."&client_id=".Yii::$app->params['FB_APP_ID']
                    );
        }else{
            $this->redirect('index');
        }
    }
     public function actionView($id = null)
    { 
        $fav = null;
        if(!Yii::$app->user->isGuest){

            $usrId = Yii::$app->user->identity->id;
            $fav = Favoritos::find()->where(["idInmueble" => $id, 'idUser'=>$usrId])->one();
        } 
        $inm = Inmueble::find()->where(["id" =>$id])->one();
            return $this->render('detalle', [
                'fav' => $fav,
                'model' => $inm,
                'images' => [
                    '<img width="100%" height="100%" src="/uploads/'.$inm->imagen1.'"/>',
                    '<img width="100%" height="100%" src="/uploads/'.$inm->imagen2.'"/>',
                    '<img width="100%" height="100%" src="/uploads/'.$inm->imagen3.'"/>'
                ]
            ]);
        
    }
    public function actionList()
    { 
        $inm = new Inmueble();
        if(Yii::$app->request->get('Inmueble')){
            $inm->load(Yii::$app->request->get());
            $attr = [];
            foreach (Yii::$app->request->get()['Inmueble'] as $key => $value) {
                if($key != 'tipoFiltro' && $value != null && isset($value) && !empty($value)){
                    $attr[$key] = $value;
                }
                if($key == 'tipoFiltro' && $value != null && isset($value) && !empty($value)){
                     $attr["idTipo"] = $value;
                }
            }
            $query = Inmueble::find()->where($attr);
        }else{
            $query = Inmueble::find();
        }
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'nombre' => SORT_DESC,
                    'metrosTotales' => SORT_ASC, 
                ]
            ],
        ]);
        // returns an array of Post objects
        $inmuebles = $provider->getModels();      
         return $this->render('list',  [ 'inmuebles' => $inmuebles, 'provider' => $provider, 'model' => $inm]);
    }
    /**
     * Displays mapa.
     *
     * @return mixed
     */
    public function actionMapa()
    {
        return $this->render('mapa');
    }

    /**
     * Displays mapa.
     *
     * @return mixed
     */
    public function actionFavoritos()
    {

        if(!Yii::$app->user->isGuest){
            $usrId = Yii::$app->user->identity->id;
            $favs = Favoritos::find()->where(['idUser'=>$usrId])->all();
            $ids = [];
            $index = 0;
            foreach ($favs as $key => $value) {
                //var_dump($key);
                //var_dump($value) and die();
                $ids[$index] = $value->idInmueble;
                $index++;
            }
            $attr = [];
            $attr["id"] = $ids;
            $inm = new Inmueble();
            if(Yii::$app->request->get('Inmueble')){
                $inm->load(Yii::$app->request->get());
                
                foreach (Yii::$app->request->get()['Inmueble'] as $key => $value) {
                    if($key != 'tipo' && $value != null && isset($value) && !empty($value)){
                        $attr[$key] = $value;
                    }
                    if($key == 'tipo' && $value != null && isset($value) && !empty($value)){
                         $attr["idTipo"] = $value;
                    }
                }
                $query = Inmueble::find()->where($attr);
            
            }else{
           
                $query = Inmueble::find()->where($attr);
            }
        
          
            $provider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => [
                        'nombre' => SORT_DESC,
                        'metrosTotales' => SORT_ASC, 
                    ]
                ],
            ]);
            // returns an array of Post objects
            $inmuebles = $provider->getModels();      
             return $this->render('favoritos',  [ 'inmuebles' => $inmuebles, 'provider' => $provider, 'model' => $inm]);

        }else{
            return $this->actionLogin();            
        }
    }
    public function actionDislike(){
        if(!Yii::$app->user->isGuest && Yii::$app->request->isPost){

            $id = Yii::$app->request->post('Inmueble')['id'];
            $usrId = Yii::$app->user->identity->id;

            $fav = Favoritos::find()->where(["idInmueble" => $id, "idUser" => $usrId])->one();
    
            $fav->delete();
 
            return $this->render('detalle', [
                    'fav' => null,
                    'model' => Inmueble::find()->where(["id" =>$id])->one()]);
            }
            
        
    }
    public function actionFavorito()
    {   
        if(!Yii::$app->user->isGuest && Yii::$app->request->isPost){
            $id = Yii::$app->request->post('Inmueble')['id'];
            $usrId = Yii::$app->user->identity->id;

            $fav = Favoritos::find()->where(["idInmueble" => $id, "idUser" => $usrId])->one();
 
            if(!isset($fav) ){

                $fav = new Favoritos();
                $fav->idInmueble = $id;
                $fav->idUser = $usrId;
                if($fav->save()){

                  Yii::$app->session->setFlash('success', 'Inmueble guardado como favorito');
                  return $this->render('detalle', [
                    'fav' => $fav,
                    'model' => Inmueble::find()->where(["id" =>$id])->one()]);
                }
            }else{
                return $this->render('detalle', [
                    'fav' => $fav,
                    'model' => Inmueble::find()->where(["id" =>$id])->one()]);
            }

            
        }
        
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
