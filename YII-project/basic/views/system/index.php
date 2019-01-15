<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Library System';
?>
<div class="system-index">
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
