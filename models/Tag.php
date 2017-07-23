<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property integer $tag_category_id
 * @property string $name
 *
 * @property PostTag[] $postTags
 * @property Post[] $posts
 * @property TagCategory $tagCategory
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_category_id'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['tag_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => TagCategory::className(), 'targetAttribute' => ['tag_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_category_id' => 'Tag Category',
            'name' => 'Tag Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('post_tag', ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagCategory()
    {
        return $this->hasOne(TagCategory::className(), ['id' => 'tag_category_id']);
    }

    public function getTagCategories()
    {
        $tag_categories = TagCategory::find()->asArray()->all();

        return ArrayHelper::map($tag_categories, 'id', 'name');
    }
}
