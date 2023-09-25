<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\web\View;

$this->title = 'Главная - '. Yii::$app->name;

?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Тут собрана моя Колекция!</h1>
        <p class="lead">Каждому человеку нужно какое-нибудь хобби — якобы с целью «выйти из стресса», — но ты-то прекрасно понимаешь, что на самом деле люди попросту пытаются выжить и не сойти с ума.</p>
    </div>
    <div class="body-content">
      <div class="row">
        <section class="categoryList">
          <h2>список категорий</h2>
          <ul>
            <?php foreach ($categorys as $item) : ?>
              <li>
                <div class="categoryTitle">
                  <a href="<?= Url::to(['main/category','name'=>$item->alias])?>"><?= $item->name; ?></a>
                </div>
              </li>
            <?php endforeach;
            ?>
          </ul>
        </section>
      </div>
      <h2>Последние загруженные</h2>
        <div class="row">
          <section class="lastGallery gallery">
            <?php foreach ($lasts as $item) : ?>
              <div class="item">
                <?= Html::img("@web{$item->image}",['class'=>'image']) ?>
                <div class="infoImage">
                  <div class="info">
                    <div class="view">Просмотров: <?= $item->views ?></div>
                    <div class="like">Понравилось: <?= $item->likes ?></div>
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
      <h2>Популярные</h2>
        <div class="row">
          <section class="popularGallery gallery">
            <?php foreach ($populars as $item) : ?>
              <div class="item">
                <?= Html::img("@web{$item->image}",['class'=>'image']) ?>
                <div class="infoImage">
                  <div class="info">
                    <div class="view">Просмотров: <?= $item->views ?></div>
                    <div class="like">Понравилось: <?= $item->likes ?></div>
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
<?php



$script = <<< JS
$('.likeImg').on('click',function(e){
  e.preventDefault();
  let selectImg=$(this).attr('data-img');
  $('.likeImg[data-img='+ selectImg +']').hide();
  $('.dizlikeImg[data-img='+ selectImg +']').show();
  editLike('like',selectImg);
})

$('.dizlikeImg').on('click',function(e){
  e.preventDefault();
  let selectImg=$(this).attr('data-img');
  $('.dizlikeImg[data-img='+ selectImg +']').hide();
  $('.likeImg[data-img='+ selectImg +']').show();
  editLike('dizlike',selectImg);
})

function editLike(action,id_image){
  
  
      console.log(action);
      $.ajax({
         url: '/main/edit_like',
          type: 'post',
          data: {action,id_image},
          success: function (data) {
            console.log('good');
          },
          error: function (jqXHR, exception) {
            console.log('Youps');
          }

    });

}
JS;




$this->registerJs($script);
?>