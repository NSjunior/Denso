<?php

namespace backend\controllers;

use backend\controllers\PaperController as ControllersPaperController;
use common\models\VehicleRequest;
use common\models\VehicleRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use PaperController;
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
        $date = date('Ymd_His');
        if ($this->request->isPost) {
            $post = $this->request->post();

            if ($modelVehicle->load($post) && $model->load($post)) {
                $model->requested_role = VehicleRequest::ROLE_STUDENT;

                if (!empty($_FILES['Vehicle']['name']['plate_image']) && !empty($_FILES['Vehicle']['name']['image'])) {

                    $filePlate = UploadedFile::getInstance($modelVehicle, 'plate_image');
                    $filePlateName = "plate_" . $modelVehicle->plate . "_" . $model->requested_role . "_" . $model->requested_id . "_" . $date . "." . $filePlate->getExtension();
                    $modelVehicle->plate_image = $filePlateName;

                    $fileImage = UploadedFile::getInstance($modelVehicle, 'image');
                    $fileImageName = "image_" . $modelVehicle->plate . "_" . $model->requested_role . "_" . $model->requested_id . "_" . $date . "." . $fileImage->getExtension();
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
        $date = date('Ymd_His');
        $model = $this->findModel($id);
        $modelVehicle = $model->vehicle;
        $imageName = $modelVehicle->image;
        $plateImageName = $modelVehicle->plate_image;
        $modelVehicle->plate_image = $path . $modelVehicle->plate_image;
        $modelVehicle->image = $path . $modelVehicle->image;


        if ($this->request->isPost) {
            $post = $this->request->post();
            $path = Yii::getAlias("@backend/web" . Vehicle::UPLOAD_PATH);
            if ($modelVehicle->load($post) && $model->load($post)) {
                if ($_FILES['Vehicle']['name']['plate_image']) {
                    $filePlate = UploadedFile::getInstance($modelVehicle, 'plate_image');
                    $filePlateName = "plate_"  . $model->requested_role . "_" . $model->requested_id . "_" . $date . "." . $filePlate->getExtension();
                    $modelVehicle->plate_image = $filePlateName;
                    $filePlate->saveAs($path . $filePlateName);
                } else {
                    $modelVehicle->plate_image = $plateImageName;
                }

                if (!empty($_FILES['Vehicle']['name']['image'])) {
                    $fileImage = UploadedFile::getInstance($modelVehicle, 'image');
                    $fileImageName = "image_" . $model->requested_role . "_" . $model->requested_id . "_" . $date . "." . $fileImage->getExtension();
                    $modelVehicle->image = $fileImageName;
                    $fileImage->saveAs($path . $fileImageName);
                } else {
                    $modelVehicle->image = $imageName;
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

    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        $model->status = VehicleRequest::STATUS_APPROVED;
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionReject($id)
    {
        $model = $this->findModel($id);
        $model->status = VehicleRequest::STATUS_REJECT;
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionPdf($id)
    {
        $PaperController = new ControllersPaperController('PaperController', Yii::$app);
        $result = $PaperController->actionVehicle_request();
        return $this->render('index', ['result' => $result]);
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

    public function uploadImage($model, $imageName, $savePath)
    {
        $path = Vehicle::UPLOAD_PATH;
        if (!file_exists($path)) {
            FileHelper::createDirectory($path);
        }
    }

    public function actionPrintPdf()
    {
        $searchModel = new VehicleRequestSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $queryParams = $this->request->queryParams;

        return $this->render('print-pdf', [
            'searchModel' => $searchModel,
            'queryParams' => $queryParams,
            'dataProvider' => $dataProvider,
        ]);
    }

    private function dataVehicleRequest($id)
    {
        $model = $this->findModel($id);
        return [
            'vehicleRequest' => [
                'id', $model->id,
                'created_at' =>  $model->created_at,
                'reason' => '', // when reject
                'status' =>  $model->status, //10: approved, -1: reject
            ],
            'requester' => [
                'title' => $model->requester->title,
                'firstname' => $model->requester->firstname,
                'lastname' => $model->requester->lastname,
                'home_number' => '167/12',
                'moo' => '3',
                'subdistrict' => 'พระนครศรีอยุธยา',
                'district' => 'พระนครศรีอยุธยา',
                'province' => 'พระนครศรีอยุธยา',
                'phone' => '0912345678',
                'type' => $model->requested_role,
            ],
            'appover' => [
                'fullname' => 'นาย สุรชัย ไขแจ้ง',
                'position' => 'ครูกิจการนักเรียน',
            ],
            'vehicle' => [
                'plate' => $model->vehicle->plate,
                'province' => $model->vehicle->province,
                'type' => $model->vehicle->type,
                'brand' => $model->vehicle->brand,
                'model' => $model->vehicle->model,
                'color' => $model->vehicle->color,
                'image' => $model->vehicle->image,
                'plate_image' => $model->vehicle->plate_image,
            ],
        ];
    }
    // public function getTypeVehicle($typeId) // discontinue
    // {
    //     if ($typeId == 10) {
    //         $typeName = 'มอเตอร์ไซค์';
    //     } elseif ($typeId == 20) {
    //         $typeName = 'รถยนต์';
    //     }
    //     return $typeName;
    // }

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
