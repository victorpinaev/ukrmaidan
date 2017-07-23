<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $posts array*/
/* @var $cat int*/

$this->title = 'My Yii Application';
$cookies = Yii::$app->request->cookies;
?>

<div class="col-lg-12 post-switcher">
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-default<?= $cat == 1 ? ' active' : '' ?>">
            <input type="radio" name="options" value="1">Movies</label>
        <label class="btn btn-default<?= $cat == 2 ? ' active' : '' ?>">
            <input type="radio" name="options" value="2">TV Series</label>
        <label class="btn btn-default<?= $cat == 3 ? ' active' : '' ?>">
            <input type="radio" name="options" value="3">Music</label>
        <label class="btn btn-default<?= $cat == 4 ? ' active' : '' ?>">
            <input type="radio" name="options" value="4">eBooks</label>
    </div>
</div>
<div class="col-lg-10">
<?php
if(!$posts) {
    ?>
    <h3>No results were found for this search.</h3>
    <?php
}
foreach ($posts as $post) {
    $tags = $post->selectTags();
    ?>
    <!-- blog list -->
    <div class="post-wrap col-lg-12 panel panel-default">
        <img class="post-banner pull-left" src="/uploads/<?= $post->img ?>" alt="post-banner" width="180" height="250">
        <h3 class="post-title"><?= $post->title ?><span class="year"><?= $post->issue ? '('.$post->issue.')' : '' ?></span></h3>
        <div class="duration">
            <?php
            if($post->duration && strpos($post->duration, ':') !== false) {
                $duration = explode(':', $post->duration);
                echo isset($duration[0]) ? '<span class="hour">' . $duration[0] .'h</span>' : '';
                echo isset($duration[1]) ? '<span class="minutes">' . $duration[1] .'min</span>' : '';
            }?>
        </div>
        <div class="genre">
            <?php
            if($tags['genre']) {
                echo implode(', ', $tags['genre']);
            }
            ?>
        </div>
        <div class="rating-wrap">
            <?php
            $disabled = '';
            $count = $post->rating_count ? $post->rating_count : 1;
            $rating = round($post->rating/$count, 1);
            $round = floor($rating);
            if($cookies->has('key'.$post->id)) {
                $s = Yii::$app->getSecurity();
                if($s->validatePassword($post->id.'rating', $cookies['key'.$post->id]->value)) {
                    $disabled = ' disabled';
                }
            }
            ?>

            <input type="text" class="rating post-rating" data-value="<?php echo $post->id; ?>" value="<?php
            echo ($round  + 0.5 > $rating ? $round : $round  + 0.5 );?>"<?= $disabled; ?>>
        </div>
        <div class="description">
            <?= $post->description ?>
        </div>
        <div class="director">
            <?php
            if($tags['producer']) {
                echo '<span>Director: </span>' . implode(', ', $tags['producer']);
            }
            ?>
        </div>
        <div class="cast">
            <?php
            if($tags['actor']) {
                echo '<span>Cast: </span>' . implode(', ', $tags['actor']);
            }
            ?>
        </div>
        <a class="btn-post btn btn-primary" href="<?= Url::to(['site/post', 'id' => $post->id]); ?>" target="_blank">Read more</a>
    </div>
    <!-- blog list -->
<?php
}
?>
</div>


