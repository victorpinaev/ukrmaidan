<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\models\PostTag;
use app\models\Tag;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $img
 * @property string $title
 * @property string $issue
 * @property string $description
 * @property integer $created_at
 * @property double $rating
 * @property integer $category_id
 * @property string $duration
 * @property string $extension
 * @property integer $rating_count
 *
 * @property Category $category
 * @property PostTag[] $postTags
 * @property Tag[] $tags
 */
class Post extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => strtotime(date('Y-m-d')),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['rating'], 'number'],
            [['category_id', 'created_at', 'rating_count'], 'integer'],
            [['title', 'duration', 'extension'], 'string', 'max' => 250],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['issue'], 'string', 'max' => 4],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'duration' => 'Duration',
            'img' => 'Image',
            'title' => 'Title',
            'issue' => 'Issue',
            'genre' => 'Genre',
            'description' => 'Description',
            'producer' => 'Producer',
            'actors' => 'Actors',
            'rating' => 'Rating',
            'category_id' => 'Category',
            'extension' => 'Extension',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('post_tag', ['post_id' => 'id']);
    }

    public function getCategories()
    {
        $categories = Category::find()->asArray()->all();

        return ArrayHelper::map($categories, 'id', 'title');
    }

    /**
     * get array tags
     */
    public function arrayTags()
    {
        $array_tags = [];
        $ar_obj_tag = $this->postTags;
        foreach($ar_obj_tag as $obj) {
            $array_tags[] = $obj->tag_id;
        }

        return $array_tags;
    }

    /**
     * select array tags
     */
    public function selectTags()
    {
        $array_tags['genre'] = [];
        $array_tags['producer'] = [];
        $array_tags['actor'] = [];
        $ar_obj_tag = $this->tags;
        foreach($ar_obj_tag as $obj) {
            switch ($obj->tag_category_id) {
                case 1:
                    $array_tags['genre'][] = $obj->name;
                    break;
                case 2:
                    $array_tags['producer'][] = $obj->name;
                    break;
                case 3:
                    $array_tags['actor'][] = $obj->name;
                    break;
            }
        }

        return $array_tags;
    }

    public function arrayYear(){
        $current_year = date('Y');
        $array_year = [];
        for($i = 0; $i < 50; $i++) {
            $array_year[$current_year] = $current_year;
            $current_year--;
        }

        return $array_year;
    }

    public static function arrayExtension(){
        $posts = self::find()->select('extension')->distinct()->column();
        $array_extension[''] = 'Format';
        foreach ($posts as $extension) {
            if(is_null($extension)) {
                continue;
            }
            $array_extension[$extension] = $extension;
        }

        return $array_extension;
    }
}
