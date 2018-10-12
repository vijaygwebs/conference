<?php
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$directoryAsset = Yii::$app->view->theme->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render(
    'header.php',
    ['directoryAsset' => $directoryAsset]
) ?>
<?= $this->render(
    'sliderarea.php',
    ['directoryAsset' => $directoryAsset]
) ?>
<div class="container">
    <?= Alert::widget() ?>
    <?= $content ?>
    <?= $this->render(
        'testimonials.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>
    <?= $this->render(
        'footer.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
