<?php
date_default_timezone_set('Asia/Bangkok');

$date = new DateTime();

$formatter = new IntlDateFormatter(
    'th_TH@calendar=buddhist',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Asia/Bangkok',
    IntlDateFormatter::TRADITIONAL
);


// Alternatively, if 'Y', 'M', and 'd' don't work as expected, use a different formatting approach
$formatter->setPattern('yyyy');
$year = $formatter->format($date);

$formatter->setPattern('MMMM');
$month = $formatter->format($date);


$formatter->setPattern('dd');
$day = $formatter->format($date);

?>


<h2>แบบขอรับสติ๊กเกอร์ติดรถผ่านเข้า-ออก</h2>
<div style="width:4.6cm;height:4.8cm;float:right;">
    <p style="padding-top:15px;padding-bottom:-12px;"><strong>เลขที่.../<?php echo $year ?></strong></p>
</div>


<h2>โรงเรียนหนองกี่พิทยาคม</h2>
<div style="width: 6.6cm;height:4.8cm;float:right;">
    <h3 style="padding-top:15px;padding-bottom:-12px;"><strong>วันที่ <?php echo $day ?> เดือน <?php echo $month ?> พ.ศ. <?php echo $year ?></strong></h3>
</div>

<dl>
    <dt style="width:80px;font-weight:bold;">ชื่อภาษาไทย</dt>
    <dd style="width:260px;"><?php echo "dsads" . '&nbsp;' . "daksl;" ?></dd>
    <dt style="width:55px;font-weight:bold;">นามสกุล</dt>
    <dd style="width:265px;"><?php echo "dakl" ?></dd>
</dl>