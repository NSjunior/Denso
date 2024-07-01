<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\components\NgMpdf;

class PaperController extends Controller
{

  private function getBasePdfCss()
  {
    return 'body {font-size: 13pt;line-height: 15px;} .border {border:1px solid #000000;} .border-top {border-top:1px solid #000000;} .border-left {border-left:1px solid #000000;} .border-right {border-right:1px solid #000000;} .border-bottom {border-bottom:1px solid #000000;} .title {line-height: -1px;} .bold {font-weight: bold;} .underline {text-decoration: underline} .content {text-indent: 20mm;  margin-left: 4mm;margin-right: 8mm;} .float-left {float: left;} .float-right {float: right;} .clear {clear: both;} .pad-left {padding-left: 5mm;} .pad-right {padding-right: 5mm;} h2,h3 {margin:0;} h3{font-weight: bold;}';
  }

  private function footer()
  {
    $dtime = \DateTime::createFromFormat("Y-m-d", date('Y-m-d'));
    $timestamp = $dtime->getTimestamp();
    $footer = array(
      'odd' => array(
        'L' => array(
          'content' => 'สร้างโดย: ' . Yii::$app->name . ' (' .  Yii::$app->date->date('วันlที่ j F พ.ศ.Y เวลา H:i:s', $timestamp) . ')',
          'font-size' => 10,
          'font-family' => 'garuda',
        ),
        'R' => array(
          'content' => "หน้า {PAGENO}/{nb}",
          'font-size' => 11,
          'font-family' => 'garuda',
        ),
        'line' => 1,
      ),
      'even' => array(
        'L' => array(
          'content' => 'สร้างโดย: ' . Yii::$app->name . ' (' .  Yii::$app->date->date('วันlที่ j F พ.ศ.Y เวลา H:i:s', $timestamp) . ')',
          'font-size' => 10,
          'font-family' => 'garuda',
        ),
        'R' => array(
          'content' => "หน้า {PAGENO}/{nb}",
          'font-size' => 11,
          'font-family' => 'garuda',
        ),
        'line' => 1,
      ),
    );

    return $footer;
  }

  private function outputPDF($fileName, $content, $cssFilePath, $overrideConfig = [], $additionals = [], $watermark = "", $orientation = "P")
  {

    $margin_left = $overrideConfig['margin_left'] ?? null;
    $margin_right = $overrideConfig['margin_right'] ?? null;
    $margin_top = $overrideConfig['margin_top'] ?? null;
    $margin_bottom = $overrideConfig['margin_bottom'] ?? null;

    $mpdf = new NgMpdf('utf-8', 'A4', 12, 'thsarabunnew', $left = 18, $right = 13, $top = 8, $bottom = 8, $mgh = 5, $mgf = 2, 'P');

    $mpdf->showWatermarkText = true;
    $mpdf->filename = $fileName . ".pdf";
    $mpdf->title = $fileName;

    $customCssContent = $this->getBasePdfCss();
    if (!empty($cssFilePath)) {
      $customCssContent .= file_get_contents($cssFilePath);
    }

    if ($margin_left !== null) {
      $customCssContent .= '@page { margin-left: ' . $margin_left . 'px; }';
    }
    if ($margin_right !== null) {
      $customCssContent .= '@page { margin-right: ' . $margin_right . 'px; }';
    }
    if ($margin_top !== null) {
      $customCssContent .= '@page { margin-top: ' . $margin_top . 'px; }';
    }
    if ($margin_bottom !== null) {
      $customCssContent .= '@page { margin-bottom: ' . $margin_bottom . 'px; }';
    }

    $mpdf->genPdf($content, $customCssContent, $this->footer(), $additionals, $watermark);
  }

  public function actionVehicleRequest()
  {
    $data = [
      'name' => 'เมจิก',
      'plate' => 'กำไร'
    ];

    $html = $this->renderPartial('vehicle_request/request', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'ใบXXX_id_name';
    $extraCssPath = \Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }
}
