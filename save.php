<?php
    $id = $_POST["id"];
    $pwd = $_POST["pwd"];
    $yzm = $_POST["yzm"];
    $status = 1;
    $json_arr = array("id"=>$id,"pwd"=>$pwd,"yzm"=>$yzm,"status"=>$status);
    echo json_encode($json_arr);
    //
//     $post = array ( 
//     'userName' => $id, 
//     'password' => $pwd, 
//     'captchaCode' => $yzm, 
// );
//     $url = 'http://www.gdzyz.cn/site/userLogin/login.do';

//     $curl = curl_init();
// 	$cookie = dirname(__FILE__) . '/cookie_izt.txt';

// 	login_post($url, $cookie, $post); 

// 	function login_post($url, $cookie, $post) { 
//     $curl = curl_init();//初始化curl模块 
//     curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址 
//     curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息 
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);//是否自动显示返回的信息 
//     curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中 
//     curl_setopt($curl, CURLOPT_POST, 1);//post方式提交 
//     curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息 
//     curl_exec($curl);//执行cURL 
//     curl_close($curl);//关闭cURL资源，并且释放系统资源 
// } 
?>