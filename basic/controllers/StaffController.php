<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Staff;
use Yii;

class StaffController extends Controller
{
    public function actionGetDataStaff(){
        $staff=Staff::find()->all();
        return $staff;
    }

    public function actionUpdateStaff($id_staff){
        $staff = Staff::findOne($id_staff);
        if($staff->load(Yii::$app->request->post(), '')){
            if($staff->validate() && $staff->save()) {
                        return $staff->id_staff;
                    }
            }else {
                    Yii::$app->response->statusCode = 422;
                    return $staff->errors;
                }
            }
            public function actionAddStaff(){
                $staff = new Staff();
                if($staff->load(Yii::$app->request->post(), '')){
                    if($staff->validate() && $staff->save()) {
                        return $staff->id_staff;
                    }
                }else {
                    Yii::$app->response->statusCode = 422;
                    return $staff->errors;
                }
            }
            public function actionDeleteStaff($id_staff)
            {
                $staff = Staff::findOne($id_staff);
                if($staff->delete()){
                    return true;
                }else {
                    return $staff->errors;
                }
            }

}