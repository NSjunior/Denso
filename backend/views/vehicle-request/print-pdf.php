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


$this->title = "Print PDF";
$this->params['breadcrumbs'][] = ['label' => 'คำร้องขอสติ้กเกอร์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;

\yii\web\YiiAsset::register($this);


$columns = [
    ['class' => '\kartik\grid\CheckboxColumn'],
    [
        'attribute' => 'requester',
        'label' => 'ชื่อ',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['VehicleRequestSearch']))
                return $model->requester->fullname;

            $queryString = $queryParams['VehicleRequestSearch']['requester'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->requester->fullname);
        }
    ], [
        'attribute' => 'requested_role',
        'headerOptions' => ['style' => 'width:120px;'],
        'filter' => Html::activeDropDownList($searchModel, 'requested_role', $searchModel->listRoles(), ['prompt' => 'บทบาท', 'class' => 'form-select']),
        'label' => 'บทบาท',
        'format' => 'raw',
        'value' => function ($model) {
            if ($model->requested_role == 10) {
                return "นักเรียน";
            } elseif ($model->requested_role == 20) {
                return "ครู";
            } else {
                return "อื่น ๆ ";
            }
        },
    ],
    [
        'attribute' => 'vehicleType',
        'headerOptions' => ['style' => 'width:120px;'],
        'filter' => Html::activeDropDownList($searchModel, 'vehicleType', Vehicle::listTypes(), ['prompt' => 'ประเภทรถ', 'class' => 'form-select']),
        'label' => 'ประเภทรถ',
        'format' => 'raw',
        'value' => function ($model) {
            if ($model->vehicle->type == 10) {
                return "รถยนต์";
            } elseif ($model->vehicle->type == 20) {
                return "มอเตอร์ไซค์";
            }
        },
    ], [
        'attribute' => 'plate',
        'headerOptions' => ['style' => 'width:120px;'],
        'label' => 'เลขทะเบียนรถ',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['VehicleRequestSearch'])) {
                return $model->vehicle->plate;
            }
            $queryString = $queryParams['VehicleRequestSearch']['plate'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->vehicle->plate);
        }
    ], [
        'attribute' => 'status',
        'headerOptions' => ['style' => 'width:120px;'],
        'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->listStatus(), ['prompt' => 'สถานะ', 'class' => 'form-select']),
        'label' => 'สถานะ',
        'format' => 'raw',
        'value' => function ($model) {
            if ($model->status == 10) {
                return badge('success', 'อนุมัติ');
            } elseif ($model->status == 0) {
                return badge('warning', 'รออนุมัติ');
            } elseif ($model->status == -1) {
                return badge('danger', 'ไม่อนุมัติ');
            } else {
                return badge('secondary', 'ยกเลิก');
            }
        },
    ], [
        'attribute' => 'creator',
        'headerOptions' => ['style' => 'width:120px;'],
        'label' => 'ผู้สร้างคำร้อง',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['VehicleRequestSearch']))
                return $model->creatorInfo->username;

            $queryString = $queryParams['VehicleRequestSearch']['requester'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->creatorInfo->username);
        }
    ],

    [
        'class' => kartik\grid\ActionColumn::className(),
        'headerOptions' => ['style' => 'width:80px;'],
        'template' => '{view}',
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

    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php //echo $createButton 
            ?>

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
            'heading' => '<h3 class="panel-title pt-2"><i class="fa-solid fa-print"></i> ' . $this->title . '</h3>',
            'after' => '<div class="d-flex justify-content-end"><button class ="btn btn-primary pull-right text-light" id = "btn-pdf" >pdf</button>
            </div> '
        ],
        'columns' => $columns,
        'toolbar' => [
            $fullExportMenu,
        ],
        'id' => "listVehicle",
    ]); ?>

</div>
<?php
$this->registerJs('
  jQuery("#btn-pdf").click(function(){
    var keys = $("#listVehicle").yiiGridView("getSelectedRows");
    console.log(keys);
    if(keys.length>0){
      jQuery.post("' . Url::to(['print-pdf']) . '",{ids:keys.join()},function(){

      });
    }
  });
');

?>