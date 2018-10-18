<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\StatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $state->name.' - Cities';
$this->params['breadcrumbs'][] = ['label' => 'Active Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'USA States', 'url' => ['states','country_id'=> $state->country->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-index">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<div class="btn-group">
						<?= Html::a('Active Cities', ['viewcities',  'state_id' => $state->id], ['class' => 'btn btn-sm btn-white'.(($this->context->route == 'countries/viewcities')?' active':'')]) ?>
						<?= Html::a('Inactive Cities', ['inactive-cities',  'state_id' => $state->id], ['class' => 'btn btn-sm btn-white'.(($this->context->route == 'countries/inactive-cities')?' active':'')]) ?>
					</div>
					<?= Html::a('Add New City', ['add-city',  'id' => $state->id], ['class' => 'btn btn-primary pull-right']) ?>
					<p></p>

					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'columns' => [
							['class' => 'yii\grid\SerialColumn', 'header' => 'S.No.'],

							'name',

							[
								'attribute' => 'status',
								'value' => function ($model) {
									if ($model->status) {
										return Html::a(Yii::t('app', 'Active'), null, [
											'class' => 'btn btn-primary status',
											'data-id' =>  $model->id,
											'model' =>  'Cities',
											'href' => 'javascript:void(0);',
										]);
									} else {
										return Html::a(Yii::t('app', 'Inactive'), null, [
											'class' => 'btn btn-danger status',
											'data-id' =>  $model->id,
											'model' =>  'Cities',
											'href' => 'javascript:void(0);',
										]);
									}
								},
								'contentOptions' => ['style' => 'width:160px;text-align:center'],
								'format' => 'raw',
								'filter'=>array("1"=>"Active","0"=>"Inactive"),
							],
							[	
								'class' => 'yii\grid\ActionColumn','header'=>'Actions',
								'buttons' => [
									'view-details' =>function ($url, $model, $key) {
										$options = array_merge([
											'title' => Yii::t('yii', 'View Details'),
											'aria-label' => Yii::t('yii', 'View Details'),
											'data-pjax' => '0',
										], []);
										return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['city/view','id'=>$model->id], $options);
									},
									'city-update' =>function ($url, $model, $key) {
										$options = array_merge([
											'title' => Yii::t('yii', 'Edit City'),
											'aria-label' => Yii::t('yii', 'Edit City'),
											'data-pjax' => '0',
											'data-confirm' => \Yii::t('yii', 'Are you sure to update this city?'),
										], []);
										return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['city-update','city_id'=>$model->id], $options);
									},
									'city-delete' =>function ($url, $model, $key) {
										$options = array_merge([
											'title' => Yii::t('yii', 'Delete City'),
											'aria-label' => Yii::t('yii', 'Delete City'),
											'data-pjax' => '0',
											'data-confirm' => \Yii::t('yii', 'Are you sure to delete this city?'),
										], []);
										return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['city-delete','city_id'=>$model->id], $options);
									},
								],
								'template' => '{view-details}{city-update}{city-delete}', 'contentOptions' => ['style' => 'width:160px;letter-spacing:10px;text-align:center'],
							],
						],
					]); ?>
				</div>
			</div>
		</div>
    </div>
</div>
