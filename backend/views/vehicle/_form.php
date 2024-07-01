<?php

<<<<<<< HEAD
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Vehicle $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vehicle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plate_image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
=======
use PhpOffice\PhpSpreadsheet\Calculation\Information\Value;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/js/plugins/piexif.js"></script>
<script src="/js/fileinput.js"></script>
<div class="row justify-conent-lg-center">

    <h3><?php echo $this->title ?></h3>
    <?php $form = ActiveForm::begin() ?>

    <div class="col-md">
        <?php echo $form->field($model, 'titlename', [
            'inputOptions' => [
                'id' => 'title',
                'placeholder' => 'ระบุคำนำหน้าชื่อ',
            ],
            'template' => '<div class="form-floating ">{input}{label}{error}{hint}</div>',
        ])->dropDownList(['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว', 'ว่าที่ร้อยตรี' => 'ว่าที่ร้อยตรี', 'อื่นๆ' => 'อื่นๆ'], [
            'class' => 'form-select pt-4',
            'style' => 'line-height:25px',
            'prompt' => 'ระบุคำนำหน้าชื่อ',
        ])->label('คำนำหน้าชื่อ') ?>
    </div>
    <div class="col-md" id="titlename_input" style='display: none;' ,>
        <?php
        echo $form->field($model, 'titlename', [
            'inputOptions' => [
                'class' => 'form-control ',
                'id' => 'titlename',
                'placeholder' => 'คำนำหน้าชื่อ',
            ],
            'template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',

        ])->label('คำนำหน้าชื่อ') ?>
    </div>

    <div class="col-md">
        <?php
        echo $form->field($model, 'firstname', [
            'inputOptions' => [
                'class' => 'form-control',
                'id' => 'firstname',
                'placeholder' => 'ชื่อ'
            ],
            'template' => '<div class="form-floating">{input}{label}{hint}</div>'
        ])->label('ชื่อ') ?>
    </div>


    <div class="col-md">
        <?php
        echo $form->field($model, 'lastname', [
            'inputOptions' => [
                'class' => 'form-control',
                'id' => 'lastname',
                'placeholder' => 'นามสกุล'
            ],
            'template' => '<div class="form-floating">{input}{label}{hint}</div>'
        ])->label('นามสกุล')
        ?>
    </div>

    <div class="col-md">
        <?php
        echo $form->field($model, 'phoneNumber', [
            'inputOption' => [
                'class' => 'form-control',
                'id' => 'phoneNumber',
                'placeholder' => 'เบอร์โทร'
            ],
            'template' => '<div class="form-floating">{input}{label}{hint}</div>'
        ])->label('เบอร์โทร')
        ?>
    </div>
    <?= $form->field($model, 'date') ?>



    <div class="file-loading">
        <input id="input-image-4" name="input-image" type="file" accept="image/*">
    </div>
    <script>
        $("#input-image-4").fileinput({
            uploadUrl: "/site/image-upload",
            allowedFileExtensions: ["jpg", "png", "gif"],
            maxImageWidth: 200,
            maxImageHeight: 150,
            resizePreference: 'height',
            maxFileCount: 1,
            resizeImage: true,
            resizeIfSizeMoreThan: 1000,
            showPreview: true,
        }).on('filepreupload', function() {
            $('#kv-success-box').html('');
        }).on('fileuploaded', function(event, data) {
            $('#kv-success-box').append(data.response.link);
            $('#kv-success-modal').modal('show');
        });
    </script>

    <?php ActiveForm::end(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#title').change(function() {
            var value = $('#title :selected').text();
            console.log(value);
            if (value === "อื่นๆ") {
                document.getElementById('titlename_input').style.display = 'block';
            } else {
                document.getElementById('titlename_input').style.display = 'none';
            }
            //Here update the div where you need to see the selected value
        });
    });
</script>
>>>>>>> feature/vehicleUI
