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
<span id="start" class="target"><!-- Hidden anchor to close all modals --></span>
<span id="about_<?= $models->id ?>" class="target"><!-- Hidden anchor to open adjesting modal container--></span>
<div class="modal">
    <div class="content vertical-align-middle">
        <?php $module = Yii::$app->getModule('rating'); ?>
        <?php echo salehasadi\rating\components\StarRating::widget(['service_id' => $module->services['car'], 'item_id' => $models->id]); ?>
        <p>Please rate this app</p>
        <a href="" class="rate" id="">ثبت نظر</a>
        <a class="close-btn" href="#start">X</a>
    </div>
</div>

<div class="page-container">
    <?php  if (Yii::$app->user->isGuest) {
            echo '<p><a href="http://localhost/kmsdev-carwar/user/login">ثبت نظر</a></p>';
        } else { ?>
    <p><a href="#about_<?= $models->id ?>">نظر خود را ثبت کنید</a></p> <?php } ?>
</div>
```
4- شما به جدولهای دیتا بیس برای ذخیره کردن نظر سنجی احتیاج دارید
```bash
$ php yii migrate/up --migrationPath=@vendor/salehasadi/yii2-rating/migrations
```
5- شما باید ماژول خود را در کانفیگ پروژه تعریف کنید
```bash
'rating'=>[
        'class' => 'salehasadi\rating\Module',
        'services'=>[
        'car' => 1,
        'news' => 2,
        ],
]
```
6- است ها را در ویو خود اعمال کنید
```php
use salehasadi\rating\assets\RatingAsset;
RatingAsset::register($this);

```