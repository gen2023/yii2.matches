<?php

namespace app\module\admin\controllers;

use app\models\Gallery;
use app\models\Category;
use app\models\Slogan;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
        $query=Gallery::find()->with('category');
        $total=$query->count();
        
        
        $query=Gallery::find();
        $total_Like=$query->sum('likes');

        $query=Gallery::find();
        $total_View=$query->sum('views');

   
        $queryCategory=Category::find();
        $categorys=$queryCategory->all();
    
        $countInCategory=array();
        foreach ($categorys as $item){
          $query = Gallery::find()->where(['category_id' => $item->id]);
          $countInCategory[$item->id]=$query->count();
        }

        $querySlogan=Slogan::find();
        $slogans=$querySlogan->all();
    
        return $this->render('index',[
            'total'           => $total,
            'total_Like'      => $total_Like,
            'total_View'      => $total_View,
            'categorys'       => $categorys,
            'countInCategory' => $countInCategory,
            'slogans'         => $slogans,
        ]);
      }
}
