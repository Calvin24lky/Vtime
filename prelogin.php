<?php
 //    $imgurl = 'http://gd.izyz.org/captcha/captchaImage/';
 //    $loginurl = 'http://gd.izyz.org/site/userLogin/login.do';

	// $id = '493748267@qq.com';
 //    $pwd = md5('lky86316337');

	$cookie_file = dirname(__FILE__).'\cookie.txt';

    //getCookie($cookie_file);
    showAuthcode($cookie_file);

 //    echo "<br>验证码取出完成，正在休眠，20秒内请把验证码填入code.txt并保存<br>";
	// sleep(10);//休眠
 //    echo "休眠完成，开始取验证码...<br>";
	// sleep(10);
	// $code = file_get_contents('code.txt');
	// echo "验证码成功取出：$code<br>";
	// echo "正在准备模拟登录...<br>";
	// $post = array('userName' => $id, 
 //    'password' => $pwd,
 //    'captchaCode' => $code);

    //login_post($post,$cookie_file);

	//unlink(dirname(__FILE__)."/log/verifyCode.jpg");//删除验证码文件

	function showAuthcode($ck){
		$imgurl = 'http://www.gdzyz.cn/captcha/captchaImage/createImge';
	    $hander = curl_init();
	    $fp = fopen('curl.jpeg','wb');
	    curl_setopt($hander,CURLOPT_URL,$imgurl);
	    curl_setopt($hander,CURLOPT_FILE,$fp);
	    curl_setopt($hander,CURLOPT_HEADER,0);
	    curl_setopt($hander,CURLOPT_REFERER,'http://www.gdzyz.cn/site/userLogin/preLogin');
	    curl_setopt($hander,CURLOPT_COOKIEJAR, $ck);
		curl_exec($hander);
	    curl_close($hander);
	    fclose($fp);
	    // $code = file_get_contents($ck);
	    // echo $code;
	    return  true;
	}

	// function getCookie($ck){
	//     $ch = curl_init();
	//     //$preloginurl = "http://www.gdzyz.cn/site/userLogin/preLogin";  //登陆页URL
	//     $preloginurl = "http://gd.izyz.org/site/userLogin/login.do";
	//     curl_setopt($ch, CURLOPT_URL, $preloginurl);
	//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//     curl_setopt($ch, CURLOPT_HEADER, 0);
	//     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	//     curl_setopt($ch, CURLOPT_COOKIEJAR, $ck);
	//     curl_exec($ch);
	//     curl_close($ch);
	//     $code = file_get_contents($ck);
 //    	echo $code;
 //    	echo 'gg';
 //    	//return  true;
	    
	// }

	// function login_post($data,$ck) { 
	//     $curl = curl_init();//初始化curl模块 
	//     //$cookie_file = dirname(__FILE__).'/cookie.txt';
	//     $code = file_get_contents($ck);
	//     echo $code;
	//     curl_setopt($curl, CURLOPT_URL, 'http://www.gdzyz.cn/site/userLogin/login.do');//登录提交的地址 
	//     curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息 
	//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//是否自动显示返回的信息 
	//     curl_setopt($curl, CURLOPT_POST, 1);//post方式提交 
	//     //curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36");
	// 	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));//要提交的信息 
	//     curl_setopt($curl, CURLOPT_COOKIEFILE, $ck); //设置Cookie信息保存在指定的文件中 
	//     $code = file_get_contents($ck);
	//     echo $code;
	//     echo '<br>';
	//     $result = curl_exec($curl);//执行cURL 
	//     if(curl_error($curl)){
	// 	echo '[Curl error] ' . curl_error($urlobj);}
	//     curl_close($curl);//关闭cURL资源，并且释放系统资源 

	//     $ch = curl_init();
	// 	//curl_setopt($ch, CURLOPT_URL, "http://www.gdzyz.cn/index");
	// 	curl_setopt($ch, CURLOPT_URL, "http://www.gdzyz.cn/usmain/usMain/list");
	// 	curl_setopt($ch, CURLOPT_HEADER, 0);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER,0);        
	// 	curl_setopt($ch, CURLOPT_COOKIEFILE, $ck);
	// 	$html=curl_exec($ch);
	// 	echo $html;
	// 	curl_close($ch);
	// } 

?>