<?php

namespace common\traits;
use Yii;

trait AjaxStatusTrait
{
    public function changeStatus($model){
        if($model->status == 1){
            $result = (bool)$model->updateAttributes(['status' => 0]);
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'result' => $result,
                'action' => 'Inactive',
            ];
        } else {
            $result = (bool)$model->updateAttributes(['status' => 1]);
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'result' => $result,
                'action' => 'Active',
            ];
        }
    }

}