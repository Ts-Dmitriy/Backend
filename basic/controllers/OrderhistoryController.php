<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Orderhistory;
use Yii;

class OrderhistoryController extends Controller
{
    public function actionGetDataOrderhistory(){
        $orderHistory=Orderhistory::find()->all();
        return $orderHistory;
    }

    public function actionUpdateOrderhistory($id_order){
        $orderHistory = Orderhistory::findOne($id_order);
        if($orderHistory->load(Yii::$app->request->post(), '')){
            if($orderHistory->validate() && $orderHistory->save()) {
                        return $orderHistory->id_order;
                    }
            }else {
                    Yii::$app->response->statusCode = 422;
                    return $orderHistory->errors;
                }
            }
            public function actionAddOrderhistory(){
                $orderHistory = new Orderhistory();
                if($orderHistory->load(Yii::$app->request->post(), '')){
                    if($orderHistory->validate() && $orderHistory->save()) {
                        return $orderHistory->id_order;
                    }
                }else {
                    Yii::$app->response->statusCode = 422;
                    return $orderHistory->errors;
                }
            }
            public function actionDeleteOrderhistory($id_order)
            {
                $orderHistory = Orderhistory::findOne($id_order);
                if($orderHistory->delete()){
                    return true;
                }else {
                    return $orderHistory->errors;
                }
            }

}