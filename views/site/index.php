<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<body>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="div-table mb-4">
                <div class="div-table-row">
                    <div class="div-table-cell div-table-header">Тема</div>
                    <div class="div-table-cell div-table-header">Подтема</div>
                    <div class="div-table-cell div-table-header">Содержимое</div>
                </div>
                <div class="div-table-row">
                    <div class="div-table-cell theme-cell">
                        <div class="active">Тема 1</div>
                        <div>Тема 2</div>
                        <div>Тема 3</div>
                    </div>
                    <div class="div-table-cell subtheme-cell">
                        <div class="active">Подтема 1.1</div>
                        <div>Подтема 1.2</div>
                        <div>Подтема 2.1</div>
                    </div>
                    <div class="div-table-cell content-cell" rowspan="3">Некий текст, привязанный к Подтеме 2.2</div>
                </div>
            </div>
        </div>
    </div>
</div>