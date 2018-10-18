<?php
namespace common\components;

use yii\base\widget;
use yii\helpers\Html;

Class MyCustomWidget extends Widget{
    public $message;

    public function init(){
        parent::init();
        if($this->message === null)
        {
            $this->message = "Welcome Guest";
        }
    }
    public function run(){
        return Html::encode($this->message);
    }
}

?>