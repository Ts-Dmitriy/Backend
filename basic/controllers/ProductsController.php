<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Products;
use Yii;

class ProductsController extends Controller
{
    public function actionGetDataProducts(){
        $product=Products::find()->all();
        return $product;
    }

    public function actionUpdateProducts($id_product){
        $product = Products::findOne($id_product);
        if($product->load(Yii::$app->request->post(), '')){
            if($product->validate() && $product->save()) {
                        return $product->id_product;
                    }
            }else {
                    Yii::$app->response->statusCode = 422;
                    return $product->errors;
                }
            }
            public function actionAddProducts(){
                $product = new Products();
                if($product->load(Yii::$app->request->post(), '')){
                    if($product->validate() && $product->save()) {
                        return $product->id_product;
                    }
                }else {
                    Yii::$app->response->statusCode = 422;
                    return $product->errors;
                }
            }
            public function actionDeleteProducts($id_product)
            {
                $product = Products::findOne($id_product);
                if($product->delete()){
                    return true;
                }else {
                    return $product->errors;
                }
            }

}