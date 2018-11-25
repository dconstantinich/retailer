<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $imageModel app\models\UploadedImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= Html::label('Icon','uploadedimage-image-label', ['class' => 'control-label']) ?>

    <?php if (!empty($model->icon)) {
        echo '<div id="uploadedimage-image-label" style="margin-bottom: 5px">';
        echo Html::img('@web/' . $model->icon, ['alt' => '', 'height' => 40, 'width' => 40]);
        echo '</div>';
    } ?>

    <?= $form->field($imageModel, 'image')->fileInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
