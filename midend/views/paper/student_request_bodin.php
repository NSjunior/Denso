<?php
$date = $request['create_date'];
$timestamp  = strtotime($date);
$thaiYear = date('Y', $timestamp) + 543;
$month = Yii::$app->date->date('F', $timestamp);
$date = Yii::$app->date->date('j', $timestamp);

$img = "https://app.nextschool.io/img/logo/1672727480hkw_logo.png";
?>
<div style="float: center;font-size:14pt; text-align: center; font-weight:bold;">
    <div style="line-height:10px; margin-bottom: 10px;">
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
<div style="float: left;font-size:14pt; text-align: left; margin-top: 10px;">
    <p>เรียน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ครูประจำวิชา/ครูที่ปรึกษา/รองฯกลุ่มบริหารงานบุคคล</p>
    <dl>
        <dt style="margin-left:50px;width:50px;">ข้าพเจ้า</dt>
        <dd style="width:350px;">นายหกฟกหกฟสหวา</dd>
        <dt style="width:26px;">ม.</dt>
        <dd style="width:40px;">1/1</dd>
        <dt style="width:40px;">เลขที่</dt>
        <dd style="width:50px;">30</dd>
        <dt style="width:70px;">ขออนุญาต</dt>
        <dt width="40px" style="font-family: fontawesome; font-size:80%; ">&#9723</dt>
        <dt style="width:150px;">เข้าห้องเรียน</dt>
        <dt style="width:40px;">คาบที่</dt>
        <dd style="width:125px;">1,2,4</dd>
        <dt style="width:40px;">เวลา</dt>
        <dd style="width:80px;"> 23123</dd>
        <dt style="width:30px;">น.</dt>
        <dt style="width:70px;">ขออนุญาต</dt>
        <dt width="40px" style="font-family: fontawesome; font-size:80%; ">&#9723</dt>
        <dt style="width:150px;">ออกนอกบริเวณโรงเรียน</dt>
        <dt style="width:40px;">คาบที่</dt>
        <dd style="width:125px;">1,2,4</dd>
        <dt style="width:40px;">เวลา</dt>
        <dd style="width:80px;"> 23123</dd>
        <dt style="width:30px;">น.</dt>
        <dt style="width: 60px;">เนื่องจาก</dt>
        <dd style="width: fit-content;">&nbsp;</dd>
    </dl>
</div>
<div style="font-size:14pt; margin-top: 5px;padding-left: 40px; float: center;text-align: center;">
    <dl style="float:left; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:50px">ผู้ปกครอง</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:40px">นักเรียน</dt>
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
    <dl style="float:left; width:50%;">
        <dt style="width: 40px;">โทร</dt>
        <dd style="width:150px;"><?php echo $parent['phone_number'] ?></dd>
    </dl>
    <dl style="float:rigth; width:50%;text-align: center;">
        <dt style="margin-left: 25px;width: 40px;">โทร</dt>
        <dd style="width:150px;"><?php echo $student['phone_number'] ?></dd>
    </dl>

</div>
<div style="font-size:14pt; margin-top: 5px;padding-left: 40px; float: center;text-align: center;">
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
<div style="float: center;font-size:14pt; text-align: center; margin-left:200px; margin-top:10px;">
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
<hr>
<div style="float: center;font-size:14pt; text-align: center; font-weight:bold;">
    <div style="line-height:10px; margin-bottom: 10px;">
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
<div style="float: left;font-size:14pt; text-align: left; margin-top: 10px;">
    <p>เรียน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ครูประจำวิชา/ครูที่ปรึกษา/รองฯกลุ่มบริหารงานบุคคล</p>
    <dl>
        <dt style="margin-left:50px;width:50px;">ข้าพเจ้า</dt>
        <dd style="width:350px;">นายหกฟกหกฟสหวา</dd>
        <dt style="width:26px;">ม.</dt>
        <dd style="width:40px;">1/1</dd>
        <dt style="width:40px;">เลขที่</dt>
        <dd style="width:50px;">30</dd>
        <dt style="width:70px;">ขออนุญาต</dt>
        <dt width="40px" style="font-family: fontawesome; font-size:80%; ">&#9723</dt>
        <dt style="width:150px;">เข้าห้องเรียน</dt>
        <dt style="width:40px;">คาบที่</dt>
        <dd style="width:125px;">1,2,4</dd>
        <dt style="width:40px;">เวลา</dt>
        <dd style="width:80px;"> 23123</dd>
        <dt style="width:30px;">น.</dt>
        <dt style="width:70px;">ขออนุญาต</dt>
        <dt width="40px" style="font-family: fontawesome; font-size:80%; ">&#9723</dt>
        <dt style="width:150px;">ออกนอกบริเวณโรงเรียน</dt>
        <dt style="width:40px;">คาบที่</dt>
        <dd style="width:125px;">1,2,4</dd>
        <dt style="width:40px;">เวลา</dt>
        <dd style="width:80px;"> 23123</dd>
        <dt style="width:30px;">น.</dt>
        <dt style="width: 60px;">เนื่องจาก</dt>
        <dd style="width: fit-content;">&nbsp;</dd>
    </dl>
</div>
<div style="font-size:14pt; margin-top: 5px;padding-left: 40px; float: center;text-align: center;">
    <dl style="float:left; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:50px">ผู้ปกครอง</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:40px">นักเรียน</dt>
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
    <dl style="float:left; width:50%;">
        <dt style="width: 40px;">โทร</dt>
        <dd style="width:150px;"><?php echo $parent['phone_number'] ?></dd>
    </dl>
    <dl style="float:rigth; width:50%;text-align: center;">
        <dt style="margin-left: 25px;width: 40px;">โทร</dt>
        <dd style="width:150px;"><?php echo $student['phone_number'] ?></dd>
    </dl>

</div>
<div style="font-size:14pt; margin-top: 5px;padding-left: 40px; float: center;text-align: center; ">
    <dl style="float:left; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:60px">ครูที่ปรึกษา</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width:180px;">&nbsp;</dd>
        <dt style="width:65px">ฝ่ายปกครอง</dt>
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
<div style="float: center;font-size:14pt; text-align: center; margin-left:200px; margin-top:10px;">
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