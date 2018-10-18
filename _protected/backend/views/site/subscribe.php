<?php
use common\components\newsletter\NewsletterWidget;
use yii\helpers\Html;
$this->title = yii::t('app','Subcribe us');
?>
<?= NewsletterWidget::widget();?>
