<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Category;
use Yii;

class CategoryController extends Controller
{
    public function actionGetDataCategory(){
        $catProd=Category::find()->all();
        return $catProd;
    }

    public function actionUpdateCategory($id_category){
        $catProd = Category::findOne($id_category);
        if($catProd->load(Yii::$app->request->post(), '')){
            if($catProd->validate() && $catProd->save()) {
                        return $catProd->id_category;
                    }
            }else {
                    Yii::$app->response->statusCode = 422;
                    return $catProd->errors;
                }
            }
            public function actionAddCategory(){
                $catProd = new Category();
                if($catProd->load(Yii::$app->request->post(), '')){
                    if($catProd->validate() && $catProd->save()) {
                        return $catProd->id_category;
                    }
                }else {
                    Yii::$app->response->statusCode = 422;
                    return $catProd->errors;
                }
            }
            public function actionDeleteCategory($id_category)
            {
                $catProd = Category::findOne($id_category);
                if($catProd->delete()){
                    return true;
                }else {
                    return $catProd->errors;
                }
            }

}
