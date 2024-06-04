<?php

use common\models\VehicleRequest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vehicle Requests';
$this->params['breadcrumbs'][] = $this->title;
<<<<<<< HEAD
$this->disableTitleDisplay = true;

=======
>>>>>>> origin/develop
?>
<div class="vehicle-request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vehicle Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<<<<<<< HEAD
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
=======
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
>>>>>>> origin/develop

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
<<<<<<< HEAD
            [
                'attribute' => 'vehicle_id',
                'label' => 'Vehicle'
            ],
=======

            'id',
            'vehicle_id',
>>>>>>> origin/develop
            'requested_id',
            'requested_role',
            'approver',
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
<<<<<<< HEAD
                }
=======
                 }
>>>>>>> origin/develop
            ],
        ],
    ]); ?>


</div>
