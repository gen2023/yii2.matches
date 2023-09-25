<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = $category->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<?php foreach ($images as $item) : ?>
  <?= Html::img("@web{$item->image}") ?>
  <div class="infoImage">
    <div class="info">
      <div class="view">Просмотров: <?= $item->views ?></div>
      <div class="like">Понравилось: <?= $item->likes ?></div>
    </div>
    <div class="navigation">
      <?= Html::img('@web/images/icon/like1.svg', ['alt' => 'Нравится','class'=>'likeImg']) ?>
      <?= Html::img('@web/images/icon/like2.svg', ['alt' => 'Нравится','class'=>'dizlikeImg']) ?>
    </div>
  </div>
<?php endforeach;?>
        <div class="pagination">
      <div class="nav-links">
      <?= LinkPager::widget(['pagination'=>$pages]); ?>
      </div>
    </div> 
</div>
