<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Branch;
use Yii;

class BranchController extends Controller
{
    public function actionGetDataBranch(){
        $branch=Branch::find()->all();
        return $branch;
    }

    public function actionUpdateBranch($id_branch){
        $branch = Branch::findOne($id_branch);
        if($branch->load(Yii::$app->request->post(), '')){
            if($branch->validate() && $branch->save()) {
                        return $branch->id_branch;
                    }
            }else {
                    Yii::$app->response->statusCode = 422;
                    return $branch->errors;
                }
            }
            public function actionAddBranch(){
                $branch = new Branch();
                if($branch->load(Yii::$app->request->post(), '')){
                    if($branch->validate() && $branch->save()) {
                        return $branch->id_branch;
                    }
                }else {
                    Yii::$app->response->statusCode = 422;
                    return $branch->errors;
                }
            }
            public function actionDeleteBranch($id_branch)
            {
                $branch = Branch::findOne($id_branch);
                if($branch->delete()){
                    return true;
                }else {
                    return $branch->errors;
                }
            }

}