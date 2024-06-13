<?php

namespace backend\controllers;

use common\models\VehicleRequest;
use common\models\VehicleRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Vehicle;
use common\models\Province;
use yii\db\Query;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\base\ErrorException;
use Yii;

/**
 * VehicleRequestController implements the CRUD actions for VehicleRequest model.
 */
class VehicleRequestController extends Controller
{


    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all VehicleRequest models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VehicleRequestSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $queryParams = $this->request->queryParams;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'queryParams' => $queryParams,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VehicleRequest model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $status = $this->getstatus($model->status);

        // $model->vehicle->type = $this->getTypeVehicle($model->vehicle->type);
        // $model->vehicle->province = $this->getProvinceName($model->vehicle->province);
        // $model->vehicle->provinceInfo->name;
        // $objOwnerRequest = $model->getOwnerRequest($model->requested_id, $model->requested_role);

        // $model->requested_role = $this->getRole($model->requested_role);

        // $path = Vehicle::UPLOAD_PATH;
        // $model->vehicle->plate_image = $path . $model->vehicle->plate_image;
        // $model->vehicle->image = $path . $model->vehicle->image;


        return $this->render('view', [
            'model' => $model,
            'status' => $status,
            // 'modelOwnerRequest' => $objOwnerRequest,
        ]);
    }

    /**
     * Creates a new VehicleRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new VehicleRequest();
        $modelVehicle = new Vehicle();
        if ($this->request->isPost) {
            $post = $this->request->post();

            if ($modelVehicle->load($post) && $model->load($post)) {
                $model->requested_role = VehicleRequest::ROLE_STUDENT;

                if (!empty($_FILES['Vehicle']['name']['plate_image']) && !empty($_FILES['Vehicle']['name']['image'])) {

                    $filePlate = UploadedFile::getInstance($modelVehicle, 'plate_image');
                    $filePlateName = "plate_" . $modelVehicle->plate . "_" . $model->requested_role . "_" . $model->requested_id . "." . $filePlate->getExtension();
                    $modelVehicle->plate_image = $filePlateName;

                    $fileImage = UploadedFile::getInstance($modelVehicle, 'image');
                    $fileImageName = "image_" . $modelVehicle->plate . "_" . $model->requested_role . "_" . $model->requested_id . "." . $fileImage->getExtension();
                    $modelVehicle->image = $fileImageName;

                    $path = Vehicle::UPLOAD_PATH;
                    if (!file_exists($path)) {
                        FileHelper::createDirectory($path);
                    }

                    $filePlate->saveAs($path . $filePlateName);
                    $fileImage->saveAs($path . $fileImageName);
                } else {
                    dump($_FILES);
                    exit;
                }

                if ($modelVehicle->save()) {
                    $model->vehicle_id = $modelVehicle->id;
                    $model->requested_role = VehicleRequest::ROLE_STUDENT;
                    $model->creator = user()->id;
                    $model->status = VehicleRequest::STATUS_REQUEST;

                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        dump($model->errors);
                        exit;
                    }
                } else {
                    dump($modelVehicle->errors);
                    exit;
                }
            } else {
                dump($model->errors);
                dump($modelVehicle->errors);
                exit;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelVehicle' => $modelVehicle
        ]);
    }
    /**
     * Updates an existing VehicleRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $path = Vehicle::UPLOAD_PATH;
        $model = $this->findModel($id);
        $modelVehicle = $model->vehicle;
        $modelVehicle->scenario = 'update';
        $imageName = $modelVehicle->image;
        $plateImageName = $modelVehicle->plate_image;
        $modelVehicle->plate_image = $path . $modelVehicle->plate_image;
        $modelVehicle->image = $path . $modelVehicle->image;
        $objOwnerRequest = $model->getOwnerRequest($model->requested_id, $model->requested_role);
        $date = date('Ymd_His');
        if ($this->request->isPost) {
            $post = $this->request->post();
            $path = Vehicle::UPLOAD_PATH;
            if ($modelVehicle->load($post) && $model->load($post)) {
                if ($_FILES['Vehicle']['name']['plate_image']) {
                    unlink($path . $plateImageName);
                    $filePlate = UploadedFile::getInstance($modelVehicle, 'plate_image');
                    $filePlateName = "plate_"  . $model->requested_role . "_" . $model->requested_id . "_" . $date . "." . $filePlate->getExtension();
                    $modelVehicle->plate_image = $filePlateName;
                    $filePlate->saveAs($path . $filePlateName);
                } else {
                    $modelVehicle->plate_image = $plateImageName;
                }

                if (!empty($_FILES['Vehicle']['name']['image'])) {
                    unlink($path . $imageName);
                    $fileImage = UploadedFile::getInstance($modelVehicle, 'image');
                    $fileImageName = "image_" . $model->requested_role . "_" . $model->requested_id . "_" . $date . "." . $fileImage->getExtension();
                    $modelVehicle->image = $fileImageName;
                    $fileImage->saveAs($path . $fileImageName);
                } else {
                    $modelVehicle->image = $imageName;
                }


                $path = Vehicle::UPLOAD_PATH;
                if (!file_exists($path)) {
                    FileHelper::createDirectory($path);
                }
                if ($modelVehicle->save()) {
                    $model->vehicle_id = $modelVehicle->id;
                    $model->creator = user()->id;
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        dump($model->errors);
                        exit;
                    }
                } else {
                    dump($modelVehicle->errors);
                    exit;
                }
            } else {
                dump($model->errors);
                dump($modelVehicle->errors);
                exit;
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('update', [
            'model' => $model,
            'objOwnerRequest' => $objOwnerRequest,
            'modelVehicle' => $modelVehicle
        ]);
    }

    /**
     * Deletes an existing VehicleRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = VehicleRequest::STATUS_REVOKE;
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the VehicleRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return VehicleRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VehicleRequest::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionListProvince($q = null, $id = null) // discontinue
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select(['id', 'name AS text'])
                ->from('province')
                ->where([
                    'or',
                    ['like', 'name', $q],
                ])
                ->limit(10);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Province::find($id)->name];
        }
        return $out;
    }
    public function getstatus($status) // discontinue
    {
        if ($status == 0) {
            $arrstatus = ['warning', 'รออนุมัติ'];
        } elseif ($status == 10) {
            $arrstatus = ['success', 'อนุมัติ'];
        } elseif ($status == -1) {
            $arrstatus = ['danger', 'ไม่อนุมัติ'];
        } else {
            $arrstatus = ['secondary', 'ยกเลิก'];
        }
        return $arrstatus;
    }

    public function getTypeVehicle($typeId) // discontinue
    {
        if ($typeId == 10) {
            $typeName = 'มอเตอร์ไซค์';
        } elseif ($typeId == 20) {
            $typeName = 'รถยนต์';
        }
        return $typeName;
    }

    // public function getProvinceName($provincId)
    // {
    //     $provincName = Province::find()
    //         ->select('name')
    //         ->where(['id' => $provincId])
    //         ->one();
    //     return $provincName->name;
    // }

    // public function getRole($role)
    // {
    //     if ($role == VehicleRequest::ROLE_STUDENT) {
    //         $role = 'นักเรียน';
    //     } elseif ($role == VehicleRequest::ROLE_TEACHER) {
    //         $role = 'ครู';
    //     } else {
    //         $role = 'อื่น ๆ';
    //     }

    //     return $role;
    // }
}
