<?php
namespace app\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use yii;
use app\models\EmailTemplate;

/**
 * Get link form
 */
class GetLinkForm extends Model
{
    public $name;
    public $post_id;
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'name'], 'trim'],
            [['email', 'name'], 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
        ];
    }
    /**
     * Sends an email with a link, for resetting the password.
     * @param string $view
     * @param string $subject
     * @param array $params
     *
     * @return bool whether the email was send
     */
    public function sendMail($params = []) {
        $params = [
            'user_name' => $this->name,
            'user_email' => $this->email,
        ];
        $template = EmailTemplate::findOne(1);
        if(is_null($template)) {
            return false;
        }
        if(is_null(Yii::$app->params['adminEmail'])) {
            return false;
        }
        $message = Yii::$app->mailer->compose();
        if ($params) {
            foreach ($params as $key => $param) {
                $template->from = str_replace('#'.$key.'#', $param, $template->from);
                $template->subject = str_replace('#'.$key.'#', $param, $template->subject);
                $template->body_html = str_replace('#'.$key.'#', $param, $template->body_html);
                $template->body_text = str_replace('#'.$key.'#', $param, $template->body_text);
            }
        }

        $message->setFrom($template->from)
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject($template->subject)
            ->setHtmlBody($template->body_html)
            ->setTextBody($template->body_text);

        return $message->send();
    }

}
