<?php

namespace salehasadi\rating\controllers;

use Yii;
use yii\web\Controller;
use salehasadi\rating\models\Rating;

class DefaultController extends Controller
{
	
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
		
        return $this->render('view');
    }
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
