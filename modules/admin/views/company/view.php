<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Company;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'category_id',
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
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
        ],
    ]) ?>

</div>
