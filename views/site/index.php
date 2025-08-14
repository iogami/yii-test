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
                    <div id="themes" class="div-table-cell theme-cell"></div>
                    <div id="subthemes" class="div-table-cell subtheme-cell"></div>
                    <div id="subtheme-text" class="div-table-cell content-cell"></div>
                </div>
            </div>
        </div>
    </div>
</div>