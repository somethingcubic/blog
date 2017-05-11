<?php

use frontend\widgets\post\PostWidget;

?>
<div class="row">
    <div class="col-lg-9">
        <?= PostWidget::widget(['page' => true, 'limit' => 2]) ?>
    </div>
    <div class="col-lg-3"></div>
</div>
