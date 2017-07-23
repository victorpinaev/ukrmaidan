<?php
use yii\helpers\Html;
$params = Yii::$app->request->queryParams;
?>
<header class="page-header">
    <div class="container">
        <!--<form>-->
        <div class="row">
            <div class="col-lg-8">
                <?= Html::beginForm('/web/', 'get', ['id' => 'post_search_form']) ?>
                    <input id="cat_hidden_field" type="hidden" name="PostSearch[category_id]" value="<?php
                    echo isset($params['PostSearch']['category_id']) ? $params['PostSearch']['category_id'] : '' ; ?>">
                    <div class="input-group">
                        <input name="PostSearch[title]" type="text" class="form-control" value="<?php
                        echo isset($params['PostSearch']['title']) ? $params['PostSearch']['title'] : '' ;?>">
                        <span class="input-group-btn"><button class="btn btn-primary">Search</button></span>
                    </div>
                <?= Html::endForm() ?>
            </div>
            <div class="col-lg-4">
                <button id="btnAdvanceSearch" class="btn btn-primary" type="button">Advance search</button>
            </div>
        </div>
        <!--</form>-->
    </div>
</header>