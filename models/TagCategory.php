<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag_category".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Tag[] $tags
 */
class TagCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['tag_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function arTagsId()
    {
        $ar_tags_id = [];
        if($this->tags) {
            foreach ($this->tags as $tag) {
                $ar_tags_id[] = $tag->id;
            }
        }

        return $ar_tags_id;
    }
}
