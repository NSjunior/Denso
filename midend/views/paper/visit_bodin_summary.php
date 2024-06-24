<?php

use yii\helpers\Html;

$string = $model['name'];
$parts = explode('.', $string);
$modelname1 = $parts[0]; // ม.
$modelname2 = $parts[1]; // 6/6
?>

<div style="font-size:16pt;line-height:30px;">
    <div style="text-align: center; line-height:20px; margin-bottom: 15px;">
        <img src="<?php echo $logo['image']; ?>">
    </div>
    <p style="text-align:center;font-size:18pt;font-weight:bold;line-height:20px;">แบบสรุปการเยี่ยมบ้าน</p>
    <p style="text-align:center;font-size:16pt;font-weight:bold;padding-top:-20px;"><?php for ($i = 0; $i < 78; $i++) {
                                                                                        echo Html::tag('span', '&#9723;', ['style' => 'font-family: fontawesome; font-size:20%; background-color:black;']);
                                                                                        echo '&nbsp;';
                                                                                    } ?></p>
    <dl>
        <dt style="width:105px;">ชั้นมัธยมศึกษาปีที่</dt>
        <dd style="width:60px;"><?php echo empty($modelname2) ? "&nbsp;" : $modelname2; ?></dd>
        <dt style="width:110px;">จำนวนนักเรียนชาย</dt>
        <dd style="width:50px;"><?php echo empty($missing['totalMaleStudent']) ? "&nbsp;" : $missing['totalMaleStudent'];  ?></dd>
        <dt style="width:30px;">คน</dt>
        <dt style="width:35px;">หญิง</dt>
        <dd style="width:55px;"><?php echo empty($missing['totalFemaleStudent']) ? "&nbsp;" : $missing['totalFemaleStudent']; ?></dd>
        <dt style="width:30px;">คน</dt>
        <dt style="width:60px;">รวมทั้งสิ้น</dt>
        <dd style="width:40px;"><?php echo empty($missing['totalStudent']) ? "&nbsp;" : $missing['totalStudent']; ?></dd>
        <dt style="width:30px;">คน</dt>
    </dl>
    <dl>
        <dt style="width:85px; line-height:30px;">ครูที่ปรึกษา 1.</dt>
        <dd style="width:240px; line-height:30px;"><?php echo empty($teacherClass[0]['fullname']) ? "&nbsp;" : $teacherClass[0]['fullname']; ?></dd>
        <dt style="width:30px; line-height:30px;">2.</dt>
        <dd style="width:300px; line-height:30px;"><?php echo empty($teacherClass[1]['fullname']) ? "&nbsp;" : $teacherClass[1]['fullname']; ?></dd>
    </dl>
    <dl style="padding-left:70px;">
        <dt style="width:30px; line-height:30px; ">3.</dt>
        <dd style="width:240px; line-height:30px;"><?php echo empty($teacherClass[2]['fullname']) ? "&nbsp;" : $teacherClass[2]['fullname']; ?></dd>
    </dl>
    <div style="margin-left:45px;">
        <dl>
            <dt style="width:200px;">ได้ออกเยี่ยมบ้านแล้ว จำนวนทั้งสิ้น</dt>
            <dd style="width:60px;"><?php echo $missing['totalVisitStudent'] ?></dd>
            <dt style="width:30px;">คน</dt>
            <dt style="width:105px;">ไม่ได้เยี่ยมจำนวน</dt>
            <dd style="width:80px;"><?php echo $missing['totalNonVisitStudent'] ?></dd>
            <dt style="width:30px;">คน</dt>
        </dl>
        <p style="padding-top:5px;line-height:20px">1. สภาพแวดล้อมที่อยู่อาศัย</p>
        <div class="col-1" style="width:66%;float:left;margin-left:20px;">
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ดี เอื้อต่อการดำรงชีวิต<br />
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;พอใช้<br />
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ชุมชน/น่าห่วงใย<br />
        </div>
        <div class="col-1" style="width:33%;float:left;margin-top:-5px;margin-right:-20px">
            <dl>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_home_condition_good']) ? "&nbsp;" : $missing['student_home_condition_good']; ?></dd>
                <dt style="width:30px;">คน</dt>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_home_condition_normal']) ? "&nbsp;" : $missing['student_home_condition_normal']; ?></dd>
                <dt style="width:30px;">คน</dt>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_home_condition_bad']) ? "&nbsp;" : $missing['student_home_condition_bad']; ?></dd>
                <dt style="width:30px;">คน</dt>
            </dl>
        </div>
        <div style="float:left;margin-top:-5px;margin-left:20px">
            <dl>
                <dt style="width:60px;"> <span style="width:50px;font-family: fontawesome; font-size:80%;">&#9723;</span> อื่นๆ</dt>
                <dd style="width:510px;"><?php echo empty($missing['student_family_care_remark']) ? "&nbsp;" : $missing['student_home_condition_remark']; ?></dd>
            </dl>
        </div>
        <p style="padding-top:5px; line-height:20px">2. ลักษณะของสภาพแวดล้อม(ชุมชน/สังคม)ที่นักเรียนอาศัยอยู่</p>
        <div class="col-1" style="width:66%;float:left;margin-left:20px;">
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ดี เอื้อต่อการดำรงชีวิต<br />
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;พอใช้<br />
        </div>
        <div class="col-1" style="width:33%;float:left;margin-top:-5px;margin-right:-20px">
            <dl>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_living_environment_good']) ? "&nbsp;" : $missing['student_living_environment_good']; ?></dd>
                <dt style="width:30px;">คน</dt>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_living_environment_normal']) ? "&nbsp;" : $missing['student_living_environment_normal']; ?></dd>
                <dt style="width:30px;">คน</dt>
            </dl>
        </div>
        <div style="float:left;margin-top:-5px;margin-left:20px">
            <dl>
                <dt style="width:60px;"> <span style="width:50px;font-family: fontawesome; font-size:80%;">&#9723;</span> อื่นๆ</dt>
                <dd style="width:510px;"><?php echo empty($missing['student_family_care_remark']) ? "&nbsp;" : $missing['student_home_condition_remark']; ?></dd>
            </dl>
        </div>
        <p style="padding-top:5px; line-height:20px">3. สัมพันธภาพของครอบครัว</p>
        <div class="col-1" style="width:66%;float:left;margin-left:20px;">
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ใกล้ชิด / อบอุ่น / มีเหตุผล<br />
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;สนใจ / เอาใจใส่<br />
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ห่างเหิน / ให้อิสระ<br />
        </div>
        <div class="col-1" style="width:33%;float:left;margin-top:-5px;margin-right:-20px">
            <dl>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_relationship_level_close']) ? "&nbsp;" : $missing['student_relationship_level_close']; ?></dd>
                <dt style="width:30px;">คน</dt>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_relationship_level_care']) ? "&nbsp;" : $missing['student_relationship_level_care']; ?></dd>
                <dt style="width:30px;">คน</dt>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_relationship_level_let_free']) ? "&nbsp;" : $missing['student_relationship_level_let_free']; ?></dd>
                <dt style="width:30px;">คน</dt>
            </dl>
        </div>
        <div style="float:left;margin-top:-5px;margin-left:20px">
            <dl>
                <dt style="width:60px;"> <span style="width:50px;font-family: fontawesome; font-size:80%;">&#9723;</span> อื่นๆ</dt>
                <dd style="width:510px;"><?php echo empty($missing['student_family_care_remark']) ? "&nbsp;" : $missing['student_home_condition_remark']; ?></dd>
            </dl>
        </div>
        <p style="padding-top:5px; line-height:20px;">4. การเอาใจใส่ของครอบครัว</p>
        <div class="col-1" style="width:66%;float:left;margin-left:20px;">
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ครอบครัวเอาใจใส่ ดูแลด้านพฤติกรรมและการเรียน<br />
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ครอบครัวเอาใจใส่ (เล็กน้อย) ด้านพฤติกรรมและการเรียน<br />
            <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ครอบครัวให้อิสระ ไม่ใส่ใจติดตามด้านพฤติกรรมและการเรียน<br />
        </div>
        <div class="col-1" style="width:33%;float:left;margin-top:-5px;margin-right:-20px">
            <dl>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_family_care_close']) ? "&nbsp;" : $missing['student_family_care_close']; ?></dd>
                <dt style="width:30px;">คน</dt>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_family_care_care']) ? "&nbsp;" : $missing['student_family_care_care']; ?></dd>
                <dt style="width:30px;">คน</dt>
                <dt style="width:45px;">จำนวน</dt>
                <dd style="width:80px;"><?php echo empty($missing['student_family_care_let_free']) ? "&nbsp;" : $missing['student_family_care_let_free']; ?></dd>
                <dt style="width:30px;">คน</dt>
            </dl>
        </div>
        <div style="float:left;margin-top:-5px;margin-left:20px">
            <dl>
                <dt style="width:60px;"> <span style="width:50px;font-family: fontawesome; font-size:80%;">&#9723;</span> อื่นๆ</dt>
                <dd style="width:510px;"><?php echo empty($missing['student_family_care_remark']) ? "&nbsp;" : $missing['student_home_condition_remark']; ?></dd>
            </dl>
        </div>
        <div style="align-items: start; margin-left: 20px; " class="col-1">


        </div>
        <p style="padding-top:5px; line-height:20px;">5. ข้อเสนอแนะ / ความคิดเห็นของผู้ปกครอง</p>
    </div>
    <p>............................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</p>
</div>

<div id="home_condition" class="overmask" style="font-size:150%;padding-top:-730px;padding-left:70px"><strong><?php echo $missing['student_home_condition_good'] ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:-700px;padding-left:70px"><strong><?php echo $missing['student_home_condition_normal'] ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:-670px;padding-left:70px"><strong><?php echo $missing['student_home_condition_bad'] ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:-635px;padding-left:70px"><strong><?php echo $missing['student_home_condition_other'] ? "/" : "" ?></strong></div>

<div id="living_environment" class="overmask" style="font-size:150%;padding-top:-570px;padding-left:70px"><strong><?php echo $missing['student_living_environment_good'] ? "/" : "" ?></strong></div>
<div id="living_environment" class="overmask" style="font-size:150%;padding-top:-540px;padding-left:70px"><strong><?php echo $missing['student_living_environment_normal'] ? "/" : "" ?></strong></div>
<div id="living_environment" class="overmask" style="font-size:150%;padding-top:-510px;padding-left:70px"><strong><?php echo $missing['student_living_environment_other'] ? "/" : "" ?></strong></div>

<div id="relationship_level" class="overmask" style="font-size:150%;padding-top:-445px;padding-left:70px"><strong><?php echo $missing['student_relationship_level_close'] ? "/" : "" ?></strong></div>
<div id="relationship_level" class="overmask" style="font-size:150%;padding-top:-415px;padding-left:70px"><strong><?php echo $missing['student_relationship_level_care'] ? "/" : "" ?></strong></div>
<div id="relationship_level" class="overmask" style="font-size:150%;padding-top:-385px;padding-left:70px"><strong><?php echo $missing['student_relationship_level_let_free'] ? "/" : "" ?></strong></div>
<div id="relationship_level" class="overmask" style="font-size:150%;padding-top:-350px;padding-left:70px"><strong><?php echo $missing['student_relationship_level_other'] ? "/" : "" ?></strong></div>

<div id="family_care" class="overmask" style="font-size:150%;padding-top:-285px;padding-left:70px"><strong><?php echo $missing['student_family_care_close'] ? "/" : "" ?></strong></div>
<div id="family_care" class="overmask" style="font-size:150%;padding-top:-255px;padding-left:70px"><strong><?php echo $missing['student_family_care_care'] ? "/" : "" ?></strong></div>
<div id="family_care" class="overmask" style="font-size:150%;padding-top:-225px;padding-left:70px"><strong><?php echo $missing['student_family_care_let_free'] ? "/" : "" ?></strong></div>
<div id="family_care" class="overmask" style="font-size:150%;padding-top:-193px;padding-left:70px"><strong><?php echo $missing['student_family_care_other'] ? "/" : "" ?></strong></div>