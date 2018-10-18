<?php
use common\components\newsletterpjax\NewsletterPjax;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$form = ActiveForm::begin(['id'=>'form1','enableAjaxValidation'=>true]);

?>
<?= $form->field($message,'email'); ?>
<?= Html::submitInput(yii::t('app','Subscribe'),['class' => 'brn btn-primary','id'=>'mybtn','name' => 'subscribe-button']) ?>

<?php ActiveForm::end();?>
<?php
$script = <<< JS
$('#form1').on('beforeSubmit', function () {
     var form = $(this);
     // return false if form still have some validation errors
     if (form.find('.has-error').length) {
          return false;
     }
     // submit form
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function(response) {
               // do something with response

                console.log(response)
               // $("body").replaceWith(response);
          }
     });
     return false;
});
JS;
$this->registerJs($script);

?>




