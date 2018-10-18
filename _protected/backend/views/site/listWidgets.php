<?php
use yii\helpers\Html;
use common\components\MyCustomWidget;
$this->title = yii::t('app','Widgets');
?>
<h1><?= Html::encode(MyCustomWidget::widget(['message' => 'Welcome To  Custom Widgets ']) );?></h1>
