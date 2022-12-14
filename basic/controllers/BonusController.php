<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Bonus;
use Yii;

class BonusController extends Controller
{
    public function actionGetDataBonus(){
        $bonus=Bonus::find()->all();
        return $bonus;
    }

    public function actionUpdateBonus($id_bonus){
        $bonus = Bonus::findOne($id_bonus);
        if($bonus->load(Yii::$app->request->post(), '')){
            if($bonus->validate() && $bonus->save()) {
                        return $bonus->id_bonus;
                    }
            }else {
                    Yii::$app->response->statusCode = 422;
                    return $bonus->errors;
                }
            }
            public function actionAddBonus(){
                $bonus = new Bonus();
                if($bonus->load(Yii::$app->request->post(), '')){
                    if($bonus->validate() && $bonus->save()) {
                        return $bonus->id_bonus;
                    }
                }else {
                    Yii::$app->response->statusCode = 422;
                    return $bonus->errors;
                }
            }
            public function actionDeleteBonus($id_bonus)
            {
                $bonus = Bonus::findOne($id_bonus);
                if($bonus->delete()){
                    return true;
                }else {
                    return $bonus->errors;
                }
            }

}