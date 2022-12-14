<?php
namespace app\controllers;
use Yii;
use yii\db\Query;
use app/models;
use yii\rest\Controller;
class ApiController extends Controller{
    public function actionGetDatauser(){
        $user=new User();
        $user=(new Query())->from('users')->all();
        return $user;
    }


}
