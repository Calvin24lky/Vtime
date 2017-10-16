<?php
    $id = $_POST["id"];
    $pwd = md5($_POST["pwd"]);
    $yzm = $_POST["yzm"];
    $status = 0;
    $data2js = array("id"=>$id,"pwd"=>$pwd,"yzm"=>$yzm);

    $post = array('userName' => $id, 
    'password' => $pwd,
    'captchaCode' => $yzm);

    $cookie_file = dirname(__FILE__).'\cookie.txt';

    $status = login_post($post,$cookie_file);
    if ($status == 302) {
    	getpage($cookie_file);
    	$data2js = array("id"=>$id,"pwd"=>$pwd,"yzm"=>$yzm,"status"=>$status);
    	echo json_encode($data2js);
    }else{
    	//$status = 0;
    	$data2js = array("id"=>$id,"pwd"=>$pwd,"yzm"=>$yzm,"status"=>$status);
    	echo json_encode($data2js);
    }



    function login_post($data,$ck) { 
        $curl = curl_init();//初始化curl模块 
        curl_setopt($curl, CURLOPT_URL, 'http://www.gdzyz.cn/site/userLogin/login.do');//登录提交的地址 
        curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);//是否自动显示返回的信息 
        curl_setopt($curl, CURLOPT_POST, 1);//post方式提交 
        //curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36");
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));//要提交的信息 
        curl_setopt($curl, CURLOPT_COOKIEFILE, $ck); //设置Cookie信息保存在指定的文件中 
        curl_exec($curl);//执行cURL 
        $status = curl_getinfo($curl,CURLINFO_HTTP_CODE);//返回状态码
        if(curl_error($curl)){
        echo '[Curl error] ' . curl_error($urlobj);}
        curl_close($curl);//关闭cURL资源，并且释放系统资源 
        return $status;
    } 

    function getpage($ck){
    	$ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL, "http://www.gdzyz.cn/index");//首页
        //curl_setopt($ch, CURLOPT_URL, "http://www.gdzyz.cn/usmain/usMain/list");//用户中心
        curl_setopt($ch, CURLOPT_URL, "http://www.gdzyz.cn/usmain/usMain/listServiceLog?type=missionServiceRecord&districtId=");//志愿时长页
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
        curl_setopt($ch, CURLOPT_COOKIEFILE, $ck);
        $html = curl_exec($ch);
        $fp=fopen("ehtml.txt","w");
        fwrite($fp,$html);
        fclose($fp);
        curl_close($ch);
    }

 ?>