<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Company;
use \kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'categoryName',
                'label' => 'Category',
                'value' => function (Company $model) {
                    return Yii::$app->view->render('_categoryName', [
                        'model' => $model,
                    ]);
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'website',
                'value' => function (Company $model) {
                    return Html::a($model->websiteShort, $model->website);
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'created_at',
                'filter' => DatePicker::widget([
                    'model'=> $searchModel,
                    'attribute'=>'createdFrom',
                    'attribute2' => 'createdTo',
                    'type' => DatePicker::TYPE_RANGE,
                    'pluginOptions' => [
                        'autoclose'=> true,
                        'format' => 'dd.mm.yyyy',
                    ],
                    'size' => 'sm',
                ]),
                'options' => ['width' => '215px'],
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'filter' => DatePicker::widget([
                    'model'=> $searchModel,
                    'attribute'=>'updatedFrom',
                    'attribute2' => 'updatedTo',
                    'type' => DatePicker::TYPE_RANGE,
                    'pluginOptions' => [
                        'autoclose'=> true,
                        'format' => 'dd.mm.yyyy',
                    ],
                    'size' => 'sm',
                ]),
                'options' => ['width' => '215px'],
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
