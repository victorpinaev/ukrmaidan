<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin();
    $template = '{label}{input} <span class=\'label label-success\' id="upload-file-info"></span>{hint}{error}';
    ?>

    <span id="control-label">Image</span>
    <?= $form->field($model, 'img', ['template' => $template])
        ->fileInput(['class' => 'input-sm'])
        ->label('Select image', ['class' => 'btn btn-default'])
    ?>
    <?php
    if($model->img){
        echo Html::img('/uploads/' . $model->img, ['width' => 100, 'height' => 155]);
    }
    ?>
    <br><br>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issue')->dropDownList($model->arrayYear()) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard'
    ]) ?>

    <?= $form->field($model, 'extension')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList($model->categories) ?>

    <div id="movies_fields">
        <?= $form->field($model, 'duration')->textInput() ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
