<?php

use common\models\Employee;
use common\models\Vehicle;
use common\models\VehicleRequest;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

$this->title = $modelOwnerRequest->fullname . " " . $modelOwnerRequest->code;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;
\yii\web\YiiAsset::register($this);

?>


<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2">
            <?php echo $modelOwnerRequest->fullname ?>
            <small class="text-body-secondary">
                <?php echo $modelOwnerRequest->code ?>
            </small>
        </h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
</div>

<div class="d-flex align-content-around flex-wrap row">
    <div class="row g-4">
        <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="text-body-secondary text-start">
                                <div class="fs-4 fw-semibold"><i class="fa-regular fa-square-info fa-xl"></i> ข้อมูลผู้ขอรับสติ้กเกอร์</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th scope="row"> <?php echo $modelOwnerRequest->attributeLabels()['fullname'] ?></th>
                                        <td><?php echo $modelOwnerRequest->fullname ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo $modelOwnerRequest->attributeLabels()['code'] ?></th>
                                        <td><?php echo $modelOwnerRequest->code ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo $model->attributeLabels()['requested_role'] ?></th>
                                        <td><?php echo $model->requested_role ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo $model->attributeLabels()['status'] ?></th>
                                        <td>
                                            <div> <span class="badge text-bg-<?php echo $status[0] ?> text-white fw-normal"><?php echo $status[1] ?> </span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo $model->attributeLabels()['approver'] ?></th>
                                        <td><?php echo $model->approver ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo $model->attributeLabels()['created_at'] ?></th>
                                        <td><?php echo $model->created_at ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
            <div class="card mb-4">
                <di class="card-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="text-body-secondary text-start">
                                <div class="fs-4 fw-semibold"><i class="fa-regular fa-car fa-xl"></i> ข้อมูลรถ</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 card">
                        <div class="card-img-top"></div>
                    </div>

                    <div class="col-12 mb-2">

                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row"> <?php echo $model->vehicle->attributeLabels()['plate'] ?></th>
                                    <td><?php echo $model->vehicle->plate ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> <?php echo $model->vehicle->attributeLabels()['province'] ?></th>
                                    <td><?php echo $model->vehicle->province ?></td>

                                </tr>
                                <tr>
                                    <th scope="row"> <?php echo $model->vehicle->attributeLabels()['type'] ?></th>
                                    <td><?php echo $model->vehicle->type ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> <?php echo $model->vehicle->attributeLabels()['brand'] ?></th>
                                    <td><?php echo $model->vehicle->brand ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> <?php echo $model->vehicle->attributeLabels()['color'] ?></th>
                                    <td><?php echo $model->vehicle->color ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="text-body-secondary text-start">
                                <div class="fs-4 fw-semibold"><i class="fa-regular fa-tag fa-xl"></i> รูปแผ่นป้ายทะเบียน</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2">
                            <img src="https://www.smk.co.th/upload/news/637474528097862295_main_1717_pic412_2.jpg" class="card-img-top">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="text-body-secondary text-start">
                                <div class="fs-4 fw-semibold"><i class="fa-regular fa-car-side fa-xl"></i> ภาพด้านข้างรถ</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2 card">
                            <img src="https://www.volvocars.com/images/v/-/media/market-assets/australia/applications/localpages/images/model-lineup/my24-xc40-recharge-single.png?h=1007&iar=0&w=1342" class="card-img-top">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>