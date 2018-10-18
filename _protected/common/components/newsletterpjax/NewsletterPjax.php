<?php
namespace common\components\newsletterpjax;
use common\components\newsletterpjax\models\NewsletterPjaxModel;
use yii\base\widget;
use yii\helpers\Json;
use yii\web\Response;
use Yii;
use yii\widgets\ActiveForm;
Class NewsletterPjax extends widget {
    public $message;
    public $custommsg;
    public $security;
    public function init(){
        $this->security = new NewsletterPjaxModel();
        $this->custommsg = false;
        if ( $this->security->load(Yii::$app->request->post())) {

         Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
             if(!(\yii\widgets\ActiveForm::validate($this->security)))
             {
                 $this->custommsg = true;
             }


        }
       // yii::$app->db->createCommand()->insert('subscriber1',['email'=>'asddf']);


    }
    public function run(){
        if($this->custommsg==true){
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            echo 'hello'; die;
        }



        return $this->render('NewsletterPjax', [
            'message' => $this->security,
        ]);
    }
}
?>