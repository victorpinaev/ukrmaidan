<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider_1 yii\data\ActiveDataProvider */
/* @var $dataProvider_2 yii\data\ActiveDataProvider */
/* @var $dataProvider_3 yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-index">
    <ul id="myTab2" class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#movies">Movies</a>
        </li>
        <li><a data-toggle="tab" href="#serials">TV Serials</a>
        </li>
        <li><a data-toggle="tab" href="#books">Books</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="movies" class="tab-pane fade in active">
            <div class="article-index">
                <h1>Movies</h1>
                <p>
                    <?= Html::a('Create Movie', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'id' => 1,
                    'dataProvider' => $dataProvider_1,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'image',
                            'format' => 'html',
                            'value' => function($data)
                            {
                                return Html::img('/uploads/' . $data->img, ['width' => '100']);
                            },
                        ],
                        'title',
                        [
                            'attribute'=>'issue',
                            'format'=>'text',
                            'content'=>function($data){
                                return $data->issue;
                            },
                            'filter'=> $searchModel->arrayYear(),
                        ],
                        [
                            'attribute'=>'genre',
                            'format'=>'text',
                            'content'=>function($data){
                                $genres = [];
                                foreach ($data->getTags()->asArray()->all() as $tag) {
                                    if ($tag['tag_category_id'] != '1') {
                                        continue;
                                    }
                                    $genres[] = $tag['name'];
                                }
                                if($genres) {
                                    return implode(', ', $genres);
                                }
                                return '';
                            },
                        ],
                        [
                            'attribute'=>'producer',
                            'format'=>'text',
                            'content'=>function($data){
                                $producers = [];
                                foreach ($data->getTags()->asArray()->all() as $tag) {
                                    if ($tag['tag_category_id'] != '2') {
                                        continue;
                                    }
                                    $producers[] = $tag['name'];
                                }
                                if($producers) {
                                    return implode(', ', $producers);
                                }
                                return '';
                            },
                        ],
                        [
                            'attribute'=>'actors',
                            'format'=>'text',
                            'content'=>function($data){
                                $actors = [];
                                foreach ($data->getTags()->asArray()->all() as $tag) {
                                    if ($tag['tag_category_id'] != '3') {
                                        continue;
                                    }
                                    $actors[] = $tag['name'];
                                }
                                if($actors) {
                                    return implode(', ', $actors);
                                }
                                return '';
                            },
                        ],
                        'rating',
                        'extension:ntext',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{genre} {producer} {actor} {update} {delete}',
                            'buttons' => [
                                'update' => function($url){
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'Update']);
                                },
                                'delete' => function($url){
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => 'delete',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete the post?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                },
                                'genre' => function($url, $model){
                                    $url = Url::to(['admin/post/tags', 'id' => $model->id, 'tag' => 'genre']);
                                    return Html::a('<span class="glyphicon glyphicon-tags"></span>', $url, ['title' => 'Add/Edit genre']);
                                },
                                'producer' => function($url, $model){
                                    $url = Url::to(['admin/post/tags', 'id' => $model->id, 'tag' => 'producer']);
                                    return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, ['title' => 'Add/Edit producer']);
                                },
                                'actor' => function($url, $model){
                                    $url = Url::to(['admin/post/tags', 'id' => $model->id, 'tag' => 'actor']);
                                    return Html::a('<span class="glyphicon glyphicon-film"></span>', $url, ['title' => 'Add/Edit actor']);
                                },
                            ]
                        ],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>

        </div>
        <div id="serials" class="tab-pane fade">
            <div class="article-index">
                <h1>Serial</h1>
                <p>
                    <?= Html::a('Create Serials', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'id' => 2,
                    'dataProvider' => $dataProvider_2,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        [
                            'attribute' => 'image',
                            'format' => 'html',
                            'value' => function($data)
                            {
                                return Html::img('/uploads/' . $data->img, ['width' => '100']);
                            },
                        ],
                        'title',
                        //'issue',
                        [
                            'attribute'=>'issue',
                            'format'=>'text',
                            'content'=>function($data){
                                return $data->issue;
                            },
                            'filter'=> $searchModel->arrayYear(),
                        ],
                        [
                            'attribute'=>'genre',
                            'format'=>'text',
                            'content'=>function($data){
                                $genres = [];
                                foreach ($data->getTags()->asArray()->all() as $tag) {
                                    if ($tag['tag_category_id'] != '1') {
                                        continue;
                                    }
                                    $genres[] = $tag['name'];
                                }
                                if($genres) {
                                    return implode(', ', $genres);
                                }
                                return '';
                            },
                        ],
                        [
                            'attribute'=>'producer',
                            'format'=>'text',
                            'content'=>function($data){
                                $producers = [];
                                foreach ($data->getTags()->asArray()->all() as $tag) {
                                    if ($tag['tag_category_id'] != '2') {
                                        continue;
                                    }
                                    $producers[] = $tag['name'];
                                }
                                if($producers) {
                                    return implode(', ', $producers);
                                }
                                return '';
                            },
                        ],
                        [
                            'attribute'=>'actors',
                            'format'=>'text',
                            'content'=>function($data){
                                $actors = [];
                                foreach ($data->getTags()->asArray()->all() as $tag) {
                                    if ($tag['tag_category_id'] != '3') {
                                        continue;
                                    }
                                    $actors[] = $tag['name'];
                                }
                                if($actors) {
                                    return implode(', ', $actors);
                                }
                                return '';
                            },
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{genre} {producer} {actor} {update} {delete}',
                            'buttons' => [
                                'update' => function($url){
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'Update']);
                                },
                                'delete' => function($url){
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => 'delete',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete the post?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                },
                                'genre' => function($url, $model){
                                    $url = Url::to(['admin/post/tags', 'id' => $model->id, 'tag' => 'genre']);
                                    return Html::a('<span class="glyphicon glyphicon-tags"></span>', $url, ['title' => 'Add/Edit genre']);
                                },
                                'producer' => function($url, $model){
                                    $url = Url::to(['admin/post/tags', 'id' => $model->id, 'tag' => 'producer']);
                                    return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, ['title' => 'Add/Edit producer']);
                                },
                                'actor' => function($url, $model){
                                    $url = Url::to(['admin/post/tags', 'id' => $model->id, 'tag' => 'actor']);
                                    return Html::a('<span class="glyphicon glyphicon-film"></span>', $url, ['title' => 'Add/Edit actor']);
                                },
                            ]
                        ],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>


        </div>
        <div id="books" class="tab-pane fade">
            <div class="article-index">
                <h1>Books</h1>
                <p>
                    <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'id' => 3,
                    'dataProvider' => $dataProvider_3,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        [
                            'attribute' => 'image',
                            'format' => 'html',
                            'value' => function($data)
                            {
                                return Html::img('/uploads/' . $data->img, ['width' => '100']);
                            },
                        ],
                        'title',
                        //'issue',
                        [
                            'attribute'=>'issue',
                            'format'=>'text',
                            'content'=>function($data){
                                return $data->issue;
                            },
                            'filter'=> $searchModel->arrayYear(),
                        ],
                        [
                            'attribute'=>'genre',
                            'format'=>'text',
                            'content'=>function($data){
                                $genres = [];
                                foreach ($data->getTags()->asArray()->all() as $tag) {
                                    if ($tag['tag_category_id'] != '1') {
                                        continue;
                                    }
                                    $genres[] = $tag['name'];
                                }
                                if($genres) {
                                    return implode(', ', $genres);
                                }
                                return '';
                            },
                        ],
                        [
                            'attribute'=>'producer',
                            'format'=>'text',
                            'content'=>function($data){
                                $producers = [];
                                foreach ($data->getTags()->asArray()->all() as $tag) {
                                    if ($tag['tag_category_id'] != '2') {
                                        continue;
                                    }
                                    $producers[] = $tag['name'];
                                }
                                if($producers) {
                                    return implode(', ', $producers);
                                }
                                return '';
                            },
                        ],
                        [
                            'attribute'=>'actors',
                            'format'=>'text',
                            'content'=>function($data){
                                $actors = [];
                                foreach ($data->getTags()->asArray()->all() as $tag) {
                                    if ($tag['tag_category_id'] != '3') {
                                        continue;
                                    }
                                    $actors[] = $tag['name'];
                                }
                                if($actors) {
                                    return implode(', ', $actors);
                                }
                                return '';
                            },
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{genre} {producer} {actor} {update} {delete}',
                            'buttons' => [
                                'update' => function($url){
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'Update']);
                                },
                                'delete' => function($url){
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => 'delete',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete the post?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                },
                                'genre' => function($url, $model){
                                    $url = Url::to(['admin/post/tags', 'id' => $model->id, 'tag' => 'genre']);
                                    return Html::a('<span class="glyphicon glyphicon-tags"></span>', $url, ['title' => 'Add/Edit genre']);
                                },
                                'producer' => function($url, $model){
                                    $url = Url::to(['admin/post/tags', 'id' => $model->id, 'tag' => 'producer']);
                                    return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, ['title' => 'Add/Edit producer']);
                                },
                                'actor' => function($url, $model){
                                    $url = Url::to(['admin/post/tags', 'id' => $model->id, 'tag' => 'actor']);
                                    return Html::a('<span class="glyphicon glyphicon-film"></span>', $url, ['title' => 'Add/Edit actor']);
                                },
                            ]
                        ],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
