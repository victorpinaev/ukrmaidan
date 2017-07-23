<?php

namespace app\controllers\admin;

use Yii;
use app\models\Post;
use app\models\PostSearch;
use app\models\TagSearch;
use app\models\PostTag;
use app\models\TagCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        //phpinfo(); exit();
        $searchModel = new PostSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['PostSearch']['category_id'] = 1;
        $dataProvider_1 = $searchModel->search($queryParams);
        $queryParams['PostSearch']['category_id'] = 2;
        $dataProvider_2 = $searchModel->search($queryParams);
        $queryParams['PostSearch']['category_id'] = 4;
        $dataProvider_3 = $searchModel->search($queryParams);
        $dataProvider_1->pagination->pageSize = Yii::$app->params['count_post_in_admin'];
        $dataProvider_2->pagination->pageSize = Yii::$app->params['count_post_in_admin'];
        $dataProvider_3->pagination->pageSize = Yii::$app->params['count_post_in_admin'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider_1' => $dataProvider_1,
            'dataProvider_2' => $dataProvider_2,
            'dataProvider_3' => $dataProvider_3,
        ]);
    }

    /**
     * Add/Edit tags
     * @param integer $id
     * @return mixed
     */
    public function actionTags($id, $tag)
    {
        $show_success = false;
        $searchModel = new TagSearch();
        $post_tag_model = new PostTag;

        switch ($tag) {
            case 'genre':
                $tag_category = 1; $title_tag = 'Genre';
                break;
            case 'producer':
                $tag_category = 2; $title_tag = 'Producer';
                break;
            case 'actor':
                $tag_category = 3; $title_tag = 'Actor';
                break;
            default: $tag_category = null; $title_tag = '';
        }

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $tag_category);

        $post = Yii::$app->request->post();

        if(isset($post['tag_form'])) {

            $tag_category = TagCategory::findOne($tag_category);
            $ar_tags_id = $tag_category->arTagsId();

            $post_tag_model->clearTag($id, $ar_tags_id);
            if(isset($post['tags'])) {
                foreach ($post['tags'] as $tag) {
                    $post_tag_model->insertTag($id, $tag);
                }
            }
            $show_success = true;
        }

        return $this->render('tags', [
            'ar' => $this->findModel($id)->arrayTags(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'show_success' => $show_success,
            'model' => $this->findModel($id),
            'title_tag' => $title_tag
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()))
        {
            $file = UploadedFile::getInstance($model, 'img');
            if (isset($file))
            {
                $filename = uniqid() . '.' . $file->extension;
                $path = 'uploads/' . $filename;
                if ($file->saveAs($path))
                {
                    $model->img = $filename;
                }
            }

            if ($model->save())
            {
                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_file = $model->img;

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'img');
            $model->img = $old_file;
            if (isset($file))
            {
                $filename = uniqid() . '.' . $file->extension;
                $path = 'uploads/' . $filename;
                if ($file->saveAs($path))
                {
                    $model->img = $filename;
                }

            }
            if ($model->save())
            {
                return $this->redirect('index');
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
