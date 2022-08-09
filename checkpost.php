<?php
/*
Chuyển đổi các chuỗi đặc biệt như：checkpost($username);
*/
function check_post($var_name){
     $var_name = urldecode($var_name);
     //$var_name = str_replace("_", "\_", $var_name);    // lọc ra '_'
     $var_name = str_replace("%", "\%", $var_name);    // lọc ra '%'
     $var_name = str_replace("union", " ", $var_name);
     $var_name = str_replace("load_file", " ", $var_name);
     $var_name = str_replace("'", "\'", $var_name);
     $var_name = str_replace("unlink", " ", $var_name);
     $var_name = str_replace("sleep", " ", $var_name);
	 $var_name = str_replace("current_user", " ", $var_name);
	 $var_name = str_replace("database", " ", $var_name);
	 $var_name = str_replace("session_user", " ", $var_name);
	 $var_name = str_replace("create", " ", $var_name);
	 $var_name = str_replace("drop", " ", $var_name);
	 $var_name = str_replace("truncate", " ", $var_name);
	 $var_name = str_replace("rename", " ", $var_name);
	 $var_name = str_replace("exec", " ", $var_name);
	 $var_name = str_replace("desc", " ", $var_name);
	 $var_name = str_replace("from", " ", $var_name);
	 $var_name = str_replace("information_schema", " ", $var_name);
	 $var_name = str_replace("dump", " ", $var_name);
	 $var_name = str_replace("select", " ", $var_name);
	 $var_name = str_replace("regxp", " ", $var_name);
	 $var_name = str_replace("like", " ", $var_name);
	 $var_name = str_replace("update", " ", $var_name);
	 $var_name = str_replace("delete", " ", $var_name);
	 $var_name = str_replace("\"", " ", $var_name);
	 $var_name = str_replace("where", " ", $var_name);

     if (!get_magic_quotes_gpc()) {
	   return (addslashes($var_name)); //đã chuyển đổi
     }else{
	   return ($var_name);
     }
 }
/*************************
Xác định xem biến $_GET đã truyền có chứa các ký tự không hợp lệ hay không
**************************/
$ArrChar=array("'",";","union","and","insert","delete","drop","char","select","from","update","unlink","load_file","script");
$GoUrl="";
function FunStringExist($StrFiltrate,$ArrChar){
   foreach ($ArrChar as $key=>$value){
       if (eregi($value,$StrFiltrate)){
          return true;
       }
   }
   return false;
}


if(function_exists(array_merge)){
	$ArrGet=array_merge($HTTP_GET_VARS);
}else{
    foreach($HTTP_GET_VARS as $key=>$value){
        $ArrGet[]=$value;
    }
}
?>
