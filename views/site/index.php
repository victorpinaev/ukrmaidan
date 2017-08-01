<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $posts array*/
/* @var $cat int*/

$this->title = 'My Yii Application';
$cookies = Yii::$app->request->cookies;
?>

<div class="col-lg-12">
    <div class="sl_slider single-item">
        <div class="slide_1">
            <img src="/static/img/sliders/slide-1-big.jpg">
        </div>
        <div class="slide_2">
            <img src="/static/img/sliders/slide-2-big.jpg">
        </div>
        <div class="slide_3">
            <img src="/static/img/sliders/slide-3-big.jpg">
        </div>
        <div class="slide_4">
            <img src="/static/img/sliders/slide-4-big.jpg">
        </div>
        <div class="slide_5">
            <img src="/static/img/sliders/slide-5-big.jpg">
        </div>
        <div class="slide_6">
            <img src="/static/img/sliders/slide-6-big.jpg">
        </div>
    </div>
    <div class="row category_block">
        <?= $this->render('//home/sidebar') ?>
    </div>
</div>


