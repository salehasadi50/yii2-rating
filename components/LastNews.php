<?php

namespace elephantsGroup\news\components;

use Yii;
use elephantsGroup\news\models\News;
use elephantsGroup\news\models\NewsTranslation;
use yii\base\Widget;
use yii\helpers\Html;

class LastNews extends Widget
{
	public $number = 3;
	public $language;
	public $title;
	public $subtitle;
	public $title_is_link = true;
	public $news_title_is_link = true;
	public $show_global_more = false;
	public $global_more_text = '';
	public $show_archive_button = false;
	public $archive_button_text = '';

	protected $_news = [];

	public function init()
	{
		if(!isset($this->language) || !$this->language)
			$this->language = Yii::$app->language;
		if(!isset($this->title) || !$this->title)
			$this->title = Yii::t('news_params', 'Last News Title');
		if(!isset($this->subtitle))
			$this->subtitle = Yii::t('news_params', 'Last News Subtitle');
		if(!isset($this->global_more_text))
			$this->global_more_text = Yii::t('news_params', 'Global More Text');
		if(!isset($this->archive_button_text))
			$this->archive_button_text = Yii::t('news_params', 'Archive Button Text');
	}

    public function run()
	{
		$news = News::find()->confirmed()->orderBy(['creation_time'=>SORT_DESC])->all();
		$i = 0;
		foreach($news as $news_item)
		{
			if($i == $this->number) break;
			$translation = NewsTranslation::findOne(array('news_id'=>$news_item->id, 'language'=>$this->language));
			if($translation)
			{
				$this->_news[] = ['id'=>$news_item['id'], 'thumb'=>$news_item['thumb'], 'title'=>$translation->title, 'subtitle'=>$translation->subtitle, 'intro'=>$translation->intro];
				$i++;
			}
		}

		return $this->render('last_news', [
			'news'=>$this->_news,
			'last_news_title'=>$this->title,
			'last_news_subtitle'=>$this->subtitle,
			'title_is_link'=>$this->title_is_link,
			'news_title_is_link'=>$this->news_title_is_link,
			'language'=>$this->language,
			'show_global_more'=>$this->show_global_more,
			'global_more_text'=>$this->global_more_text,
			'show_archive_button'=>$this->show_archive_button,
			'archive_button_text'=>$this->archive_button_text,
		]);
	}
}