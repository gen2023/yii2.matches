<?php

namespace app\models;

use yii\db\ActiveRecord;

class Gallery extends ActiveRecord{

  public static function tableName(){
    return 'gallery';
  }

  public function getCategory(){
    return $this->hasOne(Category::class,['id'=>'category_id']);
  }

}