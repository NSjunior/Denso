<?php

namespace backend\controllers;

use backend\models\vehicleForm;
use yii\web\Controller;
use Yii;

class VehicleController extends Controller
{

    public function actionCreate()
    {
        $model = new VehicleForm();
        // if ($this->request->ispost) {
        // }
        echo $model->phoneNumber;
        return $this->render('create', ['model' => $model]);
    }
}
