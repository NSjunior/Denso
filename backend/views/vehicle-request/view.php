<?php

use common\models\Employee;
use common\models\Vehicle;
use common\models\VehicleRequest;
use yii\helpers\Html;
use yii\widgets\DetailView;


/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

// $this->title = $modelOwnerRequest->fullname . " " . $modelOwnerRequest->code;
$this->title = $model->requester->fullname . " " . $model->requester->code;
$this->params['breadcrumbs'][] = ['label' => 'คำร้องขอสติ้กเกอร์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;
\yii\web\YiiAsset::register($this);
$updateButton = ($model->status != VehicleRequest::STATUS_REVOKE) ? Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-warning text-white shadow p-2 mb-2 rounded']) : '';
$deleteButton = ($model->status != VehicleRequest::STATUS_REVOKE) ? Html::a(
    'ยกเลิก',
    ['delete', 'id' => $model->id],
    [
        'data' => [
            'method' => 'post',
            'confirm' => 'คุณต้องการยกเลิกการขอสติ้กเกอร์?',
        ],
        'class' => 'btn btn-danger text-white shadow p-2 mb-2 rounded'
    ],
) : '';
?>
<style>
    .license-plate {
        width: 300px;
        height: 150px;
        border: 3px solid black;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: white;
    }

    img {
        height: 100%;
        width: 100%;
        object-fit: contain;
    }
</style>


<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2">
            <?php echo $model->requester->fullname ?>
            <small class="text-body-secondary">
                <?php echo $model->requester->code ?>
            </small>
        </h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php echo $updateButton  ?>
            <?php echo $deleteButton ?>
        </div>
    </div>
</div>

<div class="d-flex align-content-around flex-wrap row ">
    <div class="row g-4">

        <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
            <div class="card mb-4 h-100">
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
                                        <th scope="row"> <?php echo 'ชื่อผู้ขอ' ?></th>
                                        <td><?php echo $model->requester->fullname ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo 'รหัสประจำตัวผู้ขอ' ?></th>
                                        <td><?php echo $model->requester->code ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo 'บทบาท' ?></th>
                                        <td><?php echo VehicleRequest::listRoles()[$model->requested_role] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo 'สถานะ' ?></th>
                                        <td>
                                            <div> <span class="badge text-bg-<?php echo $status[0] ?> text-white fw-normal"><?php echo $status[1] ?> </span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo 'ผู้อนุมัติ' ?></th>
                                        <td><?php echo ($model->approver) ? $model->approver : '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo 'วันที่สร้าง' ?></th>
                                        <td>
                                            <?php echo Yii::$app->date->date('วันlที่ j F Y', strtotime($model->created_at)); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-xl-6 col-xxl-6 ">
            <div class="card mb-4 h-100">
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-12 mb-2">
                            <div class="text-body-secondary text-start">
                                <div class="fs-4 fw-semibold"><i class="fa-regular fa-car fa-xl"></i> ข้อมูลรถ</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="text-center fw-bold">
                                <h4 class="fw-bold">ป้ายทะเบียน</h4>
                            </div>
                        </div>
                        <div class="row g-4 d-flex justify-content-center align-items-center">
                            <div class="license-plate text-center flex-fill">
                                <div class="fs-3 fw-bold"><?php echo $model->vehicle->plate ?></div>
                                <div class="fs-4"><?php echo $model->vehicle->provinceInfo->name ?></div>
                            </div>
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th scope="row"> <?php echo 'ประเภทรถ' ?></th>
                                        <td><?php echo Vehicle::listTypes()[$model->vehicle->type] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo 'ยี่ห้อ' ?></th>
                                        <td><?php echo $model->vehicle->brand ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo 'รุ่นรถ' ?></th>
                                        <td><?php echo $model->vehicle->model ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <?php echo 'สีรถ' ?></th>
                                        <td><?php echo $model->vehicle->color ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-6 col-xxl-6 ">
            <div class="card mb-4 h-100">
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
                            <div class="card-img-top">
                                <img src='<?php echo Vehicle::UPLOAD_PATH . $model->vehicle->plate_image ?>' class="rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
            <div class="card mb-4 h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="text-body-secondary text-start">
                                <div class="fs-4 fw-semibold"><i class="fa-regular fa-car-side fa-xl"></i> ภาพด้านข้างรถ</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="card-img-top">
                                <img src='<?php echo Vehicle::UPLOAD_PATH . $model->vehicle->image ?>' class="rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>