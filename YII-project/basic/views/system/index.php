<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'My Library System';
$this->params['breadcrumbs'][] = '查询';
?>
<div class="system-index">

    <?php $form = ActiveForm::begin([
        'id' => 'query-form',
        'action' => ['system/query'],
        'method' => 'post',
        'options' => ['class' => 'form-inline'],
        ]); ?>

        <?= $form->field($query, 'name')->textInput(['placeholder'=>'book name'])->label('书名') ?>

        <?= $form->field($query, 'type')->dropdownList(['js' => 'js', 'css' => 'css', 'html' => 'html', 'other' => 'other'], ['prompt'=>'Select Type'])->label('类型')?>

        <?= Html::submitButton('查询', ['class' => 'btn btn-primary float-right', 'name' => 'query-button']) ?>


    <?php ActiveForm::end(); ?>

    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>书名</th>
                    <th>类型</th>
                    <th>价格</th>
                    <th>页数</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($books as $book): ?>
                    <tr>
                        <td><?= $book['id'] ?></td>
                        <td><?= $book['name'] ?></td>
                        <td><?= $book['type'] ?></td>
                        <td><?= $book['price'] ?></td>
                        <td><?= $book['pages'] ?></td>
                        <td>
                            <?= Html::a('编辑', ['system/contact', 'id' => $book['id']]) ?>
                            <?= Html::a('删除', ['system/delete', 'id' => $book['id']]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
