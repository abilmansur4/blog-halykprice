<?php
/**
 * Created by PhpStorm.
 * User: Abilmansur
 * Date: 31.07.2019
 * Time: 23:44
 */

    namespace App\Http\Controllers;
    use App\Chelovek;
    use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User2;
class TreeController extends Controller {
    public function treeView(){
        $Cheloveks = Chelovek::where('parent_id', '=', 0)->get();
        $tree='<ul id="browser" class="filetree"><li class="tree-view"></li>';
        foreach ($Cheloveks as $usr) {
            $tree .='<li class="tree-view closed"<a class="tree-name">'.$usr->name.'</a>';
            if(count($usr->childs)) {
                $tree .=$this->childView($usr);
            }
        }
        $tree .='<ul>';
        // return $tree;
        return view('files.treeview',compact('tree'));
    }
    public function childView($usr){
        $html ='<ul>';
        foreach ($usr->childs as $arr) {
            if(count($arr->childs)){
                $html .='<li class="tree-view closed"><a class="tree-name">'.$arr->name.'</a>';
                $html.= $this->childView($arr);
            }else{
                $html .='<li class="tree-view"><a class="tree-name">'.$arr->name.'</a>';
                $html .="</li>";
            }

        }

        $html .="</ul>";
        return $html;
    }
}