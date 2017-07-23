<?php
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $post object*/
/* @var $tags array*/
/* @var $model app\models\GetLinkForm*/
/* @var $send_message_result bool or string*/
/* @var $alert_message string*/

$this->title = 'My Yii Application';
$cookies = Yii::$app->request->cookies;
?>
<?php
if($send_message_result) {
    $alert_class = 'danger';
    if($send_message_result == 'Success') {
        $alert_class = 'success';
    }
    ?>
    <div class="alert alert-<?= $alert_class ?>">
        <a class="close" href="#" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong><?= $send_message_result ?>!</strong> <?= $alert_message ?>
    </div>
    <?php
} ?>

<div class="col-lg-10">
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
        <a href="/" class="lang lang__ru">in Russian</a>
        <button class="btn-post btn-getTheLink btn btn-primary">Get the link</button>

    </div>
</div>
<div id="modalGetTheLink" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <p class="modal-title text-center">
                    To receive the link, please enter your name and e-mail address.
                    <br>Administrator sites will contact you within 15 minutes.
                </p>
            </div>
            <div class="modal-body">
                <?php
                $form = ActiveForm::begin(['enableClientValidation' => false,'id' =>'getlinkform','options'=>['class' => 'form-horizontal']]);
                $template = '{label}<div class="col-xs-10">{input}</div>{hint}{error}';
                ?>
                <?= $form->field($model, 'post_id')
                    ->hiddenInput()
                    ->label(false); ?>
                <?= $form->field($model, 'name', ['template' => $template])
                    ->textInput(['placeholder' => 'Enter your name'])
                    ->label(null, ['class' => 'col-xs-2 control-label'])
                    ->error(['class' => 'help-block help-block-error col-xs-10']); ?>
                <?= $form->field($model, 'email', ['template' => $template])
                    ->textInput(['placeholder' => 'Enter your email'])
                    ->label(null, ['class' => 'col-xs-2 control-label'])
                    ->error(['class' => 'help-block help-block-error col-xs-10']); ?>
                    <div class="form-group">
                        <div class="col-xs-offset-2 col-xs-10">
                            <button type="submit" class="btn btn-default btn-post">Get the link</button>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <!--<div class="modal-footer">-->
            <!--</div>-->
        </div>
    </div>
</div>
