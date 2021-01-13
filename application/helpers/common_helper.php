<?php
function url_tam($url=''){
    return 'https://f5c.vn/upload/public/'.$url;
}
function url_sosanh($url='',$id){
    return base_url('so-sanh-'.$url.'/'.$id.'.html');
}
function public_url($url=''){
    return base_url('public/'.$url);
}
function home_url($url=''){
    return base_url($url);
}
function catnews_url($slug,$id){
    return base_url('bai-viet-'.$slug.'/cn'.$id.'.html');
}
function news_url($slug,$id){
    return base_url('tin-tuc/'.$slug.'/i'.$id.'.html');
}
function category_url($slug){
    return base_url($slug);
}
function product_url($slug,$id){
    return base_url($slug.'-p'.$id.'.html');
}
function image_url($data){
    return base_url('uploads/'.$data);
}
function manufac_url($slug,$id,$catid){
  return base_url($slug.'-m'.$id.'-'.$catid.'.html');
}

function pre($param=''){
    echo "<pre>";
    print_r($param);
    echo "</pre>";
}
function discount($price,$discount){
    return $price - ($price*$discount) / 100;
}
function format_date($date=''){
    return date_format(new DateTime($date),'d/m/Y');
}
function date_to_int($tr)
{
    if (preg_match('/^\s*(\d\d?)[^\w](\d\d?)[^\w](\d{1,4}\s*$)/', $tr, $match))
    {
        $tr = $match[2] . '/' . $match[1] . '/' . $match[3];
    }
    $time=strtotime($tr);
    return $time;
}
function phantram($a,$b){
    return round(($a-$b) / $b * 100, 0, PHP_ROUND_HALF_UP); 
}
function cong($a,$b){
  return $a+$b;
}
function tru($a,$b){
    return $a-$b;
}
//xóa ký tự đặc biệt trong link
function convert_vi_to_en($str) {
   $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
   $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
   $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
   $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
   $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
   $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
   $str = preg_replace("/(đ)/", 'd', $str);
   $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
   $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
   $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
   $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
   $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
   $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
   $str = preg_replace("/(Đ)/", 'D', $str);
 //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
 //convert korea to en
   $str = str_replace("ㄱ",'k',$str);
   $str = str_replace("ㅋ",'kh',$str);
   $str = str_replace("ㄲ",'kk',$str);
   $str = str_replace("ㅌ",'th',$str);
   $str = str_replace("ㄸ",'tt',$str);
   $str = str_replace("ㅂ",'p',$str);
   $str = str_replace("ㅍ",'ph',$str);
   $str = str_replace("ㅃ",'pp',$str);
   $str = str_replace("ㅈ",'c',$str);
   $str = str_replace("ㅊ",'ch',$str);
   $str = str_replace("ㅉ",'cc',$str);
   $str = str_replace("ㅅ",'s',$str);
   $str = str_replace("ㅆ",'ss',$str);
   $str = str_replace("ㅎ",'h',$str);
   $str = str_replace("ㅇ",'ng',$str);
   $str = str_replace("ㄴ",'n',$str);
   $str = str_replace("ㄹ",'l',$str);
   $str = str_replace("ㅁ",'m',$str);
   $str = str_replace("ㅏ",'a',$str);
   $str = str_replace("ㅓ",'e',$str);
   $str = str_replace("ㅗ",'o',$str);
   $str = str_replace("ㅜ",'wu',$str);
   $str = str_replace("ㅡ",'u',$str);
   $str = str_replace("ㅣ",'i',$str);
   $str = str_replace("ㅐ",'ay',$str);
   $str = str_replace("ㅔ",'ey',$str);
   $str = str_replace("ㅚ",'oi',$str);
   $str = str_replace("ㅘ",'wa',$str);
   $str = str_replace("ㅝ",'we',$str);
   $str = str_replace("ㅟ",'wi',$str);
   $str = str_replace("ㅙ",'way',$str);
   $str = str_replace("ㅞ",'wey',$str);
   $str = str_replace("ㅢ",'uy',$str);
   $str = str_replace("ㅑ",'ya',$str);
   $str = str_replace("ㅕ",'ye',$str);
   $str = str_replace("ㅛ",'oy',$str);
   $str = str_replace("ㅠ",'yu',$str);
   $str = str_replace("ㅒ",'yay',$str);
   $str = str_replace("ㅖ",'yey',$str);
   return $str;
}
function convert_upper_to_lower($str){
    return strtolower($str);
}
function replace($str){
    return ereg_replace('[[:space:]]+', '-', trim($str));
}
function slug($str){
  return preg_replace('/[^a-zA-Z0-9\-_]/','',url_title(convert_upper_to_lower(convert_vi_to_en($str))));
}
function slug2($str){
  return preg_replace('/[^a-zA-Z0-9\-,_]/','',replace(convert_upper_to_lower(convert_vi_to_en($str))));
}
function tags($url,$class,$string){
    $name = (explode(",",$string));
    $total = count($name);
    $html="";
    for($i=0;$i<$total;$i++){
     $slug = slug($name[$i]);
     $html.="<a class='$class' href='".$url."tags/".$slug."/' title='".$name[$i]."' itemprop='keywords'> <span>".$name[$i]."</span></a>";
 }
 return $html;
}
function sub($str,$num){
   return mb_substr(strip_tags($str), 0, $num);
}
function catchuoi($str,$num){
   return mb_strimwidth($str, 0, $num, '...');
}
function nhan($a,$b){
  return $a*$b;
}
function rebuild_date( $format, $time = 0 )
{
    if ( ! $time ) $time = time();
    $lang = array();
    $lang['sun'] = 'CN';
    $lang['mon'] = 'T2';
    $lang['tue'] = 'T3';
    $lang['wed'] = 'T4';
    $lang['thu'] = 'T5';
    $lang['fri'] = 'T6';
    $lang['sat'] = 'T7';
    $lang['sunday'] = 'Chủ nhật';
    $lang['monday'] = 'Thứ hai';
    $lang['tuesday'] = 'Thứ ba';
    $lang['wednesday'] = 'Thứ tư';
    $lang['thursday'] = 'Thứ năm';
    $lang['friday'] = 'Thứ sáu';
    $lang['saturday'] = 'Thứ bảy';
    $lang['january'] = 'Tháng Một';
    $lang['february'] = 'Tháng Hai';
    $lang['march'] = 'Tháng Ba';
    $lang['april'] = 'Tháng Tư';
    $lang['may'] = 'Tháng Năm';
    $lang['june'] = 'Tháng Sáu';
    $lang['july'] = 'Tháng Bảy';
    $lang['august'] = 'Tháng Tám';
    $lang['september'] = 'Tháng Chín';
    $lang['october'] = 'Tháng Mười';
    $lang['november'] = 'Tháng M. một';
    $lang['december'] = 'Tháng M. hai';
    $lang['jan'] = 'T01';
    $lang['feb'] = 'T02';
    $lang['mar'] = 'T03';
    $lang['apr'] = 'T04';
    $lang['may2'] = 'T05';
    $lang['jun'] = 'T06';
    $lang['jul'] = 'T07';
    $lang['aug'] = 'T08';
    $lang['sep'] = 'T09';
    $lang['oct'] = 'T10';
    $lang['nov'] = 'T11';
    $lang['dec'] = 'T12';
    $format = str_replace( "r", "D, d M Y H:i:s O", $format );
    $format = str_replace( array( "D", "M" ), array( "[D]", "[M]" ), $format );
    $return = date( $format, $time );
    $replaces = array(
        '/\[Sun\](\W|$)/' => $lang['sun'] . "$1",
        '/\[Mon\](\W|$)/' => $lang['mon'] . "$1",
        '/\[Tue\](\W|$)/' => $lang['tue'] . "$1",
        '/\[Wed\](\W|$)/' => $lang['wed'] . "$1",
        '/\[Thu\](\W|$)/' => $lang['thu'] . "$1",
        '/\[Fri\](\W|$)/' => $lang['fri'] . "$1",
        '/\[Sat\](\W|$)/' => $lang['sat'] . "$1",
        '/\[Jan\](\W|$)/' => $lang['jan'] . "$1",
        '/\[Feb\](\W|$)/' => $lang['feb'] . "$1",
        '/\[Mar\](\W|$)/' => $lang['mar'] . "$1",
        '/\[Apr\](\W|$)/' => $lang['apr'] . "$1",
        '/\[May\](\W|$)/' => $lang['may2'] . "$1",
        '/\[Jun\](\W|$)/' => $lang['jun'] . "$1",
        '/\[Jul\](\W|$)/' => $lang['jul'] . "$1",
        '/\[Aug\](\W|$)/' => $lang['aug'] . "$1",
        '/\[Sep\](\W|$)/' => $lang['sep'] . "$1",
        '/\[Oct\](\W|$)/' => $lang['oct'] . "$1",
        '/\[Nov\](\W|$)/' => $lang['nov'] . "$1",
        '/\[Dec\](\W|$)/' => $lang['dec'] . "$1",
        '/Sunday(\W|$)/' => $lang['sunday'] . "$1",
        '/Monday(\W|$)/' => $lang['monday'] . "$1",
        '/Tuesday(\W|$)/' => $lang['tuesday'] . "$1",
        '/Wednesday(\W|$)/' => $lang['wednesday'] . "$1",
        '/Thursday(\W|$)/' => $lang['thursday'] . "$1",
        '/Friday(\W|$)/' => $lang['friday'] . "$1",
        '/Saturday(\W|$)/' => $lang['saturday'] . "$1",
        '/January(\W|$)/' => $lang['january'] . "$1",
        '/February(\W|$)/' => $lang['february'] . "$1",
        '/March(\W|$)/' => $lang['march'] . "$1",
        '/April(\W|$)/' => $lang['april'] . "$1",
        '/May(\W|$)/' => $lang['may'] . "$1",
        '/June(\W|$)/' => $lang['june'] . "$1",
        '/July(\W|$)/' => $lang['july'] . "$1",
        '/August(\W|$)/' => $lang['august'] . "$1",
        '/September(\W|$)/' => $lang['september'] . "$1",
        '/October(\W|$)/' => $lang['october'] . "$1",
        '/November(\W|$)/' => $lang['november'] . "$1",
        '/December(\W|$)/' => $lang['december'] . "$1" );
    return preg_replace( array_keys( $replaces ), array_values( $replaces ), $return );
}
function online()
{
    $rip = $_SERVER['REMOTE_ADDR'];
    $sd = time();
    $count = 1;
    $maxu = 1;
    $file1 = "counter/online.log";
    $lines = file($file1);
    $line2 = "";
    foreach ($lines as $line_num => $line)
    {
        if($line_num == 0)
        {
            $maxu = $line;
        }
        else
        {
            $fp = strpos($line,'****');
            $nam = substr($line,0,$fp);
            $sp = strpos($line,'++++');
            $val = substr($line,$fp+4,$sp-($fp+4));
            $diff = $sd-$val;
            if($diff < 300 && $nam != $rip)
            {
                $count = $count+1;
                $line2 = $line2.$line;
            }
        }
    }
    $my = $rip."****".$sd."++++\n";
    if($count > $maxu)
        $maxu = $count;
    $open1 = fopen($file1, "w");
    fwrite($open1,"$maxu\n");
    fwrite($open1,"$line2");
    fwrite($open1,"$my");
    fclose($open1);
    $count=$count;
    $maxu=$maxu+200;
    return $count;
}
///////////////////////
$found = 0;
$ip = $_SERVER['REMOTE_ADDR'];
$file_ip = fopen('counter/ip.txt', 'rb');
while (!feof($file_ip)) $line[]=fgets($file_ip,1024);
for ($i=0; $i<(count($line)); $i++) {
    list($ip_x) = explode("\n",$line[$i]);
    if ($ip == $ip_x) {$found = 1;}
}
fclose($file_ip);
if (!($found==1)) {
    $file_ip2 = fopen('counter/ip.txt', 'ab');
    $line = "$ip\n";
    fwrite($file_ip2, $line, strlen($line));
    $file_count = fopen('counter/count.txt', 'rb');
    $data = '';
    while (!feof($file_count)) $data .= fread($file_count, 4096);
    fclose($file_count);
    list($today, $yesterday, $total, $date, $days) = explode("%", $data);
    if ($date == date("Y m d")) $today++;
    else {
        $yesterday = $today;
        $today = 1;
        $days++;
        $date = date("Y m d");
    }
    $total++;
    $line = "$today%$yesterday%$total%$date%$days";
    $file_count2 = fopen('counter/count.txt', 'wb');
    fwrite($file_count2, $line, strlen($line));
    fclose($file_count2);
    fclose($file_ip2);
}
function today()
{
    $file_count = fopen('counter/count.txt', 'rb');
    $data = '';
    while (!feof($file_count)) $data .= fread($file_count, 4096);
    fclose($file_count);
    list($today, $yesterday, $total, $date, $days) = explode("%", $data);
    return $today;
}
function yesterday()
{
    $file_count = fopen('counter/count.txt', 'rb');
    $data = '';
    while (!feof($file_count)) $data .= fread($file_count, 4096);
    fclose($file_count);
    list($today, $yesterday, $total, $date, $days) = explode("%", $data);
    return $yesterday;
}
function totalview()
{
        //tổng truy cập
    $file_count = fopen('counter/count.txt', 'rb');
    $data = '';
    while (!feof($file_count)) $data .= fread($file_count, 4096);
    fclose($file_count);
    list($today, $yesterday, $total, $date, $days) = explode("%", $data);
    echo $total;
}
function avg()
{
        //truy cập trung bình
    $file_count = fopen('counter/count.txt', 'rb');
    $data = '';
    while (!feof($file_count)) $data .= fread($file_count, 4096);
    fclose($file_count);
    list($today, $yesterday, $total, $date, $days) = explode("%", $data);
    echo ceil($total/$days);
} 