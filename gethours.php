<?php
    // $id = $_POST["id"];
    // $pwd = $_POST["pwd"];
    // $yzm = $_POST["yzm"];
    $status = 1;
    $file_path = "ehtml.txt";
    $htmlstr = file_get_contents($file_path);
    $theme = "";
    $result = "";
    $pattern = '/<tr class=\"trbg\">(.*?)<\/tr>/is';
    $themepattern = '/content=\"(.*?)\"/si';
    if(preg_match_all($pattern, $htmlstr, $match)){

        $result["length"] = sizeof($match[1]);
        for ($i=0; $i < sizeof($match[1]); $i++) { 
            //var_dump($match[1][$i]); 
            $str = $match[1][$i];
            //活动名存在result[$i].act数组中
            // preg_match_all($themepattern, $match[1][$i], $theme);
            // $theme[1]=preg_replace("/【.*?】/si","",$theme[1]);
            // $result["theme"][$i] = $theme[1][0];

            //去掉td标签和span标签
            $str=preg_replace("/<(\/?td.*?)>/si","",$str);
            $str=preg_replace("/<(\/?span.*?)>/si","",$str);

            //将字符串按空格分隔为数组
            $arr = explode(' ',$str);
            $arr = array_filter($arr);
            //var_dump($arr);

            //将对应内容的数组字符串去掉空格后存入result
            $result["theme"][$i] = trim($arr[8]);
            $result["teamname"][$i] = trim($arr[16]);
            $result["name"][$i] = trim($arr[24]);
            $result["date"][$i] = trim($arr[32]);
            $result["acttime"][$i] = trim($arr[72]);
        }
        //var_dump($result);
        echo json_encode($result);
    }else{
    echo '0'; 
    }


    // $json_arr = array("id"=>$id,"pwd"=>$pwd,"yzm"=>$yzm,"status"=>$status);
    // echo json_encode($json_arr);
?>