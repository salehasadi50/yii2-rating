<?php

namespace salehasadi\rating\components;

use Yii;
use salehasadi\rating\models\Rating;

use yii\base\Widget;
use yii\helpers\Html;

class StarRating extends Widget
{
	public $service_id;
	public $item_id;

    public function run()
	{
		return $this->render('star_rating', [
			'service_id'=>$this->service_id,
			'item_id'=>$this->item_id,
		]);
	}
}