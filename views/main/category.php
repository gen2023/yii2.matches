<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = $category->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page_category">
  <h1><?= Html::encode($this->title) ?></h1>
  <section class="listImage gallery">
  <?php foreach ($images as $item) : ?>
    <div class="item" data-imgage_id="<?=$item->id;?>">
      <?= Html::img("@web{$item->image}",['class'=>'image']) ?>
      <div class="infoImage">
        <div class="info">
          <div class="view">Просмотров: <span class="number"><?= $item->views ?></span></div>
          <div class="like">Понравилось: <span class="number"><?= $item->likes ?></span></div>
        </div>
        <div class="navigation">
          <?= Html::img('@web/images/icon/like1.svg', ['alt' => 'Нравится','class'=>'likeImg','data-img'=>$item->id]) ?>
          <?= Html::img('@web/images/icon/like2.svg', ['alt' => 'Нравится','class'=>'dizlikeImg','data-img'=>$item->id]) ?>
        </div>
      </div>
    </div>
  <?php endforeach;?>
  </section>
  <div class="pagination">
    <div class="nav-links">
      <?= LinkPager::widget(['pagination'=>$pages]); ?>
    </div>
  </div> 
</div>
