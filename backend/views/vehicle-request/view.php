<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

dump($model->getOwnerRequest());

?>
<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2"><?php // echo $modelOwnerRequest->getfullname() 
                                    ?> <small class="text-body-secondary"><?php //echo $model->employee->firstname 
                                                                            ?></small></h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php //echo $bookingButton 
            ?>
        </div>
    </div>
</div>

<div class="vehicle-request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vehicle_id',
            'requested_id',
            'requested_role',
            'approver',
            'approved_at',
            'status',
            'creator',
            'created_at',
            'updater',
            'updated_at',
        ],
    ]) ?>

</div>