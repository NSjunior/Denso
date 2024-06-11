<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

$this->title = 'ยื่นคำร้องขอสติ้กเกอร์';
$this->params['breadcrumbs'][] = ['label' => 'คำร้องขอสติ้กเกอร์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;

?>
<div class="vehicle-request-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modelVehicle' => $modelVehicle
    ]) ?>

</div>