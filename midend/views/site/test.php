<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$aprroveButton = Html::a(
    '<i class="fa-solid fa-check"></i> pdf',
    ['pdf', 'arr_id' => $arr_id],
    [
        'data' => [
            'method' => 'post',
            'confirm' => 'ปริ้น pdf ทั้งหมด?',
        ],
        'class' => 'btn btn-primary text-white shadow p-2 mb-2 rounded'
    ],
);
?>
<div class="site-signup">
    <?php $aprroveButton ?>
</div>