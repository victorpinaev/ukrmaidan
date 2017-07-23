<?php
use yii\helpers\Html;
use app\models\Post;

$params = Yii::$app->request->post();
$title_1 = $genre_1 = $producer_1 = $issue_1 = $extension_1 = '';
$title_2 = $genre_2 = $producer_2 = $issue_2 = $extension_2 = '';
$title_3 = $genre_3 = $producer_3 = $issue_3 = $extension_3 =  '';
$title_4 = $genre_4 = $producer_4 = $issue_4 = $extension_4 =  '';

$cat = 1;
if(isset($params['PostSearch'])) {
    $post = $params['PostSearch'];
    $cat = $post['category_id'];
    switch ($post['category_id']) {
        case 1:
            $title_1 = isset($post['title']) ? $post['title'] : '';
            $genre_1 = isset($post['genre']) ? $post['genre'] : '';
            $producer_1 = isset($post['producer']) ? $post['producer'] : '';
            $issue_1 = isset($post['issue']) ? $post['issue'] : '';
            $extension_1 = isset($post['extension']) ? $post['extension'] : '';
            break;
        case 2:
            $title_2 = isset($post['title']) ? $post['title'] : '';
            $genre_2 = isset($post['genre']) ? $post['genre'] : '';
            $producer_2 = isset($post['producer']) ? $post['producer'] : '';
            $issue_2 = isset($post['issue']) ? $post['issue'] : '';
            $extension_2 = isset($post['extension']) ? $post['extension'] : '';
            break;
        case 3:
            $title_3 = isset($post['title']) ? $post['title'] : '';
            $genre_3 = isset($post['genre']) ? $post['genre'] : '';
            $producer_3 = isset($post['producer']) ? $post['producer'] : '';
            $issue_3 = isset($post['issue']) ? $post['issue'] : '';
            $extension_3 = isset($post['extension']) ? $post['extension'] : '';
            break;
        case 4:
            $title_4 = isset($post['title']) ? $post['title'] : '';
            $genre_4 = isset($post['genre']) ? $post['genre'] : '';
            $producer_4 = isset($post['producer']) ? $post['producer'] : '';
            $issue_4 = isset($post['issue']) ? $post['issue'] : '';
            $extension_4 = isset($post['extension']) ? $post['extension'] : '';
            break;
    }
}
$hidden_class = Yii::$app->controller->action->id != 'search' ? ' hidden' : '';
?>
<!-- Include your modules here -->
<div class="advanceSearch tabs tabs-style-tzoid<?= $hidden_class ?>">
    <nav>
        <ul id="advanceSearchTab" class="nav nav-tabs">
            <li class="<?= $cat == 1 ? 'active' : '' ?>"><a href="#panel1">Movies</a>
            </li>
            <li class="<?= $cat == 2 ? 'active' : '' ?>"><a href="#panel2">TV Series</a>
            </li>
            <li class="<?= $cat == 3 ? 'active' : '' ?>"><a href="#panel3">Music</a>
            </li>
            <li class="<?= $cat == 4 ? 'active' : '' ?>"><a href="#panel4">eBooks</a>
            </li>
        </ul>
    </nav>
    <div class="tab-content">
        <div id="panel1" class="tab-pane fade <?= $cat == 1 ? ' active in' : '' ?>">
            <?= Html::beginForm('/site/search', 'post', ['id' => 'advanceSearchMovies', 'class' => 'form-inline']) ?>
                <input type="hidden" name="PostSearch[category_id]" value="1">
                <input type="text" class="form-control" name="PostSearch[title]" placeholder="Title" value="<?= $title_1 ?>">
                <input type="text" class="form-control" name="PostSearch[genre]" placeholder="Genre" value="<?= $genre_1 ?>">
                <input type="text" class="form-control" name="PostSearch[producer]" placeholder="Director" value="<?= $producer_1 ?>">
                <input type="text" class="form-control" name="PostSearch[issue]" placeholder="Year" value="<?= $issue_1 ?>">
                <?= Html::dropDownList('PostSearch[extension]', $extension_1, Post::arrayExtension(), ['class' => 'form-control']) ?>
                <button type="submit" class="btn btn-primary">Search</button>
                <?= Html::endForm() ?>
        </div>
        <div id="panel2" class="tab-pane fade<?= $cat == 2 ? ' active in' : '' ?>">
            <?= Html::beginForm('/site/search', 'post', ['id' => 'advanceSearchSeries', 'class' => 'form-inline']) ?>
            <input type="hidden" name="PostSearch[category_id]" value="2">
            <input type="text" class="form-control" name="PostSearch[title]" placeholder="Title" value="<?= $title_2 ?>">
            <input type="text" class="form-control" name="PostSearch[genre]" placeholder="Genre" value="<?= $genre_2 ?>">
            <input type="text" class="form-control" name="PostSearch[producer]" placeholder="Director" value="<?= $producer_2 ?>">
            <input type="text" class="form-control" name="PostSearch[issue]" placeholder="Year" value="<?= $issue_2 ?>">
            <?= Html::dropDownList('PostSearch[extension]', $extension_2, Post::arrayExtension(), ['class' => 'form-control']) ?>
            <button type="submit" class="btn btn-primary">Search</button>
            <?= Html::endForm() ?>
        </div>
        <div id="panel3" class="tab-pane fade<?= $cat == 3 ? ' active in' : '' ?>">
            <?= Html::beginForm('/site/search', 'post', ['id' => 'advanceSearchMusic', 'class' => 'form-inline']) ?>
            <input type="hidden" name="PostSearch[category_id]" value="3">
            <input type="text" class="form-control" name="PostSearch[title]" placeholder="Title" value="<?= $title_3 ?>">
            <input type="text" class="form-control" name="PostSearch[genre]" placeholder="Genre" value="<?= $genre_3 ?>">
            <input type="text" class="form-control" name="PostSearch[producer]" placeholder="Director" value="<?= $producer_3 ?>">
            <input type="text" class="form-control" name="PostSearch[issue]" placeholder="Year" value="<?= $issue_3 ?>">
            <?= Html::dropDownList('PostSearch[extension]', $extension_3, Post::arrayExtension(), ['class' => 'form-control']) ?>
            <button type="submit" class="btn btn-primary">Search</button>
            <?= Html::endForm() ?>
        </div>
        <div id="panel4" class="tab-pane fade<?= $cat == 4 ? ' active in' : '' ?>">
            <?= Html::beginForm('/site/search', 'post', ['id' => 'advanceSearchBooks', 'class' => 'form-inline']) ?>

            <input type="hidden" name="PostSearch[category_id]" value="4">
            <input type="text" class="form-control" name="PostSearch[title]" placeholder="Title" value="<?= $title_4 ?>">
            <input type="text" class="form-control" name="PostSearch[genre]" placeholder="Genre" value="<?= $genre_4  ?>">
            <input type="text" class="form-control" name="PostSearch[producer]" placeholder="Director" value="<?= $producer_4  ?>">
            <input type="text" class="form-control" name="PostSearch[issue]" placeholder="Year" value="<?= $issue_4  ?>">
            <?= Html::dropDownList('PostSearch[extension]', $extension_4, Post::arrayExtension(), ['class' => 'form-control']) ?>
            <button type="submit" class="btn btn-primary">Search</button>
            <?= Html::endForm() ?>
        </div>
    </div>
</div>