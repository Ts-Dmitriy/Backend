<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Users;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use Yii;

class UserController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // remove authentication filter
        $auth = $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
//                HttpBasicAuth::class,
                HttpBearerAuth::class,
//                QueryParamAuth::class,
            ],
        ];
        unset($behaviors['authenticator']);

        $behaviors['authenticator'] = $auth;

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['get-data', 'add-user', 'update-user', 'delete-user'],
                    'roles' => ['admin', 'moderator'],
                ],
                [
                    'allow' => true,
                    'actions' => ['get-roles'],
                    'roles' => ['admin'],
                ],
            ],
        ];
        return $behaviors;
    }






    public function actionGetData(){
        $user=USERS::find()->all();
        return $user;
    }

    public function actionUpdateUser($id_user){
        $user = USERS::findOne($id_user);
        if($user->load(Yii::$app->request->post(), '')){
            if($user->validate() && $user->save()) {
                        return $user->id_user;
                    }
            }else {
                    Yii::$app->response->statusCode = 422;
                    return $user->errors;
                }
            }
            public function actionAddUser(){
                $user = new USERS();
                if($user->load(Yii::$app->request->post(), '')){
                   $user->password_hash=$user->setPassword($user->password_hash);
                    $user->access_token=$user->generateAuthKey(); 
                    if($user->validate() && $user->save()) {
                        return $user->id_user;
                    }
                }else {
                    Yii::$app->response->statusCode = 422;
                    return $user->errors;
                }
            }
            public function actionDeleteUser($id_user)
            {
                $user = USERS::findOne($id_user);
                if($user->delete()){
                    return true;
                }else {
                    return $user->errors;
                }
            }


            

}
