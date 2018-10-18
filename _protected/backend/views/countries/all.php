<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CountriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-index">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div class="btn-group">
						<?= Html::a('Active Countries', ['index'], ['class' => 'btn btn-sm btn-white'.(($this->context->route == 'countries/index')?' active':'')]) ?>
						<?= Html::a('All Countries', ['all'], ['class' => 'btn btn-sm btn-white'.(($this->context->route == 'countries/all')?' active':'')]) ?>
					</div>
					<?php Pjax::begin() ?>
					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'columns' => [
							['class' => 'yii\grid\SerialColumn',
							'header' => 'S.No.'],
							'name',
							'sortname',
							[
								'attribute' => 'status',
								'value' => function ($model) {
									if ($model->status) {
										return Html::a(Yii::t('app', 'Active'), null, [
											'class' => 'btn btn-success status',
											'data-id' =>  $model->id,
											'href' => 'javascript:void(0);',
										]);
									} else {
										return Html::a(Yii::t('app', 'Inactive'), null, [
											'class' => 'btn btn-danger status',
											'data-id' =>  $model->id,
											'href' => 'javascript:void(0);',
										]);
									}
								},
								'contentOptions' => ['style' => 'width:160px;text-align:center'],
								'format' => 'raw',
								'filter'=>array("1"=>"Active","0"=>"Inactive"),
							],
						],
					]); ?>
					<?php Pjax::end() ?>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.col -->
    </div><!-- /.row -->
</div>
