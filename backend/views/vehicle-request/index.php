<?php

use common\models\VehicleRequest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vehicle Requests';
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;


$columns = [
    ['class' => 'yii\grid\SerialColumn'],

    [
        'attribute' => 'requested_role',
        'filter' => Html::activeDropDownList($searchModel, 'requested_role', $searchModel->getAllRoles(), ['prompt' => 'All Roles', 'class' => 'form-select']),
        'value' => function ($model) {
            return VehicleRequest::getAllRoles()[$model->requested_role];
        }
    ],
    [
        'attribute' =>  'requestName',
        'label' => 'Request Name',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['VehicleRequestSearch']))
                return $model->requester->fullname;

            $queryString = $queryParams['VehicleRequestSearch']['requestName'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->requester->fullname);
        }
    ],
    [
        'attribute' =>  'plateName',
        'label' => 'Plate',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['VehicleRequestSearch']))
                return $model->vehicle->plate;

            $queryString = $queryParams['VehicleRequestSearch']['plateName'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->vehicle->plate);
        }
    ],
    'status',
    'vehicletype',
    'creator',




    // [
    //     'attribute' => 'vehicle_id',
    //     'label' => 'Vehicle'
    // ],
    // 'requested_id',
    // 'requested_role',
    // 'approver',
    //'approved_at',
    //'status',
    //'creator',
    //'created_at',
    //'updater',
    //'updated_at',




    [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, VehicleRequest $model, $key, $index, $column) {
            return Url::toRoute([$action, 'id' => $model->id]);
        }

    ],
];
?>
<div class="vehicle-request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vehicle Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>


</div>