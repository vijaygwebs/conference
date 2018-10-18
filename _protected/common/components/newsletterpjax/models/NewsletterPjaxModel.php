<?php
namespace common\components\newsletterpjax\models;
use yii\base\Model;
use Yii;
Class NewsletterPjaxModel extends Model
{
    public $email;
    public function rules(){
        return [
          ['email','required'],
          ['email','email'],
          ['email','checkvalid','message' => 'This email can not be used.' ],
        ];
    }
    public function subscribe(){
        Yii::$app->db->createcommand()->insert('subscribers1',['email'=>$this->email]);

    }
    public function checkvalid(){
        if($this->email=="vijay.gwebs@gmail.com")
        {
        $this->addError('email',  'This email can not be used.');
        }

    }
}
?>