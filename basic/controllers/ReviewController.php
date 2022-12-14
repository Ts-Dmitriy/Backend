<?php
namespace app\controllers;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
use app\models\Review;
use yii\web\UploadedFile;
use Yii;


class ReviewController extends Controller
{
    public function actionUpload(){
        $review = new Review();
        if($review->load(Yii::$app->request->post(), '')){
             $review-> imageFile = UploadedFile::getInstancesByName($review->imageFile);
            if($review->validate() && $review->save()) {
                $review->imageFile=$review->upload();
                return $review->id_review;
            }
        }else {
            Yii::$app->response->statusCode = 422;
            return $review->errors;
        }
    }
}
