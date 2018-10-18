<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\States */

$this->title = $country->name.'- Add New State';
$this->params['breadcrumbs'][] = ['label' => 'Active Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $country->name, 'url' => ['viewstates', 'country_id' => $country->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="states-create">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<div class="states-form">
						<?php $form = ActiveForm::begin(); ?>

							<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

							<div class="form-group">
								<?= Html::submitButton('Create', ['class' =>'btn btn-success']) ?>
							</div>

						<?php ActiveForm::end(); ?>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
