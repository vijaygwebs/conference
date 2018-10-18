<?php

/* @var $this yii\web\View */
use common\components\newsletter\NewsletterWidget;
$this->title = Yii::t('app', Yii::$app->name);
?>
<?= NewsletterWidget::widget();?>
