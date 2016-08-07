<?php
namespace salehasadi\rating\controllers;

use Yii;
use salehasadi\rating\models\Rating;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class RatingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionAjax()
    {
        $model = new Rating;

        $rated = Rating::find()->where(['service_id' => $_POST['service_id'],'item_id' => $_POST['item_id'],'user_id' => Yii::$app->user->id]);

        if ($rated->exists()) {
            return 'error';
        }else{
            $model->service_id = $_POST['service_id'];
            $model->item_id = $_POST['item_id'];
            $model->value = $_POST['value'];
            $model->user_id = Yii::$app->user->id;
            if($model->save())
                return 'success';
            else
                return var_export($model->errors, true);
        }

        
    }
}
