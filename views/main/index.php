<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\web\View;

$this->title = 'Главная - '. Yii::$app->name;

?>
<div class="col-12">
  <div class="jumbotron text-center bg-transparent">
      <h1 class="display-4">Тут собрана моя Колекция!</h1>
      <p class="lead">Каждому человеку нужно какое-нибудь хобби — якобы с целью «выйти из стресса», — но ты-то прекрасно понимаешь, что на самом деле люди попросту пытаются выжить и не сойти с ума.</p>
  </div>
</div>
<div class="col-lg-3 col-12">
  <div class="column_left">
    <section class="categoryList">
      <h2>категории</h2>
      <ul>
        <?php foreach ($categorys as $item) : ?>
          <li>
            <div class="categoryTitle">
              <a href="<?= Url::to(['main/category','name'=>$item->alias])?>"><?= $item->name; ?><span>(<?= $countInCategory[$item->id] ?>)</span></a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
  </div>
</div>
<div class="col-lg-9 col-12">
  <div class="site-index">
    <div class="body-content">
      <h2>Последние загруженные</h2>
        <div class="row">
          <section class="lastGallery gallery col-12">
            <div class="swiper swiperLast">
            <div class="swiper-wrapper">
              <?php foreach ($lasts as $item) : ?>
                <div class="swiper-slide" data-imgage_id="<?=$item->id;?>">
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
            </div>
            </div>
          </section>
        </div>
    </div>
      <h2>Популярные</h2>
        <div class="row">
          <section class="popularGallery gallery col-12">
          <div class="swiper swiperPopylar">
            <div class="swiper-wrapper">
            <?php foreach ($populars as $item) : ?>
              <div class="swiper-slide" data-imgage_id="<?=$item->id;?>">
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
        </div>
    </div>
  </div>
</div>

<?php



$script = <<< JS

JS;




$this->registerJs($script);
?>