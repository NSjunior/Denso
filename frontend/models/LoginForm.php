<?php

namespace frontend\models;

use common\models\Employee;
use common\models\Booking;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
  public $company_id;
  public $username;
  public $rememberMe = true;
  public $period_id;

  private $_user = false;

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['company_id', 'username', 'period_id'], 'required'],
      [['username'], 'string', 'length' => [7, 7]],
      [['username'], 'trim'],
      [['username'], 'validateEmployeeCode'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'username' => 'Employee ID',
      'company_id' => 'Company ID',
    ];
  }

  /**
   * Validates the password.
   * This method serves as the inline validation for password.
   *
   * @param string $attribute the attribute currently being validated
   * @param array $params the additional name-value pairs given in the rule
   */
  public function validatePassword($attribute, $params)
  {
    if (!$this->hasErrors()) {
      $user = $this->getUser();
      if (!$user) {
        $this->addError($attribute, 'Incorrect username or password.');
      }
    }
  }

  /**
   * Logs in a user using the provided username and password.
   *
   * @return boolean whether the user is logged in successfully
   */
  public function login()
  {
    if ($this->validate() && $this->getUser()) {
      return Yii::$app->user->login(
        $this->getUser(),
        $this->rememberMe ? 3600 * 24 * 30 : 0
      );
    } else {
      // return $this->addError('message', 'ไม่สามารถเข้าสู่ระบบได้ เนื่องจากไม่พบรหัสพนักงานที่ระบุ');
      return false;
    }
  }

  public function beforeValidate()
  {

    $this->username = trim($this->username ?? '');
    // $this->password = trim(str_replace('-', '', $this->password));

    return parent::beforeValidate(); // TODO: Change the autogenerated stub
  }

  /**
   * Finds user by [[username]]
   *
   * @return User|null
   */
  public function getUserOriginal()
  {
    if ($this->_user === false) {
      $this->_user = Employee::find()
        ->where([
          'code' => $this->username,
          'status' => 10,
          'company_id' => 1,
        ])
        ->one();
    }

    return $this->_user;
  }

  public function existingEmployeeCode($companyId)
  {

    return Employee::find()
      ->where([
        'code' => $this->username,
        'status' => Employee::STATUS_ACTIVE,
        'company_id' => $companyId,
      ])
      ->one();
  }

  public function hasBooked()
  {
    return Booking::find()->where([
      'source_id' => $this->username,
      'company_id' => $this->company_id,
    ])->one();
  }

  public function getUser()
  {
    if ($this->_user === false) {

      $user = Booking::find()->where([
        'source_id' => $this->username,
        'company_id' => $this->company_id,
        'period_id' => $this->period_id,
      ])->one();

      $this->_user = $user;
      if (!$this->_user) {
        // Calculate Period Age Range
        $target = db()->createCommand("select distinct(slot_date) from slot where period_id = :id", [
          ':id' => $this->period_id,
        ])->queryColumn();

        if ($target) {
          // Auto Register
          $registrant = new Booking();
          $registrant->source_id = $this->username;
          $registrant->company_id = $this->company_id;
          $registrant->period_id = $this->period_id;
          $registrant->status = Booking::STATUS_ACTIVE;
          $registrant->creator = 0;

          $session = Yii::$app->session;
          $previousBookingTargetId = $session->get('BOOKING_CHANGE_FROM_TARGET');
          if ($previousBookingTargetId) {
            $registrant->previous_target = $previousBookingTargetId;
          }

          if ($registrant->save()) {
            $this->_user = $registrant;
          } else {
            dump($registrant->errors);
            exit;
          }
        }
      }
    }

    return $this->_user;
  }

  public function validateEmployeeCode($attribute)
  {

    $employeeCode = $this->$attribute;
    if (is_numeric($employeeCode) && strlen($employeeCode) === 7)
      return true;
    else
      return false;


    return $this->addError($attribute, t('Invalid Employee Code'));
  }


  public function validateCitizenID($attribute)
  {

    $citizenID = $this->$attribute;

    $citizenLen = strlen($citizenID);



    if ($citizenLen > 0 && is_numeric($citizenID) && strlen($citizenID) == 13) {
      $i = 0;
      $checkSum = 0;
      for ($cursor = 13; $cursor > 1; $cursor--) {
        $checkSum += $citizenID[$i] * $cursor;
        $i++;
      }
      $validator = (string) (11 - ($checkSum % 11));
      $validator = strlen($validator) == 2 ? (string) $validator[1] : $validator;

      if ($validator == $citizenID[12]) {
        return true;
      }
    } else if ($citizenLen == 9 || str_starts_with($citizenID, 'G')) {
      return true;
    }

    return $this->addError($attribute, t('Invalid Citizen ID'));
  }
}
