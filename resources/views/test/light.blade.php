<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>灯泡的开与关</title>
</head>
<body>
<style>
    .light{
        width: 100px;
        height: 100px;
    }


    .on{

        background-color: skyblue;
    }

</style>
@foreach($lights as $light)
<div class="light @if($light->switch)on @endif" id="light{{$light->id}}" onclick="change({{$light->id}})" >我是一个假的灯泡{{$light->id}}</div>
@endforeach()

<script src="/js/jquery-3.2.1.min.js"></script>

<script>

function change(id){

$.ajax({
	url : "{{Route('change')}}",
	type : 'get',
	dataType: "json",
	data : {id:id},
	success : function(data){
        console.log(data);
        
        //  以下代码  就是 无刷新 通过 JS  更新页面 , 如果 没有 这段代码  就需要 刷新重新显示
            $('#light'+data.errno).toggleClass('on');

            return;
            if(data.ermsg==1){
                $('#light'+data.errno).addClass('on');
            }else{
                $('#light'+data.errno).removeClass('on');
            }


	},error:function(data){
		console.log(data);
		alert('格式错误');
	}
});

}


// 点击 Ajax 增加 灯泡  
function addlight(){

$.ajax({
	url : "",
	type : 'get',
	dataType: "json",
	data : {id:id},
	success : function(data){
        console.log(data);
	},error:function(data){
		console.log(data);
		alert('格式错误');
	}
});


}
// 点击 ajax 删除 一个灯泡
function delelight(){

$.ajax({
	url : "",
	type : 'get',
	dataType: "json",
	data : {id:id},
	success : function(data){
        console.log(data);
	},error:function(data){
		console.log(data);
		alert('格式错误');
	}
});


}








</script>

    
</body>
</html>