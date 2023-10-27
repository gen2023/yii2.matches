<?php

namespace app\controllers;

use yii;
use app\models\Gallery;
use app\models\Category;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\LoginForm;

class MainController extends Controller
{
  public function actionIndex(){
    // $query=Gallery::find()->with('category');
    $query=Gallery::find()->select('*, `likes` + `views` as `sum_popular`')->with('category');
    $populars=$query->limit(10)->orderBy(['sum_popular' => SORT_DESC])->all();
    $lasts=$query->limit(10)->orderBy(['id' => SORT_DESC])->all();

    $queryCategory=Category::find();
    $categorys=$queryCategory->all();

    $countInCategory=array();
    foreach ($categorys as $item){
      $query = Gallery::find()->where(['category_id' => $item->id]);
      $countInCategory[$item->id]=$query->count();
    }

    return $this->render('index',[
      'populars'=>$populars,
      'lasts'=>$lasts,
      'categorys'=>$categorys,
      'countInCategory'=>$countInCategory,
    ]);
  }

  public function actionCategory($name){

    $category=Category::find()->where(['alias' => $name])->limit(9)->one();
    
    $query = Gallery::find()->where(['category_id' => $category->id]);
    $countQuery = clone $query;
    $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>9,'forcePageParam'=>false,'pageSizeParam'=>false]);
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
    $query = Gallery::find()->where(['id'=>$id_image]);
    $infoImage = $query->limit(1)->one();
    $newCount=0;
    if ($action=='like'){
      $newCount=$infoImage->likes+1;
    }else{
      $newCount=$infoImage->likes-1;
    }

    Gallery::updateAll(['likes'=>$newCount],['id'=>$id_image]);

    return $newCount;

  }

  public function actionEdit_view() {
    $request = Yii::$app->request;
    $post = $request->post();
    $id_image=$post['id_image'];
    $query = Gallery::find()->where(['id'=>$id_image]);
    $infoImage = $query->limit(1)->one();
    $newCount=0;
    $newCount=$infoImage->views+1;

    Gallery::updateAll(['views'=>$newCount],['id'=>$id_image]);

    return $newCount;

  }

      /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}