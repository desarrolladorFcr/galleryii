<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\helpers\BaseUrl;

class SiteHelper extends Component{
    
    public function dollarFormat($number){
        $res = 0;
        if(is_numeric($number)){
            $res = number_format($number, 2, ',', '.');
        }
        return '$'.$res;
    }
    
    public function linkShow($controller, $text, $id){
        $rute = BaseUrl::base(true).'/'.$controller.'/view/?id='.$id;
        $link = "<a target='_blank' href='".$rute."'>$text</a>";
        return $link;
    }
    
    public function get_route($action){
        return BaseUrl::base(true).'/'.$action;
    }
}