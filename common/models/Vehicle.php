<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "vehicle".
 *
 * @property int $id
 * @property string $plate
 * @property string $province
 * @property int $type
 * @property string $brand
 * @property string $model
 * @property string $color
 * @property string|null $image
 * @property string|null $plate_image
 *
 * @property VehicleRequest[] $vehicleRequests
 */
class Vehicle extends \yii\db\ActiveRecord
{
    const UPLOAD_PATH = "/uploads/vehicle/";

    const TYPE_CAR = 10;
    const TYPE_MOTORCYCLE = 20;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plate', 'province', 'type', 'brand', 'model', 'color'], 'required'],
            [['type'], 'default', 'value' => null],
            [['type'], 'integer'],
            [['plate', 'province', 'brand', 'model', 'color'], 'string', 'max' => 255],
            [['plate', 'province'], 'unique', 'targetAttribute' => ['plate', 'province']],
            [['image', 'plate_image'], 'file', 'extensions' => 'jpeg,jpg,png', 'on' => 'update', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plate' => 'Plate',
            'province' => 'Province',
            'type' => 'Type',
            'brand' => 'Brand',
            'model' => 'Model',
            'color' => 'Color',
            'image' => 'Image',
            'plate_image' => 'Plate Image',
        ];
    }

    /**
     * Gets query for [[VehicleRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleRequests()
    {
        return $this->hasMany(VehicleRequest::class, ['vehicle_id' => 'id']);
    }

    public function getProvinceInfo()
    {
        return $this->hasOne(Province::class, ['id' => 'province']);
    }

    public static function listTypes()
    {
        return [
            self::TYPE_MOTORCYCLE => 'มอเตอร์ไซค์',
            self::TYPE_CAR => 'รถยนต์'
        ];
    }
}
