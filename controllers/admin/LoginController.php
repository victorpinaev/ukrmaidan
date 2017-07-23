<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use yii\helpers\Url;
use yii\web\HttpException;

class LoginController extends Controller
{
    function init()
    {
        parent::init();
        $allowed_ip_ar = explode(',', Yii::$app->params['ip_list']);
        if (!in_array(Yii::$app->request->getUserIP(), $allowed_ip_ar)) {
            throw new HttpException(404, 'Page not exists');
        }
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
        ];
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return Yii::$app->getResponse()->redirect(Url::to(['admin/post/index']));
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack(Url::to(['admin/post/index']));
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    /**
     * Signs admin up.
     * admin/login/add-admin/?login=admin&pass=123456
     */
    /*public function actionAddAdmin($login, $pass)
    {
        if(!$login || !$pass) {
            exit('No login or password');
        }
        $user = new Admin();
        $user->username = $login;
        $user->email = 'admin@test.com';
        $user->setPassword($pass);
        $user->generateAuthKey();

        echo $user->save() ? 'Ok' : 'Error';
        exit;
    }*/

}
