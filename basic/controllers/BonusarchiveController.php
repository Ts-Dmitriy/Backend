<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Bonusarchive;
use Yii;

class BonusarchiveController extends Controller
{
    public function actionGetDataBonusarchive(){
        $bonusarchive=Bonusarchive::find()->all();
        return $bonusarchive;
    }

    public function actionUpdateBonusarchive($id_bonusarchive){
        $bonusarchive = Bonusarchive::findOne($id_bonusarchive);
        if($bonusarchive->load(Yii::$app->request->post(), '')){
            if($bonusarchive->validate() && $bonusarchive->save()) {
                        return $bonusarchive->id_bonusarchive;
                    }
            }else {
                    Yii::$app->response->statusCode = 422;
                    return $bonusarchive->errors;
                }
            }
            public function actionAddBonusarchive(){
                $bonusarchive = new Bonusarchive();
                if($bonusarchive->load(Yii::$app->request->post(), '')){
                    if($bonusarchive->validate() && $bonusarchive->save()) {
                        return $bonusarchive->id_bonusarchive;
                    }
                }else {
                    Yii::$app->response->statusCode = 422;
                    return $bonusarchive->errors;
                }
            }
            public function actionDeleteBonusarchive($id_bonusarchive)
            {
                $bonusarchive = Bonusarchive::findOne($id_bonusarchive);
                if($bonusarchive->delete()){
                    return true;
                }else {
                    return $bonusarchive->errors;
                }
            }

}