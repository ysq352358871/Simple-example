/*
 * obj 形参接受一个对象 object[{}];
 * url 请求地址 [string];
 * type 发送数据的方式：string[gte||post];
 * data 传递的数据 string[aa=bb] {aa:"bb"}
 * asynch 是否异步：true or false
 * dataType string[text||json||document||xml]
 * success  获取传输成功  fn;
 * error   获取传输失败 fn;
 **/
function ajax(obj){
	if(typeof(obj)!=="object"){
		console.error("输入参数格式不正确");
		return;
	}
	if(obj.url==undefined){
		console.error("请输入请求地址");
		return;
	}
	var url=obj.url;
	var type=obj.type||"get";
	var data=obj.data||"";
	var asynch=obj.asynch==undefined?true:obj.asynch;
	var dataType=obj.dataType||"text";
	var success=obj.success;
	var error = obj.error;
	if(typeof(data)=="object"){
		var str="";
		for(var i in data){
			str+=i+"="+data[i]+"&";
		}
		data=str.slice(0,-1);
	}
	var ajax=window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
	if(type=="get"){
		ajax.open(type,url+"?"+data,asynch);
		ajax.responseType=dataType;
		ajax.send(null);
	}else if(type=="post"){
		ajax.open(type,url,asynch);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.responseType=dataType;
		ajax.send(data)	
	}
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			if(ajax.status==200){
				if(dataType=="xml"){
					var result=ajax.responseXML;
				}else{
					var result=ajax.response;
				}
				success(result);
			}else if(ajax.status==404){
				var info="找不到页面";
				error(info);
			}else{
				var info="打开错误";
				error(info);
			}
		}
	}
}
