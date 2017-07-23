<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email_template".
 *
 * @property integer $id
 * @property string $from
 * @property string $subject
 * @property string $body_html
 * @property string $body_text
 * @property string $var
 */
class EmailTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body_html', 'body_text'], 'string'],
            [['from', 'subject', 'var'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'subject' => 'Subject',
            'body_html' => 'Body Html',
            'body_text' => 'Body Text',
            'var' => 'Var',
        ];
    }
}
