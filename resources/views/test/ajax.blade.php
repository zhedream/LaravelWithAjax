<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<style>
    #err{
        width: 100px;
        height: 50px;
        border:1px solid red;
    }
    #err2{
        width: 100px;
        height: 50px;
        border:1px solid red;
    }
    #err3{
        width: 100px;
        height: 50px;
        border:1px solid red;
    }
</style>

    <input id="btn" type="button" value="提交">
    <input type="text" name="name" >
    <div id="err"></div>
    <div id="err2"></div>
    <div id="err3"></div>


<script src="/js/jquery-3.2.1.min.js"></script>
<script>


$('#btn').click(function(){


    ajax_hello();

})

function ajax_hello(){

var myname = $('input[name=name]').val();
$.ajax({
	url : "{{Route('hello')}}", // 请求的 地址 ->  该地址 指向 路由的  XX 控制器 的  XX 方法
	type : 'get', //  请求的 方式
    dataType: "json",  // 约定 Ajax 接受的格式,  就可以转成 js 对象
    /* 
        设置Ajax接受的数据 格式：(服务器响应 的数据都是字符串),   但如果不是 json格式 ，js  是不能处理的 成 js 的数据类型(js的 对象/数组 等等) 。只能由浏览器解析显示。
        相对应的  浏览器 能解析 简单 js 数据类型  字符串/整数 ,  但是 复杂数据类型 就不能显示 如 对象 数组
    */
	data : {name:myname}, //传递 到 服务器 的 数据   ， 由 JS  取得 需要 传递的内容  如  input 的 value  并 以 键值对  传到 服务器
	success : function(data){
        // 服务器 成功 相应 执行 函数
        console.log(data);
        $('#err').html(data);
        $('#err2').html(data.errmsg);
        alert(data);
        alert(data.errmsg);

        /* 

            ajax  就是 实现 前端 后端 的 数据 交互

            前端 吧 名字 传到 后端 

            后端 接受 到 名字 回复  你好啊！+ 名字 返回

            到此 Ajax 就算完成了


            总结使用:  Ajax  1. 把 js 获取数据 2. 传到后端 3.后端处理 4. 返回结果 json 格式数据  5.前端 js  根据json数据 做相应的事 (第五步就是无刷新更新页面)

        
        */
	},error:function(data){


		console.log(data); // responseText
        alert('数据格式错误(不是约定的Json) 或 服务器响应错误');

        /* 
            总结 如果代码 执行 error 函数   首先 检查 返回的数据,  
            查看 data.responseText
        
        */

        
	}
});

}




</script>
</body>
</html>