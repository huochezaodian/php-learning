<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'contact-form',
                'action' => ['system/submit', 'id' => $model['id']],
                'method' => 'post',
                ]); ?>

                <?= $form->field($model, 'name')->textInput()->hint('Please enter the book name')->label('书名') ?>

                <?= $form->field($model, 'type')->dropdownList(['js' => 'js', 'css' => 'css', 'html' => 'html', 'other' => 'other'], ['prompt'=>'Select Type'])->label('类型')?>

                <?= $form->field($model, 'price')->textInput()->hint('Please enter the book price')->label('价格') ?>

                <?= $form->field($model, 'pages')->textInput()->hint('Please enter the book pages')->label('总页数') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
