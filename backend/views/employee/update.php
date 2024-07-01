<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Employee $model */


$this->title = 'Update Employee: ' .  $model->getFullname();
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>  $model->getFullname(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->disableTitleDisplay = true;

?>
<div class="employee-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>