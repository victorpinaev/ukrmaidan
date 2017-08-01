<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $posts array*/
/* @var $cat int*/

$this->title = $posts[0]->category->title;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-12">
<?php
if(!$posts) {
    ?>
    <!-- <h3>No results were found for this search.</h3> -->
    <?php
}
foreach ($posts as $post) {
    $tags = $post->selectTags();
    $excerpt = substr($post->description, 0,500) . '...';
    ?>
    <!-- blog list -->
    <div class="post-wrap col-lg-12 panel panel-default">
        <img class="post-banner pull-left" src="/uploads/<?= $post->img ?>" alt="post-banner" width="300">
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
        <div class="description">
            <?= $excerpt ?>
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
        <a class="btn-post btn btn-primary" href="<?= Url::to(['site/post', 'id' => $post->id]); ?>">Детальнiше</a>
    </div>
    <!-- blog list -->
<?php
}
?>
</div>


