<?php

namespace salehasadi\rating\controllers;

use Yii;

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
}
