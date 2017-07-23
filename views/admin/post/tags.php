<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $ar array */
/* @var $show_success bool */
/* @var $searchModel app\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $title_tag string */

$this->title = 'Tags for ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if($show_success) {?>
    <div class="alert alert-success">
        <strong>Success!</strong> Tags for post successfully saved.
    </div>
<?php } ?>
<div class="post-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::beginForm() ?>
    <h3><?= $title_tag ?></h3>
       <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'name' => 'tags[]',
                'checkboxOptions' => function($data) use ($ar) {
                    return ['value' => $data['id'], 'checked'=> in_array($data['id'], $ar) ? true : false];
                },
            ],
            'name',
        ],
    ]); ?>
    <?= Html::submitButton('Save', ['class'=>'btn btn-primary', 'name' => 'tag_form']) ?>
    <?= Html::endForm() ?>
</div>
