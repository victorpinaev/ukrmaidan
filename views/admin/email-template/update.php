<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmailTemplate */

$this->title = 'Email Template';
$this->params['breadcrumbs'][] = ['label' => 'Email Templates', 'url' => ['index']];

?>
<div class="email-template-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
