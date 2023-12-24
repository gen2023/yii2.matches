<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Slogan $model */

$this->title = 'Create Slogan';
$this->params['breadcrumbs'][] = ['label' => 'Slogans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slogan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
