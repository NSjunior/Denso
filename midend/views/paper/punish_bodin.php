<?php
$dtime = \DateTime::createFromFormat("Y-m-d", date('Y-m-d'));
$timestamp = $dtime->getTimestamp();
$thaiYear = date('Y', $timestamp) + 543;
$month = Yii::$app->date->date('F', $timestamp);
$date = Yii::$app->date->date('j', $timestamp);

$datePunish = $punish['create_date'];
$timestampPunish  = strtotime($datePunish);
$thaiYearPunish = date('Y', $timestampPunish) + 543;
$monthPunish = Yii::$app->date->date('F', $timestampPunish);
$datePunish = Yii::$app->date->date('j', $timestampPunish);

$img = "https://app.nextschool.io/img/logo/1672727480hkw_logo.png";
?>
<div style="float: center;font-size:16pt;">
    <p style="text-align:right;">บด.ป.3</p>
    <div style="text-align: center; line-height:10px; margin-bottom: 10px;">
        <img src="<?php echo $img ?>">
    </div>
    <p style="text-align:center; font-weight: bold;">แบบบันทึกการลงโทษนักเรียน</p>
    <p style="text-align:right;"> <?php echo "โรงเรียนบดินทรเดชา(สิงห์ สิงหเสนี)" ?> </p>
    <dl style="font-size:16pt;float: right;margin-left:350px;">
        <dt style="width:30px;">วันที่</dt>
        <dd style="width:40px;"><?php echo $date ?></dd>
        <dt style="width:30px;">เดือน</dt>
        <dd style="width:90px;"><?php echo $month ?></dd>
        <dt style="width:30px;">พ.ศ.</dt>
        <dd style="width:45px;"><?php echo $thaiYear ?></dd>
    </dl>
</div>


<dl style="margin-top: 5px;font-size:16pt;">
    <dt style="padding-left: 40px; width:55;">เนื่องด้วย</dt>
    <dd style="width:190px;"><?php echo $student['title'] . $student['firstname'] ?></dd>
    <dt style="width:50px;">นามสกุล</dt>
    <dd style="width:190px;"><?php echo $student['lastname'] ?></dd>
    <dt style="width:30px;">ชั้น</dt>
    <dd style="width:70px;"><?php echo 'ม.' . $student['secondary'] . '/' . $student['room'] ?></dd>
    <dt style="width:85px;">เลขที่ประจำตัว</dt>
    <dd style="width:120px;"><?php echo $student['student_id'] ?></dd>
    <dt style="width:220px;">ได้กระทำผิดระเบียบของโรงเรียน ข้อที่</dt>
    <dd style="width:40px;"><?php echo $punish['id'] ?></dd>
    <dt style="width:30px;">เรื่อง</dt>
    <dd style="width:fit-content">&nbsp;</dd>
    <dd style="width:fit-content"><?php echo $punish['name'] ?></dd>
    <dt style="width:50px;">เมื่อวันที่</dt>
    <dd style="width:40px;"><?php echo $datePunish ?></dd>
    <dt style="width:30px;">เดือน</dt>
    <dd style="width:100px;"><?php echo $monthPunish ?></dd>
    <dt style="width:30px;">พ.ศ.</dt>
    <dd style="width:50px;"><?php echo $thaiYearPunish ?></dd>
</dl>
<dl style="font-size:16pt; ">
    <dt style="padding-left: 40px;">ดังนั้น เพื่อเจตนาที่จะแก้นิสัยและความประพฤติไม่ดีของนักเรียนให้รู้สำนึกในความผิดกลับประพฤติ</dt>
    <dt style="width: 460px;">ตนในทางที่ดี และมิให้เป็นเยี่ยงอย่างต่อผู้อื่นไป<?php echo "บดินเดขา (สิงห์ สิงหเสนี)" ?> จึงลงโทษ</dt>
    <dd style="width: 185px;">&nbsp;</dd>
    <dd width="350px">lkda;sld</dd>
    <dt>ตามระเบียบว่าด้วยการลงโทษนักเรียน ดังนี้</dt>
</dl>

<div style="padding-left: 150px; font-size:16pt; ">
    <dl>
        <dt width="10px" style="font-family: fontawesome; font-size:80%; "><?php echo  empty($punish_meta['warning']['meta_value']) ? "&#9723" : "&#9745;"; ?></dt>
        <dt width="120px"> ว่ากล่าวตักเตือน</dt>
    </dl>
    <dl>
        <dt width="10px" style="font-family: fontawesome; font-size:80%;"><?php echo  empty($punish_meta['parole']['meta_value']) ? "&#9723" : "&#9745;"; ?></dt>
        <dt width="120px"> ทำทัณฑ์บน</dt>
    </dl>
    <dl>
        <dt width="10px" style="font-family: fontawesome; font-size:80%;"><?php echo  empty($punish_meta['deductPoints']['meta_value']) ? "&#9723" : "&#9745;"; ?></dt>
        <dt width="120px">ตัดคะแนนพฤติกรรม</dt>
        <dd width="110px"><?php echo $punish_meta['deductPoints']['meta_value'] ?></dd>
        <dt width="45px">คะแนน</dt>
    </dl>
    <dl>
        <dt width="10px" style="font-family: fontawesome; font-size:80%;"><?php echo  empty($punish_meta['participateActivities']['meta_value']) ? "&#9723" : "&#9745;"; ?></dt>
        <dt width="235px"> ทำกิจกรรมเพื่อปรับเปลี่ยนพฤติกรรม โดย</dt>
        <dd width="180px"><?php echo $punish_meta['participateActivities']['meta_value'] ?></dd>
    </dl>
</div>




<div style="margin-top: 10px;  text-align: center;font-size:14pt; ">
    <dl style=" text-align: center;">
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width: 175px;">&nbsp;</dd>
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width: 175px;">&nbsp;</dd>
        <dt style="width:30px;">ลงชื่อ</dt>
        <dd style="width: 175px;">&nbsp;</dd>
    </dl>
    <dl>
        <dt style="width: 25px;">(</dt>
        <dd style="width:150px; "><?php echo $teacherClass[0]['fullname'] ?></dd>
        <dt style="width: 25px;">)</dt>
        <dt style="width: 25px;">(</dt>
        <dd style="width:150px;"><?php echo $teacherClass[1]['fullname'] ?></dd>
        <dt style="width: 25px;">)</dt>
        <dt style="width: 25px;">(</dt>
        <dd style="width:150px;"><?php echo $teacherClass[1]['fullname'] ?></dd>
        <dt style="width: 25px;">)</dt>
    </dl>
    <dl>
        <dt style="width: 210px;">........./......................../.........</dt>
        <dt style="width: 210px;">........./......................../.........</dt>
        <dt style="width: 210px;">........./......................../.........</dt>
    </dl>
    <dl>
        <dt style="width: 210px;"><?php echo $teacherClass[0]['possition'] ?></dt>
        <dt style="width: 210px;"><?php echo $teacherClass[1]['possition'] ?></dt>
        <dt style="width: 120px;"><?php echo $teacher['possition'] ?></dt>
        <dd style="width: 70px;"><?php echo $student['secondary'] ?></dd>
    </dl>
</div>
<div style="margin-top: 15px; font-size:14pt; padding-left: 40px;float: center;text-align: center;">
    <dl style="float:left; width:50%;">
        <dt style="width:50px;">ลงชื่อ</dt>
        <dd style="width: 200px;">&nbsp;</dd>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width:50px;">ลงชื่อ</dt>
        <dd style="width: 200px;">&nbsp;</dd>
    </dl>
    <dl style="float:left; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"> <?php echo $deputyDirector['fullname'] ?> </dd>
        <dt style="width: 30px;">)</dt>
    </dl>
    <dl style="float:rigth; width:50%;">
        <dt style="width: 30px;">(</dt>
        <dd style="width: 180px;"> <?php echo $director['fullname'] ?> </dd>
        <dt style="width: 30px;">)</dt>
    </dl>
    <dl style="float:left; width:45%;">
        <dt style="width: 240px;"><?php echo $deputyDirector['possition'] ?></dt>
    </dl>
    <dl style="float:rigth; width:55%;text-align: center;">
        <dt style="margin-left: 25px;width: 280px;"><?php echo $director['possition'] ?></dt>
    </dl>
</div>
<hr>
<dl style="font-size:16pt;">
    <dt style="padding-left: 50px; width: 60px;">ข้าพเจ้า</dt>
    <dd style="width: 170px;"><?php echo $parent['fullname'] ?></dd>
    <dt style="width: 90px;">ผู้ปกครองของ</dt>
    <dd style="width: 200px;"><?php echo $student['fullname'] ?></dd>
    <dt style="width:800px;">ได้รับทราบพฤติกรรมและการลงโทษครั้งที่แล้ว และสัญญาว่าจะดูแลว่ากล่าวตักเตือนและแก้ไขพฤติกรรม</dt>
    <dt style="width:fit-content;">นักเรียนในปกครองของข้าพเจ้าให้อยู่ในระเบียบของโรงเรียนต่อไป ถ้าฝ่าฝืนไม่ปฏิบัติตามระเบียนโรงเรียน</dt>
    <dt style="width:fit-content;">ยินดีให้โรงเรียนพิจารณาโทษตามที่เห็นสมควร</dt>
</dl>

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