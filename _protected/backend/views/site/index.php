<?php

/* @var $this yii\web\View */
use common\components\MyCustomWidget;
$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= MyCustomWidget::widget(['message' => 'Welcome To Admin Panel!']); ?> </h1>




    </div>

    <div class="body-content">

        <div class="row">

        </div>

    </div>
</div>

