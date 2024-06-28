<?php
$date = $request['create_date'];
$timestamp  = strtotime($date);
$thaiYear = date('Y', $timestamp) + 543;
$month = Yii::$app->date->date('F', $timestamp);
$date = Yii::$app->date->date('j', $timestamp);
$time = Yii::$app->date->date('H:i:s', $timestamp);
$img = "https://app.nextschool.io/img/logo/1672727480hkw_logo.png";

if ($request['type'] == 1) {
    $dataComeSchool = [
        'type' => "&#9745;",
        'period' => $request['period'],
        'create_date' => $time,
    ];
    $dataOutSchool = [
        'type' => "&#9723",
        'period' => "&nbsp;",
        'create_date' => "&nbsp;",
    ];
} else {
    $dataComeSchool = [
        'type' => "&#9723",
        'period' => "&nbsp;",
        'create_date' => "&nbsp;",
    ];
    $dataOutSchool = [
        'type' => "&#9745;",
        'period' => $request['period'],
        'create_date' => $time,
    ];
}
?>
<div style="float: center;font-size:12pt; text-align: center; font-weight:bold;">
    <div>
        <img src="<?php echo $img ?>">
    </div>
    <p>บัตรขออนุญาต (นักเรียน)</p>
    <p>โรงเรียนบดินทรเดชา (สิงห์ สิงหเสนี)</p>
    <p style="border-bottom: 0.5px outset black; width:55px; margin-left:290px;">ตอนที่ ๑</p>
    <dl style="margin-left:165px;font-weight:0px;">
        <dt style="width:30px;">วันที่</dt>
        <dd style="width:40px;"><?php echo $date ?></dd>
        <dt style="width:30px;">เดือน</dt>
        <dd style="width:90px;"><?php echo $month ?></dd>
        <dt style="width:30px;">พ.ศ.</dt>
        <dd style="width:45px;"><?php echo $thaiYear ?></dd>
    </dl>
</div>
<div style="float: left;font-size:12pt; text-align: left;">
    <p>เรียน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ครูประจำวิชา/ครูที่ปรึกษา/รองฯกลุ่มบริหารงานบุคคล</p>
    <dl>
        <dt style="margin-left:50px;width:50px;">ข้าพเจ้า</dt>
        <dd style="width:350px;"><?php echo $student['fullname'] ?></dd>
        <dt style="width:26px;">ม.</dt>
        <dd style="width:40px;"><?php echo $student['secondary'] . '/' . $student['room'] ?></dd>
        <dt style="width:40px;">เลขที่</dt>
        <dd style="width:50px;"><?php echo $student['student_number'] ?></dd>
        <dt style="width:70px;">ขออนุญาต</dt>
        <dt width="40px" style="font-family: fontawesome; font-size:80%; "><?php echo $dataComeSchool['type'] ?></dt>
        <dt style="width:150px;">เข้าห้องเรียน</dt>
        <dt style="width:40px;">คาบที่</dt>
        <dd style="width:125px;"><?php echo $dataComeSchool['period'] ?></dd>
        <dt style="width:40px;">เวลา</dt>
        <dd style="width:80px;"><?php echo $dataComeSchool['create_date'] ?></dd>
        <dt style="width:30px;">น.</dt>
        <dt style="width:70px;">ขออนุญาต</dt>
        <dt width="40px" style="font-family: fontawesome; font-size:80%; "><?php echo $dataOutSchool['type'] ?></dt>
        <dt style="width:150px;">ออกนอกบริเวณโรงเรียน</dt>
        <dt style="width:40px;">คาบที่</dt>
        <dd style="width:125px;"><?php echo $dataOutSchool['period'] ?></dd>
        <dt style="width:40px;">เวลา</dt>
        <dd style="width:80px;"><?php echo $dataOutSchool['create_date'] ?></dd>
        <dt style="width:30px;">น.</dt>
        <dt style="width: 60px;">เนื่องจาก</dt>
        <dd style="width: fit-content;"><?php echo $request['remark'] ?></dd>
    </dl>
</div>
<div style="font-size:12pt; padding-left: 40px; float: center;text-align: center;">
    <dl style="float:left; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:60px">ผู้ขออนุญาต</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:55px">ผู้ปกครอง</dt>
    </dl>
    <dl style="float:left; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"><?php echo $student['fullname'] ?></dd>
        <dt style="width: 26px;">)</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"><?php echo $parent['fullname'] ?></dd>
        <dt style="width: 26px;">)</dt>
    </dl>
    <dl style="float:left; width:50%;">
        <dt style="width: 40px;">โทร</dt>
        <dd style="width:150px;"><?php echo $student['phone_number'] ?></dd>
    </dl>
    <dl style="float:rigth; width:50%;text-align: center;">
        <dt style="margin-left: 25px;width: 40px;">โทร</dt>
        <dd style="width:150px;"><?php echo $parent['phone_number'] ?></dd>
    </dl>

</div>
<div style="font-size:12pt; padding-left: 40px; float: center;text-align: center;">
    <dl style="float:left; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:80px">ครูที่ปรึกษา</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:80px">ฝ่ายปกครอง</dt>
    </dl>
    <dl style="float:left; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"> <?php echo $parent['fullname'] ?> </dd>
        <dt style="width: 26px;">)</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"> <?php echo $student['fullname'] ?> </dd>
        <dt style="width: 26px;">)</dt>
    </dl>
</div>
<div style="float: center;font-size:12pt; text-align: center; margin-left:200px; margin-top:10px;">
    <dl>
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
    </dl>
    <dl>
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"> <?php echo $deputyDirector['fullname'] ?> </dd>
        <dt style="width: 26px;">)</dt>
    </dl>
    <dl style="margin-left:20px;">
        <dt style="width: 180px;"> <?php echo $deputyDirector['possition'] ?> </dt>
    </dl>
</div>
<hr style="margin-top: 5px; margin-bottom:0px;">
<div style="float: center;font-size:12pt; text-align: center; font-weight:bold;">
    <div>
        <img src="<?php echo $img ?>">
    </div>
    <p>บัตรขออนุญาต (นักเรียน)</p>
    <p>โรงเรียนบดินทรเดชา (สิงห์ สิงหเสนี)</p>
    <p style="border-bottom: 0.5px outset black; width:55px; margin-left:290px;">ตอนที่ ๒</p>
    <dl style="margin-left:165px;font-weight:0px;">
        <dt style="width:30px;">วันที่</dt>
        <dd style="width:40px;"><?php echo $date ?></dd>
        <dt style="width:30px;">เดือน</dt>
        <dd style="width:90px;"><?php echo $month ?></dd>
        <dt style="width:30px;">พ.ศ.</dt>
        <dd style="width:45px;"><?php echo $thaiYear ?></dd>
    </dl>
</div>
<div style="float: left;font-size:12pt; text-align: left;">
    <p>เรียน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ครูประจำวิชา/ครูที่ปรึกษา/รองฯกลุ่มบริหารงานบุคคล</p>
    <dl>
        <dt style="margin-left:50px;width:50px;">ข้าพเจ้า</dt>
        <dd style="width:350px;"><?php echo $student['fullname'] ?></dd>
        <dt style="width:26px;">ม.</dt>
        <dd style="width:40px;"><?php echo $student['secondary'] . '/' . $student['room'] ?></dd>
        <dt style="width:40px;">เลขที่</dt>
        <dd style="width:50px;"><?php echo $student['student_number'] ?></dd>
        <dt style="width:70px;">ขออนุญาต</dt>
        <dt width="40px" style="font-family: fontawesome; font-size:80%; "><?php echo $dataComeSchool['type'] ?></dt>
        <dt style="width:150px;">เข้าห้องเรียน</dt>
        <dt style="width:40px;">คาบที่</dt>
        <dd style="width:125px;"><?php echo $dataComeSchool['period'] ?></dd>
        <dt style="width:40px;">เวลา</dt>
        <dd style="width:80px;"><?php echo $dataComeSchool['create_date'] ?></dd>
        <dt style="width:30px;">น.</dt>
        <dt style="width:70px;">ขออนุญาต</dt>
        <dt width="40px" style="font-family: fontawesome; font-size:80%; "><?php echo $dataOutSchool['type'] ?></dt>
        <dt style="width:150px;">ออกนอกบริเวณโรงเรียน</dt>
        <dt style="width:40px;">คาบที่</dt>
        <dd style="width:125px;"><?php echo $dataOutSchool['period'] ?></dd>
        <dt style="width:40px;">เวลา</dt>
        <dd style="width:80px;"><?php echo $dataOutSchool['create_date'] ?></dd>
        <dt style="width:30px;">น.</dt>
        <dt style="width: 60px;">เนื่องจาก</dt>
        <dd style="width: fit-content;"><?php echo $request['remark'] ?></dd>
    </dl>
</div>
<div style="font-size:12pt; padding-left: 40px; float: center;text-align: center;">
    <dl style="float:left; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:60px">ผู้ขออนุญาต</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:55px">ผู้ปกครอง</dt>
    </dl>
    <dl style="float:left; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"><?php echo $student['fullname'] ?></dd>
        <dt style="width: 26px;">)</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"><?php echo $parent['fullname'] ?></dd>
        <dt style="width: 26px;">)</dt>
    </dl>
    <dl style="float:left; width:50%;">
        <dt style="width: 40px;">โทร</dt>
        <dd style="width:150px;"><?php echo $student['phone_number'] ?></dd>
    </dl>
    <dl style="float:rigth; width:50%;text-align: center;">
        <dt style="margin-left: 25px;width: 40px;">โทร</dt>
        <dd style="width:150px;"><?php echo $parent['phone_number'] ?></dd>
    </dl>

</div>
<div style="font-size:12pt; padding-left: 40px; float: center;text-align: center;">
    <dl style="float:left; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:80px">ครูที่ปรึกษา</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:80px">ฝ่ายปกครอง</dt>
    </dl>
    <dl style="float:left; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"> <?php echo $parent['fullname'] ?> </dd>
        <dt style="width: 26px;">)</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"> <?php echo $student['fullname'] ?> </dd>
        <dt style="width: 26px;">)</dt>
    </dl>
</div>
<div style="float: center;font-size:12pt; text-align: center; margin-left:200px; margin-top:8px;">
    <dl>
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
    </dl>
    <dl>
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"> <?php echo $deputyDirector['fullname'] ?> </dd>
        <dt style="width: 26px;">)</dt>
    </dl>
    <dl style="margin-left:20px;">
        <dt style="width: 180px;"> <?php echo $deputyDirector['possition'] ?> </dt>
    </dl>
</div>