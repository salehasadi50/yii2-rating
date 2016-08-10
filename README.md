yii2-widget-rating


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).


1- برای نصب ماژول دستور زیر را در کامپوزر پروژه خود وارد کنید

```
$ php composer.phar require salehasadi/yii2-rating
```
2- برا بخش نمایش امتیاز دهی کاربران کد زیر را در ویو پروژه خود قرار دهید

```php
<?php echo kartik\rating\StarRating::widget(['name' => 'rating_35','value' => 3,'pluginOptions' => ['displayOnly' => true]]);?>
```
3- برای بخش امتیاز دهی کد زیر که در مودال قرار گرفته را در ویو سایت خود قرار دهید

```html
<div class="modal">
    <div class="content vertical-align-middle">
		    
    	<?= kartik\rating\StarRating::widget(['name' => 'rating_1_'. $models->id,'pluginOptions' =>['showClear'=>false], 'pluginEvents' =>["rating.change" => "send_favorite_1_" . $models->id]]);?>
	
        <p>Please rate this app</p>
        <a href="" class="rate" id="">ثبت نظر</a>
        <a class="close-btn" href="#start">X</a>
    </div>
</div>
```
4- شما به جدولهای دیتا بیس برای ذخیره کردن نظر سنجی احتیاج دارید
```bash
$ php yii migrate/up --migrationPath=@vendor/salehasadi/yii2-tag/migrations
```