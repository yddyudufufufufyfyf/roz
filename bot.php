<?php
date_default_timezone_set("Asia/Baghdad");
error_reporting(0);
require("conf.php"); 
if (!file_exists("token")) {
$token =  readline("Enter Token => ");
file_put_contents("token", $token);
}
if (!file_exists("ID")) {
$id = readline("Enter iD => ");
file_put_contents("ID", $id);
}
$sudo = file_get_contents('837914662');
$token = file_get_contents('6210625880:AAH7OZ5-SfvVWIIDj_NKO6FHXEoKEnbIBQA');
define('API_KEY',$token);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res,true);
}
}
$lastupdid = 1; 
while(true){ 
$upd = bot("getUpdates", ["offset" => $lastupdid]); 
if(isset($upd['result'][0])){ 
$text = $upd['result'][0]['message']['text']; 
$chat_id = $upd['result'][0]['message']['chat']['id']; 
$from_id = $upd['result'][0]['message']['from']['id']; 
$message = $upd['result'][0]['message']; 


if($text and $from_id !=$sudo){
bot('sendmessage',['chat_id' => $from_id ,'text'=>"Bot Spam #1 In Telegram ✈️", 
'inline_keyboard'=>true,
'reply_markup' => json_encode(['inline_keyboard' => [
[['text' => "❲ To Activate New Bot ❳'", 'url' => "https://t.me/PvPPPP"]],
]]) 
]);
} 

if($from_id == $sudo){
if($text == '/start' or $text == '~ BaCk >'){
bot('sendmessage',['chat_id' => file_get_contents("ID"),'text'=>"ThE SpAm #1 Bot 🏴\n By @Sero_Bots - @PvPPPP ", 
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[

          [['text'=>'~ تعين يوزر الكروب ~']],
          [['text'=>'~ تعيين الكليشه ~']],
          [['text'=>'~ اضافه حساب ~']], 
          [['text'=>'~ تغير اسم الحسابات ~'],['text'=>'~ تعير بايو الحسابات ~']], 
          [['text'=>'~ تعيين السليب ~']], 
          [['text'=>'< StoP'],['text'=>'Run >']],
          [['text'=>'~ اعادة تشغيل البوت ~']], 
      ] 
  ]),'resize_keyboard'=>true
]);
}
 
if($text == "~ تعين يوزر الكروب ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ ارسل يوزر الكروب الان
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('username','ok');
}
$Ex = str_replace("@","",$text);
if(file_get_contents("username") == "ok"){
if($text and $text !="~ تعين يوزر الكروب ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ تم حفظ اليوزر بنجاح
- @$Ex
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('username',$Ex);
}
}


if($text == "~ تغير اسم الحسابات ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ ارسل اسم الحسابات الجديد الان
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('nameM','ok');
file_put_contents('bioM',null);
}

if(file_get_contents("nameM") == "ok"){
if($text and $text !="~ تغير اسم الحسابات ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ تم حفظ اسم الحسابات بنجاح
- $text
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('namee',$text);
file_put_contents('nameM',null);
shell_exec("pm2 stop changer.php");
shell_exec("pm2 start changer.php");
}
}

if($text == "~ تعير بايو الحسابات ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ ارسل اسم الحسابات الجديد الان
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('bioM','ok');
file_put_contents('nameM',null);
}

if(file_get_contents("bioM") == "ok"){
if($text and $text !="~ تعير بايو الحسابات ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ تم حفظ بايو الحسابات بنجاح
- $text
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('bio',$text);
file_put_contents('bioM',null);
shell_exec("pm2 stop changer.php");
shell_exec("pm2 start changer.php");
}
}

if($text == "~ تعيين الكليشه ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ ارسل كليشه السبام الان
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('spamm','ok');
}

if($text == "~ اعادة تشغيل البوت ~"){
	shell_exec("pm2 stop SpaMer.php"); 
	shell_exec("pm2 stop changer.php"); 
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ تمت اعادة لتشغيل بنجاح
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
}

if(file_get_contents("spamm") == "ok"){
if($text and $text !="~ تعيين الكليشه ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ تم حفظ الكليشه بنجاح
- $text
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('spamm',null);
file_put_contents('spam',$text);
}
}


if($text == "~ تعيين السليب ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ ارسل الان السليب 👤
مثلا (1)
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('time','ok');
}
if(file_get_contents("time") == "ok"){
if($text and $text !="~ تعيين السليب ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ تم حفظ السليب بنجاح ✅
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('time',$text);
}
}
if($text == "~ اضافه حساب ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ ارسل رقم عدد الحساب مثلا 1
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents('name','ok');
}
if(file_get_contents("name") == "ok"){
if($text and $text !="~ اضافه حساب ~"){
if (file_exists("accounts")) {
file_put_contents("accounts", trim("\n$text",""),FILE_APPEND);
}
}
}
if(file_get_contents("name") == "ok"){
if($text and $text !="~ اضافه حساب ~"){
if (!file_exists("accounts")) {
file_put_contents("accounts",$text);
}
}
}
if(file_get_contents("name") == "ok"){
if($text and $text !="~ اضافه حساب ~"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ تم الحفظ ارسل رقمك الان ✔️
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
file_put_contents("name",$text);
file_put_contents("step","2");
system('php login.php');
}
}
if($text == "Run >"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ تم تشغيل السبام بنجاح
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
shell_exec("pm2 stop SpaMer.php");
shell_exec("pm2 start SpaMer.php");
file_put_contents('clicks',0);
}
if($text == "< StoP"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
~ تم توقيف السبام بنجاح 
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'~ BaCk >']],
      ] 
  ]),'resize_keyboard'=>true
]);
shell_exec("pm2 stop SpaMer.php");
}


}
$lastupdid = $upd['result'][0]['update_id'] + 1; 
}
}
