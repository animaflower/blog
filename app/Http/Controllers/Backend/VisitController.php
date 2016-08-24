<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class VisitController extends Controller
{
    public function index(){
        $visit_record=\App\Models\visit_count::select(DB::raw('ip,created_at,count(ip) count'))->groupby('ip')->orderBy('created_at', 'desc')->get();
        $visit_record=$this->ip_to_location($visit_record->all());
        return view('backend.visit.index',compact('visit_record'));
    }

    //ip数组转换带地址数组
    protected function ip_to_location($ip_arr){
        while(list($k,$v)=each($ip_arr)){
            $ip_arr[$k]->location=$this->GetIpLookup($v['ip']);
        }
        return $ip_arr;
    }

    //根据ip获取地址
    protected function GetIpLookup($ip = ''){
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
        if(empty($res)){ return false; }
        $jsonMatches = array();
        preg_match('#\{.+?\}#', $res, $jsonMatches);
        if(!isset($jsonMatches[0])){ return false; }
        $json = json_decode($jsonMatches[0], true);
        if(isset($json['ret']) && $json['ret'] == 1){
            $json['ip'] = $ip;
            unset($json['ret']);
        }else{
            return false;
        }
        return $json["country"].$json['province'].$json['city'].$json['district'];
    }


}
