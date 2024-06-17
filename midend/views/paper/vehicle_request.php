<?php
$date = date("dd/MM/YYYY");
$date = Yii::$app->date->date('วันที่ j เดือน F  ปี Y', strtotime($vehicleRequest["created_at"]));
?>
<style>

</style>
<div style="margin-left:40px;margin-right:0px;padding-top:5px;">
    <div class="col-1" style="width:2cm;height:1cm;float:right;">
        <p><strong>เลขที่.../<?php echo Yii::$app->date->date('Y') ?></strong></p>
    </div>
    <div class="col-1" style="margin-left:130px;width:80%;float:left;margin-top:-13px">
        <h2>แบบขอรับสติ๊กเกอร์ติดรถผ่านเข้า-ออก</h2>
    </div>
</div>

<h2 style="text-align: center;">โรงเรียนหนองกี่พิทยาคม</h2>
<!-- <h3 style="padding-top:15px;padding-bottom:-12px;text-align: right;height:2cm;"><strong><//?php echo $date ?></strong></h3> -->

<div style="margin-left:350px;margin-right:0px;padding-top:5px;height:2cm;">
    <dl style="padding-top:10px;padding-bottom:12px;font-size:16pt;text-align: right;">
        <dt style="width:30px;">วันที่</dt>
        <dd style="width:40px;"><?php echo Yii::$app->date->date('d') ?></dd>
        <dt style="width:35px;">เดือน </dt>
        <dd style="width:80px;"><?php echo Yii::$app->date->date('F') ?></dd>
        <dt style="width:30px;">พ.ศ. </dt>
        <dd style="width:100px;"><?php echo Yii::$app->date->date('Y') ?></dd>
    </dl>
</div>
<dl style="font-size:16pt;">
    <dt style="width:80px;">ชื่อ</dt>
    <dd style="width:260px;"><?php echo $requester["title"] . '&nbsp;' . $requester["firstname"]  ?></dd>
    <dt style="width:55px;">นามสกุล</dt>
    <dd style="width:265px;"><?php echo $requester["lastname"] ?></dd>

    <dt style="width:30px;">ที่อยู่</dt>
    <dd style="width:220px;"><?php echo $requester["home_number"] ?></dd>
    <dt style="width:30px;">หมู่</dt>
    <dd style="width:120px;"><?php echo $requester["moo"] ?></dd>
    <dt style="width:40px;">ตำบล</dt>

    <dd style="width:220px;"><?php echo $requester["subdistrict"] ?></dd>
    <dt style="width:40px;">อำเภอ</dt>
    <dd style="width:160px;"><?php echo $requester["district"] ?></dd>
    <dt style="width:40px;">จังหวัด</dt>
    <dd style="width:160px;"><?php echo $requester["province"] ?></dd>
    <dt style="width:110px;">หมายเลขโทรศัพท์</dt>
    <dd style="width:150px;"><?php echo $requester["phone"] ?></dd>


    <dt style="width:20px;">
        <?php if ($requester["type"] == 1) {
            echo '<div id="type" class="overmask" style="font-size:150%;padding-left:55px;padding-top:-15px;"><strong>/</strong></div>';
        } elseif ($requester["type"] == 2) {
            echo '<div id="type" class="overmask" style="font-size:150%;padding-left:55px;padding-top:-15px;"><strong>/</strong></div>';
        } elseif ($requester["type"] == 3) {
            echo '<div id="type" class="overmask" style="font-size:150%;padding-left:55px;padding-top:-15px;"><strong>/</strong></div>';
        } elseif ($requester["type"] == 4) {
            echo '<div id="type" class="overmask" style="font-size:150%;padding-left:55px;padding-top:-15px;"><strong>/</strong></div>';
        }
        ?>
    </dt>
    <dt style="width:640px; padding-left:-30px;">
        <strong>ประเภท</strong>&nbsp;&nbsp;
        <span class="col-3" style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;นักเรียน
        <span class="col-3" style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ครูและบุคลากรทางการศึกษา
        <span class="col-3" style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ผู้ประกอบการร้านค้า
        <span class="col-3" style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;อื่นๆ
    </dt>
</dl>

<p style="font-size:16pt;padding-left:30px;padding-top:20px;padding-bottom:10px;">มีประสงค์ จะขอรับสติ๊กเกอร์ติดรถประเภท</p>
<dl style="font-size:16pt;padding-bottom:10px;">
    <dt style="width:640px;">
        <span class="col-4" style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;รถยนตร์
        <span class="col-4" style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;รถจักรยานยนต์
    </dt>
</dl>

<dl style="font-size:16pt;">
    <dt style="width:30px;">ยี่ห้อ</dt>
    <dd style="width:200px;"><?php echo $vehicle["brand"] ?></dd>
    <dt style="width:30px;">รุ่น</dt>
    <dd style="width:200px;"><?php echo $vehicle["model"] ?></dd>
    <dt style="width:30px;">สี</dt>
    <dd style="width:150px;"><?php echo $vehicle["color"] ?></dd>
    <dt style="width:110px;">หมายเลขทะเบียน</dt>
    <dd style="width:150px;"><?php echo $vehicle["plate"] ?></dd>
    <dt style="width:50px;">จังหวัด</dt>
    <dd><?php echo $vehicle["province"] ?></dd>
    <dt>หลักฐานสำหรับการยื่นคำขอ</dt>
    <dt style="padding-left:30px;">1. แนบภาพถ่ายด้านข้างตัวรถให้เห็นโครงสร้างตัวรถชัดเจน</dt>
    <dt style="padding-left:30px;">2. แนบภาพถ่ายทะเบียนรถจากด้านท้ายตัวรถ</dt>
    <dt>* หมายเหตุข้าพเจ้าจะปฏิบัติตาม พรบ. จราจรทางบกและตามคำแนะนะของพนักงานเจ้าหน้าที่อย่างเคร่งครัด หากฝ่าฝืนหรือกระทำผิดร้ายแรง ยินยอมให้เพิกถอนและชดใช้ค่าเสียหายให้กับทางราชการโดยทันที</dt>
</dl>
<dl style="font-size:16pt;float:right;margin-left:350px;padding-top:20px;">
    <dt style="margin-left:100px;">ขอรับรองว่าข้อความข้างต้นเป็นจริง</dt>
    <dt style="width:50px">ลงชื่อ</dt>
    <dd>sasdsd</dd>
    <dt style="margin-left:200px;">ผู้ขอ</dt>
    <dt>() อนุญาต ()ไม่อนุญาติ เนื่องจาก</dt>
    <dd></dd>
    <dt style="width:50px">ลงชื่อ</dt>
    <dd><?php echo $appover["fullname"] ?></dd>
    <dt style="width:50px">ตำแหน่ง</dt>
    <dd><?php echo $appover["position"] ?></dd>
    <dt style="margin-left:200px;">ผู้อนุญาต</dt>
</dl>