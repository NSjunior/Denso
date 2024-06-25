<?php

use yii\helpers\Html;

$string = $model['name'];
$parts = explode('.', $string);
$modelname1 = $parts[0]; // ม.
$modelname2 = $parts[1]; // 6/6

$homeCondition = [
    'good' => 1,
    'fair' => 2,
    'worry' => 3,
    'remark' => '',
];
$homeEnvCondition = [
    'good' => 0,
    'fair' => 0,
    'remark' => '',
];
$famailyRelationship = [
    'close' => 0,
    'care' => 0,
    'freedom' => 0,
    'remark' => '',
];
$familyCare = [
    'close' => 0,
    'care' => 0,
    'freedom' => 0,
    'remark' => '',
];


?>
<meta charset="UTF-8">
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
        <p style="padding-top:5px; line-height:20px">1. สภาพแวดล้อมที่อยู่อาศัย</p>
        <div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $homeCondition['good'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">ดี เอื้อต่อการดำรงชีวิต</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $homeCondition['good']; ?></dd>
                        <dt style="width:30px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $homeCondition['fair'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">พอใช้</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $homeCondition['fair']; ?></dd>
                        <dt style="width:30px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $homeCondition['worry'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">ชุมชน/น่าห่วงใย</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $homeCondition['worry']; ?></dd>
                        <dt style="width:30px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float:left;">
                    <dl>
                        <dt style="width:60px;"> <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $homeCondition['remark'] != '' ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp; อื่นๆ</dt>
                        <dd style="width:510px;"><?php echo $homeCondition['remark'] == '' ? "&nbsp;" : $homeCondition['remark'];  ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <p style="padding-top:5px; line-height:20px">2. ลักษณะของสภาพแวดล้อม(ชุมชน/สังคม)ที่นักเรียนอาศัยอยู่</p>
        <div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $homeEnvCondition['good'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">ดี เอื้อต่อการดำรงชีวิต</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $homeEnvCondition['good']; ?></dd>
                        <dt style="width:30px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $homeEnvCondition['fair'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">พอใช้</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $homeEnvCondition['fair']; ?></dd>
                        <dt style="width:30px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float:left;">
                    <dl>
                        <dt style="width:60px;"> <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $homeEnvCondition['remark'] != '' ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp; อื่นๆ</dt>
                        <dd style="width:510px;"><?php echo $homeEnvCondition['remark']  == '' ? "&nbsp;" : $homeEnvCondition['remark']; ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <p style="padding-top:5px; line-height:20px">3. สัมพันธภาพของครอบครัว</p>
        <div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $famailyRelationship['close'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">ใกล้ชิด / อบอุ่น / มีเหตุผล</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $famailyRelationship['close']; ?></dd>
                        <dt style="width:40px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $famailyRelationship['care'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">สนใจ / เอาใจใส่</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $famailyRelationship['care']; ?></dd>
                        <dt style="width:40px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $famailyRelationship['freedom'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">ห่างเหิน / ให้อิสระ</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $famailyRelationship['freedom']; ?></dd>
                        <dt style="width:40px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float:left;">
                    <dl>
                        <dt style="width:60px;"> <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $famailyRelationship['remark'] != '' ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp; อื่นๆ</dt>
                        <dd style="width:510px;"><?php echo $famailyRelationship['remark']  == '' ? "&nbsp;" : $famailyRelationship['remark']; ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <p style="padding-top:5px; line-height:20px;">4. การเอาใจใส่ของครอบครัว</p>
        <div style="padding:0px;">
            <div style="margin-left:25px;">
                <div style="float: left;width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $familyCare['close'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">ครอบครัวเอาใจใส่ ดูแลด้านพฤติกรรมและการเรียน</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $familyCare['close']; ?></dd>
                        <dt style="width:30px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $familyCare['care'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">ครอบครัวเอาใจใส่ (เล็กน้อย) ด้านพฤติกรรมและการเรียน</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $familyCare['care']; ?></dd>
                        <dt style="width:30px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float: left; width:65%; text-align:left;">
                    <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $familyCare['freedom'] != 0 ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp;
                    <span width="200px">ครอบครัวให้อิสระ ไม่ใส่ใจติดตามด้านพฤติกรรมและการเรียน</span>
                </div>
                <div style="float:rigth;width:30%">
                    <dl>
                        <dt style="width:50px;">จำนวน</dt>
                        <dd style="width:60px; "><?php echo $familyCare['freedom']; ?></dd>
                        <dt style="width:30px;">คน</dt>
                    </dl>
                </div>
            </div>
            <div style="margin-left:25px;">
                <div style="float:left;">
                    <dl>
                        <dt style="width:60px;"> <span width="80px" style="font-family: fontawesome; font-size:80%;"><?php echo $familyCare['remark'] != '' ? "&#9745;" : "&#9723"; ?></span>&nbsp;&nbsp; อื่นๆ</dt>
                        <dd style="width:510px;"><?php echo $familyCare['remark'] == '' ? "&nbsp;" : $familyCare['remark'];  ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <p style="padding-top:5px; line-height:20px;">5. ข้อเสนอแนะ / ความคิดเห็นของผู้ปกครอง</p>
    </div>
    <p style="padding-left: 60px;">....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</p>
</div>