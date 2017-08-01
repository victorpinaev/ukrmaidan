<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\HomeAsset;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;

HomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="page">
<?php $this->beginBody() ?>
    <!-- BEGIN HEADER -->
    <?= $this->render('//home/header') ?>
    <!-- HEADER END -->

    <section class="page__wrapper container">
        <!-- BEGIN Tab -->
        <?= $this->render('//home/tab') ?>
        <!-- Tab END -->
        <aside class="topAdUnit text-center">
            <div class="post-switcher">
                <?= Breadcrumbs::widget([
                    'homeLink' => ['label' => 'Головна', 'url' => [Url::to(['site/index'])]] ,
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
        </aside>
        <div class="row">
            <?= $content ?>
        </div>
        <div class="container text-center">
            <?php
            if(isset($this->params['pages'])) {
                echo LinkPager::widget([
                    'pagination' => $this->params['pages'],
                ]);
            }
             ?>
        </div>
        <div class="page__buffer"></div>
    </section>
    <!-- BEGIN FOOTER -->
    <?= $this->render('//home/footer') ?>
    <!-- FOOTER END -->

<?php $this->endBody() ?>
    <script>
        var url = '<?php echo Url::toRoute(['site/rating'])?>';
    </script>
</body>
</html>
<?php $this->endPage() ?>
