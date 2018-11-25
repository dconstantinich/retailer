<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$categoryName = 'Deleted';
if (!empty($model->categoryName)) {
    $categoryName = Html::a($model->categoryName, ['category/view', 'id' => $model->category_id]);
}
echo $categoryName;