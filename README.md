yii2-widget-rating


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

1- برای نصب ماژول ابتدا ویجت ریتینگ را نصب کنید

```
$ php composer.phar require kartik-v/yii2-widget-rating "*"
```
2- برای نصب ماژول دستور زیر را در کامپوزر پروژه خود وارد کنید

```
$ php composer.phar require kartik-v/yii2-widget-rating "*"
```
3- برا بخش نمایش امتیاز دهی کاربران کد زیر را در ویو پروژه خود قرار دهید

```php
<?php echo kartik\rating\StarRating::widget(['name' => 'rating_35','value' => 3,'pluginOptions' => ['displayOnly' => true]]);?>
```
4- برای بخش امتیاز دهی کد زیر که در مودال قرار گرفته را در ویو سایت خود قرار دهید


<div class="modal">
    <div class="content vertical-align-middle">
        ```php		    
        <?= kartik\rating\StarRating::widget(['name' => 'rating_1_'. $models->id,'pluginOptions' =>['showClear'=>false], 'pluginEvents' =>["rating.change" => "send_favorite_1_" . $models->id]]);?>
        ```
        <p>Please rate this app</p>
        <a href="" class="rate" id="">ثبت نظر</a>
        <a class="close-btn" href="#start">X</a>
    </div>
</div>