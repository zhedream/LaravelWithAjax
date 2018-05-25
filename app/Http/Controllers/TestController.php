<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    function hello(Request $req){

        // 情景1 : laravel 返回 一般数据

        // return json_encode('Ajax通信成功'); // 取消注释 试一试
        // return ('Ajax通信成功');  // 取消注释 试一试

        // 情景2 : 执行逻辑代码   and  laravel 返回 复杂数据

            // 接受数据 处理逻辑代码   或如 数据库的 增删改查

            $name = $req->name;
            $msg = '你好啊!'.$name;

            // 返回数据      返回的数据 由逻辑代码 决定 。 关键是 前端执行Ajax 后  /需要什么结果答案  就返回什么
        return [
            'errno'=>1,
            'errmsg'=>$msg,
            'errmsg2'=>date('Y-m-d H:i:s'),
            'errmsg3'=>'Ajax通信成功',
        ];

         // laravel 中的 return 会把 php 的 复杂数据 转成 json 返回，  但是 普通字符串 直接返回

        // 总之： 返回到 前端的 数据都是 json 的 就对了
    }
    
    function showlight(){

        $data = Test::get();
        return view('test.light',['lights'=>$data]);
    }

    function changelight(Request $req){

        $id = $req->id;

        $light = Test::where('id',$id)->first();

            // 如果灯 是 1 
        if($light->switch){
                // 把灯 该为 0
            $light->switch=0;
            $light->save();

            return [
                'errno'=>$id,
                'errmsg'=>0,
            ];

        }
        //  反之  把灯 改为 1
        $light->switch=1;
        $light->save();

        // 返回 灯 的 id  和 状态
        return [
            'errno'=>$id,
            'errmsg'=>1,
        ];

    }


    function addlight(){




    }

}
