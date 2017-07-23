<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\PostSearch;
use app\models\Post;
use app\models\GetLinkForm;
use yii\data\Pagination;
use yii\web\Response;
use yii\web\Cookie;

class SiteController extends Controller
{
    public $layout = 'home';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $params = Yii::$app->request->queryParams;
        $cat = isset($params['PostSearch']['category_id']) ? $params['PostSearch']['category_id'] : 1;
        $query = $searchModel->postSearch($params);

        $countQuery = clone $query;
        $pages = new Pagination(
            [
                'totalCount' => $countQuery->count(),
                'pageSize' => Yii::$app->params['count_post_in_frontend'],
            ]
        );
        $pages->pageSizeParam = false;
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $this->view->params['pages'] = $pages;

        return $this->render('index', [
            'posts' => $posts,
            'cat' => $cat,

        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionSearch()
    {
        $params = Yii::$app->request->post();
        $searchModel = new PostSearch();
        $cat = isset($params['PostSearch']['category_id']) ? $params['PostSearch']['category_id'] : 1;
        $query = $searchModel->postSearch($params);

        $countQuery = clone $query;
        $pages = new Pagination(
            [
                'totalCount' => $countQuery->count(),
                'pageSize' => Yii::$app->params['count_post_in_frontend'],
            ]
        );
        $pages->pageSizeParam = false;
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $this->view->params['pages'] = $pages;

        return $this->render('index', [
            'posts' => $posts,
            'cat' => $cat,

        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionPost($id)
    {
        $post = Post::findOne($id);
        $tags = $post->selectTags();
        $model = new GetLinkForm;
        $params = [
            'post' => $post,
            'tags' => $tags,
            'model' => $model,
            'alert_message' => 'Your application has been accepted and will be reviewed shortly.',
            'send_message_result' => false,
        ];
        if ($model->load(Yii::$app->request->post())) {
            $params['send_message_result'] = 'Error';
            if (!$model->validate()) {
                $params['alert_message'] = '';
                foreach ($model->getErrors() as $field) {
                    $params['alert_message'] .= ' ' . implode(' ', $field);
                }
                $params['alert_message'] = trim($params['alert_message']);

                return $this->render('post', $params);
            }
            if(!$model->sendMail()) {
                $params['alert_message'] = 'Error sending message';
                return $this->render('post', $params);
            }
            $params['send_message_result'] = 'Success';
        }

        return $this->render('post', $params);
    }

    public function actionRating()
    {
        $data = Yii::$app->request->post();
        $cookies = Yii::$app->request->cookies;
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ( !$cookies->has('key'.$data['post_id'])) {
            $result = $this->updateRating($data);
            $hash = Yii::$app->getSecurity()->generatePasswordHash($result->id.'rating');
            $cookies = Yii::$app->response->cookies;
            // добавление новой куки в HTTP-ответ
            $cookies->add(new Cookie([
                'name' => 'key'.$result->id,
                'value' => $hash,
            ]));
            return  [ 'result' => 'success'];
        }else{
            return  [ 'result' => "ERROR"];
        }
    }

    private function updateRating($data) {
        $post = Post::findOne($data['post_id']);
        $post->rating += $data['value'];
        $post->rating_count++;
        $post->save();

        return $post;
    }

}
