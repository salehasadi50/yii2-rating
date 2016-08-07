<?php
/**
 * Created by PhpStorm.
 * User: bigdrop
 * Date: 19.10.15
 * Time: 14:22
 */
namespace salehasadi\rating\assets;

use yii\web\AssetBundle;

class VoteAsset extends AssetBundle{
    public $sourcePath = '@vendor/salehasadi/yii2-rating/assets';
    public $basePath = '@vendor/salehasadi/yii2-rating/assets';

    public $css = [
        'css/demos.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}