<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class VehicleForm extends Model
{
    public $titlename;
    public $firstname;
    public $lastname;
    public $date;
    public $phoneNumber;
    public $creator;
    public $updater;

    public function rules()
    {
        return [
            [['titlename', 'firstname', 'lastname', 'phoneNumber', 'date'], 'required'],
            [['tilename'], 'string', 'max' => 20],
            [['firstname', 'lastname', 'date'], 'string', 'max' => 255],
            [['phoneNumber'], 'integer']

        ];
    }

    public function attributeLabels()
    {
        return [
            'titlename' => 'Title',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'phoneNumber' => 'Phone Number',
            'date' => 'Create Vehicle'
        ];
    }

    public function getFullname()
    {
        return $this->titlename . ' ' . $this->firstname . ' ' . $this->lastname;
    }
}
