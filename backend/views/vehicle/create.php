<?php

use yii\helpers\Html;

<<<<<<< HEAD
/** @var yii\web\View $this */
/** @var common\models\Vehicle $model */

$this->title = 'Create Vehicle';
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
=======
$this->title = ""
?>

<?= $this->render('_form', [
    'model' => $model,
]);
>>>>>>> feature/vehicleUI
