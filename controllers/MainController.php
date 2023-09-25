<?php

namespace app\controllers;

use yii;
use app\models\Gallery;
use app\models\Category;
use yii\web\Controller;
use yii\data\Pagination;

class MainController extends Controller
{
  public function actionIndex(){
    $query=Gallery::find()->with('category');
    $populars=$query->limit(4)->orderBy(['likes' => SORT_DESC])->all();
    $lasts=$query->limit(4)->orderBy(['id' => SORT_DESC])->all();

    $queryCategory=Category::find();
    $categorys=$queryCategory->all();

    return $this->render('index',[
      'populars'=>$populars,
      'lasts'=>$lasts,
      'categorys'=>$categorys,
    ]);
  }

  public function actionCategory($name){

    $category=Category::find()->where(['alias' => $name])->limit(1)->one();
    
    $query = Gallery::find()->where(['category_id' => $category->id]);
    $countQuery = clone $query;
    $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>1,'forcePageParam'=>false,'pageSizeParam'=>false]);
    $images = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

    return $this->render('category', [
         'images' => $images,
         'pages' => $pages,
         'category'=>$category,
    ]);

  }

  public function actionEdit_like() {
    $request = Yii::$app->request;
    $post = $request->post();
    $id_image=$post['id_image'];
    $action=$post['action'];
    // $result=Gallery::getImageInfo($id_image);
    // var_dump($result);
    $query = Gallery::find()->where(['id'=>$id_image]);
    $infoImage = $query->limit(1)->one();
    $newCount=0;
    if ($action=='like'){
      $newCount=$infoImage->likes+1;
    }else{
      $newCount=$infoImage->likes-1;
    }
    
    

    // return $this->redirect('index');
  }
  public function actionDizlike() {
    die;
    // return $this->redirect('index');
  }

}