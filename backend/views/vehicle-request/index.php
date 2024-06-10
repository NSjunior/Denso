<?php

use common\models\Vehicle;
use common\models\VehicleRequest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

$createButton = Html::a('<i class="fa-solid fa-user"></i> คำร้องขอสติ้กเกอร์', ['/vehicle-request/create'], ['class' => 'btn btn-success text-white btn-lg shadow mt-4 mb-4 fs-4']);
//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$columns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'requested_id',
        'headerOptions' => ['style' => 'width:120px;'],
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['VehicleRequestSearch']))
                return $model->requested_id;

            $queryString = $queryParams['VehicleRequestSearch']['requested_id'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->requested_id);
        }
    ], [
        'attribute' => 'fullname',
        'label' => 'ชื่อ',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['VehicleRequestSearch']))
                return $model->requested_id;

            $queryString = $queryParams['VehicleRequestSearch']['fullname'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->requested_id);
        }
    ], [
        'attribute' => 'status',
        'headerOptions' => ['style' => 'width:120px;'],
        'filter' => Html::activeDropDownList($searchModel, 'status', [VehicleRequest::STATUS_REQUEST => 'รออนุมัติ', VehicleRequest::STATUS_APPROVED => 'อนุมัติ', VehicleRequest::STATUS_REJECT => 'ไม่อนุมัติ', VehicleRequest::STATUS_REVOKE => 'ยกเลิก'], ['prompt' => 'สถานะ', 'class' => 'form-select']),
        'label' => 'สถานะ',
        'format' => 'raw',
        'value' => function ($model) {
            if ($model->status == 0) {
                return badge('success', 'อนุมัติ');
            } elseif ($model->status == 10) {
                return badge('warning', 'รออนุมัติ');
            } elseif ($model->status == -1) {
                return badge('danger', 'ไม่อนุมัติ');
            } else {
                return badge('secondary', 'ยกเลิก');
            }
        },
    ], [
        'attribute' => 'role',
        'headerOptions' => ['style' => 'width:120px;'],
        'filter' => Html::activeDropDownList($searchModel, 'role', [VehicleRequest::ROLE_STUDENT => 'นักเรียน', VehicleRequest::ROLE_TEACHER => 'ครู', 30 => 'อื่น ๆ'], ['prompt' => 'บทบาท', 'class' => 'form-select']),
        'label' => 'บทบาท',
        'format' => 'raw',
        'value' => function ($model) {
            if ($model->requested_role == 10) {
                return "นักเรียน";
            } elseif ($model->requested_role == 20) {
                return "ครู";
            } else {
                return "อื่น";
            }
        },
    ],
    [
        'attribute' => 'vehicleType',
        'headerOptions' => ['style' => 'width:120px;'],
        'filter' => Html::activeDropDownList($searchModel, 'vehicleType', [Vehicle::TYPE_MOTORCYCLE => 'มอเตอร์ไซค์',  Vehicle::TYPE_CAR => 'รถยนต์'], ['prompt' => 'ประเภทรถ', 'class' => 'form-select']),
        'label' => 'ประเภทรถ',
        'format' => 'raw',
        'value' => function ($model) {
            if ($model->requested_role == 10) {
                return "รถยนต์";
            } elseif ($model->requested_role == 20) {
                return "มอเตอร์ไซค์";
            }
        },
    ], [
        'attribute' => 'plate',
        'headerOptions' => ['style' => 'width:120px;'],
        'label' => 'เลขทะเบียนรถ',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['VehicleRequestSearch']))
                return $model->vehicle->plate;

            $queryString = $queryParams['VehicleRequestSearch']['plate'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->vehicle->plate);
        }
    ],
    [
        'attribute' => 'province',
        'headerOptions' => ['style' => 'width:120px;'],
        'label' => 'จังหวัด',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['VehicleRequestSearch']))
                return $model->vehicle['province'];

            $queryString = $queryParams['VehicleRequestSearch']['province'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->vehicle['province']);
        }
    ],
    [
        'class' => kartik\grid\ActionColumn::className(),
        'headerOptions' => ['style' => 'width:80px;'],
        'template' => '{view} {update}',
        'urlCreator' => function ($action, VehicleRequest $model, $key, $index, $column) {
            return Url::toRoute([$action, 'id' => $model->id]);
        },
    ],
];

$fullExportMenu = ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $columns,
    'filename' => 'AllVehicle_' . date('Ymd_His'),
    'target' => ExportMenu::TARGET_BLANK,
    'fontAwesome' => true,
    'pjaxContainerId' => 'kv-pjax-container',
    'exportConfig' => [
        ExportMenu::FORMAT_HTML => false,
        ExportMenu::FORMAT_CSV => false,
        ExportMenu::FORMAT_TEXT => false,
        ExportMenu::FORMAT_EXCEL => false,
        ExportMenu::FORMAT_PDF => false,
    ],
    'dropdownOptions' => [
        'label' => 'Export',
        'class' => 'btn btn-default',
        'itemsBefore' => [
            '<li class="dropdown-header">' . Yii::t('kvgrid', 'Export All Data') . '</li>',
        ],
    ],
]);

?>
<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2"><?php echo $this->title ?></h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php echo $createButton ?>
        </div>
    </div>
</div>

<div class="vehicleRequest-index mb-5 pb-5">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => true,
        'hover' => true,
        'panel' => [
            'type' => GridView::TYPE_SECONDARY,
            'heading' => '<h3 class="panel-title pt-2"><i class="fa-regular fa-calendar-circle-plus"></i> ' . $this->title . '</h3>',
        ],
        'columns' => $columns,
        'toolbar' => [
            $fullExportMenu,
        ],
    ]); ?>

</div>