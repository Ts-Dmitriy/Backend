<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Subcategory;
use app\models\Category;
use Yii;

class SubcategoryController extends Controller
{
    public function actionGetDataSubcategory(){
        $subCatProd=Subcategory::find()->all();
        return $subCatProd;
    }

    public function actionUpdateSubcategory($id_subCat){
        $subCatProd = Subcategory::findOne($id_subCat);
        if($subCatProd->load(Yii::$app->request->post(), '')){
            if($subCatProd->validate() && $subCatProd->save()) {
                        return $subCatProd->id_subCat;
                    }
            }else {
                    Yii::$app->response->statusCode = 422;
                    return $subCatProd->errors;
                }
            }
            public function actionAddSubcategory(){
                $subCatProd = new Subcategory();
                if($subCatProd->load(Yii::$app->request->post(), '')){
                    if($subCatProd->validate() && $subCatProd->save()) {
                        return $subCatProd->id_subCat;
                    }
                }else {
                    Yii::$app->response->statusCode = 422;
                    return $subCatProd->errors;
                }
            }
            public function actionDeleteSubcategory($id_subCat)
            {
                $subCatProd = Subcategory::findOne($id_subCat);
                if($subCatProd->delete()){
                    return true;
                }else {
                    return $subCatProd->errors;
                }
            }

}