<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CountriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = ($this->context->route == 'countries/index')?'Active Countries':'All Countries';$this->params['breadcrumbs'][] = $this->title;
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
                        'options' =>['class'=>'table-responsive'],
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
                                        return Html::a(Yii::t('app', 'Inactive'), null,
                                            [
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
                            [
                                'class' => 'yii\grid\ActionColumn','header'=>'Actions',
                                'buttons' => [
                                    'view-details' =>function ($url, $model, $key) {
                                        $options = array_merge([
                                            'title' => Yii::t('yii', 'View Details'),
                                            'aria-label' => Yii::t('yii', 'View Details'),
                                            'data-pjax' => '0',
                                            'class' =>'btn btn-white',
                                        ], []);
                                        return Html::a('<i class="fa fa-eye"></i>', ['view','id'=>$model->id], $options);
                                    },
                                    'viewstates' =>function ($url, $model, $key) {
                                        $options = array_merge([
                                            'title' => Yii::t('yii', 'View States'),
                                            'aria-label' => Yii::t('yii', 'View States'),
                                            'data-pjax' => '0',
                                            'class' =>'btn btn-white',
                                        ], []);
                                        return Html::a('<i class="fa fa-folder-open"></i>', ['states','country_id'=>$model->id], $options);
                                    },
                                    'updates' =>function ($url, $model, $key) {
                                        $options = array_merge([
                                            'title' => Yii::t('yii', 'Update'),
                                            'aria-label' => Yii::t('yii', 'Update'),
                                            'data-pjax' => '0',
                                            'class' =>'btn btn-white',
                                        ], []);
                                        return Html::a('<i class="fa fa-pencil"></i>', ['update','id'=>$model->id], $options);
                                    },
                                ],
                                'template' => '{viewstates} {view-details} {updates}',
                                'contentOptions' => ['style' => 'width:170px;text-align:center'],
                            ],
                        ],
                    ]); ?>
                    <?php Pjax::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>