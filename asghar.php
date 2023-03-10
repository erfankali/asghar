<?php
// پوشه دیتا بسازید
date_default_timezone_set('Asia/Tehran');
$time = date('H:i:s');
error_reporting(0);
define('API_KEY','5843207036:AAH1Ulg-tpXTgYtZz89E1W4fC_7viiWTUfQ');
ini_set("log_errors","off");
//------- فانکشن
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
        return json_decode($res);
    }
}
//------ متغیر
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$textmessage = $message->text;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$ssrr = $message->reply_to_message->message_id;
$osff = $message->reply_to_message->from->username;
$osff2 = $message->from->username;

$whitelist = Mrfireee;
//- بخش ادیت --------------------####----
$bottag = "asgharghatelbot"; // ایدی ربات بدون @
$admin = "782834458"; // ایدی عددی ادمین
$channel_id = "-1001747222769"; // چنل اصلی ایدی عددی
////-----دیگر متغیر ها----------$--$-$$$$$-
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$step = $user["step"];
$tc = $update->message->chat->type;
$new_chat_member = $message->new_chat_member;
$new_chat_member_id = $new_chat_member->id;
$new_chat_member_first_name = $new_chat_member->first_name;
$new_chat_member_last_name = $new_chat_member->last_name;
$new_chat_member_username = $new_chat_member->username;
$suchi = file_get_contents("data/$chat_id/setnt.txt");
//-----دیگر فانکشن-
function sendphoto($chat_id, $photo, $captionl){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function objectToArrays( $object ) {
				if( !is_object( $object ) && !is_array( $object ) )
				{
				return $object;
				}
				if( is_object( $object ) )
				{
				$object = get_object_vars( $object );
				}
			return array_map( "objectToArrays", $object );
			}
function DeleteFolder($path){
 if($handle=opendir($path)){
  while (false!==($file=readdir($handle))){
   if($file<>"." AND $file<>".."){
    if(is_file($path.'/'.$file)){ 
     @unlink($path.'/'.$file);
    } 
    if(is_dir($path.'/'.$file)) { 
     deletefolder($path.'/'.$file); 
     @rmdir($path.'/'.$file); 
    }
   }
        }
    }
}
function sendaction($chat_id, $action){
  bot('sendchataction',[
  'chat_id'=>$chat_id,
  'action'=>$action
  ]);
  }
//بخش تایم
if($time == '00:00:01'){
$botd = [
"تایم تایم لواطه",
];
$r00 = $botd[rand(0, count($botd)-1)];
Deletefolder("data/spam");
rmdir("data/spam");
	bot('sendMessage',[
            'chat_id' =>-1001747222769,
            'text' => "$r00",
            'parse_mode'=>"HTML",
]);
}
if($time == '21:00:01'){
	bot('sendMessage',[
 'chat_id'=>-1001747222769,
'text'=>"🌚شبتون بخیر کونیا🌚",
'parse_mode'=>"HTML",
	 ]); 
	 }
	 if($time == '14:00:01'){
	bot('sendMessage',[
 'chat_id'=>-1001747222769,
'text'=>"🌞ظهر بخیر عزیزان🌞",
'parse_mode'=>"HTML",
	 ]); 
	 }
	 	 if($time == '07:00:01'){
	bot('sendMessage',[
 'chat_id'=>-1001747222769,
'text'=>"🌤پاشید برید مدرسه بدبختا🌤",
'parse_mode'=>"HTML",
	 ]); 
	 }
	 
//------
if(strpos($textmessage,"/start") !== false  && $textmessage !=="/start"){
$id=str_replace("/start ","",$textmessage);
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
if(!in_array($from_id,$exp) && $from_id != $id){
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "none";
$user["invite"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$user1 = json_decode(file_get_contents("data/$id.json"),true);
$invite = $user1["invite"];
settype($invite,"integer");
$newinvite = $invite + 1;
$user1["invite"] = $newinvite;
$outjson = json_encode($user1,true);
file_put_contents("data/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"✅ یک فرد از طریق لینک مخصوص شما به ربات پیوست !",
'parse_mode'=>"HTML",
]);						
}
}
if(strpos($textmessage,"'") !== false or strpos($textmessage,'"') !== false or strpos($textmessage,"}") !== false or strpos($textmessage,"{") !== false or strpos($textmessage,")'") !== false or strpos($textmessage,"(") !== false){
if($tc == "private" ){
$tt = time() + 9999999999999999;
file_put_contents("data/spam/$from_id.txt",$tt);
if(!in_array($chat_id,$admin)){
step($chat_id,"none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به دلیل ارسال کد مخرب به ربات، بلاک شدید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
bot('sendMessage',[
'chat_id'=>$admin[0], // متغییر ادمین
'text'=>"[▫️ این کاربر کد مخرب ارسال کرد!](tg://user?id=$from_id)",
'parse_mode'=>"MarkDown",
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما از ربات به دلیل به خطر انداختن امنیت مسدود شدید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
 ]);
 }
 }
 }
if (!file_exists("data/$from_id.json")) {
        $myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
		 $user["step"] = "none";
		 $user["invite"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
    }
	if($textmessage == "‌Hqysisha81735yav" ){
		 bot('sendMessage',[
                    'chat_id'=>$chat_id,
'text'=>"Fuck You!",
                   'parse_mode'=>"HTML",
]); 
}else{
    
    function Spam($user_id){
@mkdir("data/spam");
$spam_status = json_decode(file_get_contents("data/spam/$user_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ",null,$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 3){
$time = time() + 1000;
$spam_status = ["time $time"];
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
bot('SendMessage',[
'chat_id'=>$user_id,
'text'=>"اسپم نکن کونی 1000 ثانیه بلاکی تا ادم شی."
]);
exit(false);
}else{
$spam_status = [$spam_status[0]+1,$spam_status[1]];
}}else{
$spam_status = [1,time()+2];
}}else{
$spam_status = [1,time()+2];
}
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
}
Spam($from_id);
	if($textmessage == "/start" && $tc == "private" or $textmessage == "Back | برگشت" && $tc == "private"){
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
به ربات اصغر قاتل خوش آمدید 🤠

〽️ امیدوارم این ربات بتونه مفید باشه !
⚡️ پشتیبانی @covidmr
کانال ربات 
https://t.me/asghar_ghatel

دستورات ربات : /dast
راهنما : /help

➖➖➖➖➖➖➖➖➖➖➖
<b>• یکی از دکمه های زیر را انتخاب کنید .</b>
 ",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
    	[['text'=>"📋 دستورات ربات"],['text'=>"🍿 راهنمای ربات"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]); 
	}
	elseif($textmessage == "/help" or $textmessage == "راهنما" or $textmessage == "🍿 راهنمای ربات" ){
	sendaction($chat_id,'typing');
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"
راهنمای ربات اصغر 😄
➖➖➖➖➖➖➖➖➖➖
<code>
درود
کافیه ربات رو داخل گروهتون اد کنید و ادمینش کنید تا هوشش رو ببینید
ربات در حالت بتا هستش و بزودی اپدیتی جدید دریافت میکنه
</code>
➖➖➖➖➖➖➖➖➖➖➖
از طریق دکمه زیر ربات رو به گروهتون ببرید⇩
",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"✅ افزودن به یک گروه", 'url'=>"https://t.me/$bottag?startgroup=new"]],
              ]
        ])
	 ]); 
	 }
		elseif(strpos($textmessage,"/photo") !== false){
 $textmessage = explode(" ",$textmessage);
 $textt = $textmessage['1'];
bot('sendphoto', [
'chat_id' => $chat_id,
 'photo'=>"https://assets.imgix.net/examples/clouds.jpg?blur=150&w=500&h=500&fit=crop&txt=$textt&txtsize=100&txtclr=ff2e4357&txtalign=middle,center&txtfont=Futura%20Condensed%20Medium&mono=ff6598cc",
 'caption'=>"☝️ لوگوی شما با نام $textt ساخته شد✅",
   'reply_to_message_id'=>$message_id,
 ]);
 }

	if($textmessage == "/dast" or $textmessage == "دستورات" or $textmessage == "📋 دستورات ربات"){
	sendaction($chat_id,'typing');
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"
◾️ دستورات اصغر قاتل ◾️

 من | me
🔺 نمایش پروفایل شما 

 زمان | time
🔺 نمایش زمان دقیق بصورت فارسے

 ربات | bot
🔺  اطلاع از آنلاینی ربات

  پینگ | ping
🔺 دریافت پینگ و اطلاعات سرور

 فال | fal
🔺 دریافت فال بصورت تصویری

➖➖➖➖
 /photo name
ساخت لوگو با نام شما بجای name اسم موردنظرتونو بزارید 😄

 /Blue name
بزرگ و آبی کردن متن بجای name اسم موردنظرتونو بزارید 😄

 /Little name
کوچک کردن و زیباسازی متن، بجای name اسم موردنظرتونو بزارید 😄

 /Dayer name
برای دایره ای کردن متن ها و زیباسازی بجای name اسم موردنظرتونو بزارید😄
➖➖➖➖
قابلیت های دیگه در دست ساخته :)
😶 در وارد کردن دستورات حروف کوچک بزرگ دقت شود!
➖➖➖➖➖➖➖➖➖➖➖
از طریق دکمه زیر ربات رو به گروهتون ببرید⇩
",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"✅ افزودن به یک گروه", 'url'=>"https://t.me/$bottag?startgroup=new"]],
              ]
        ])
	 ]); 
	 }
	 	 elseif($textmessage == "شاخ" or $textmessage == "text"){
	 $sha = file_get_contents("https://unknow.1xhost.info/Api/bio/bio.php");
 if( !$sha ){ $sha = "گت هاست از سمت سرور بسه است"; }
              bot('sendMessage',[
 'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text' => "$sha",
              'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
   }
	 elseif($textmessage == "حدیث" or $textmessage == "hadith"){
	 $ha = file_get_contents("https://unknow.1xhost.info/Api/ha/hadith.php");
 if( !$ha ){ $ha = "چه گوه خوریا"; }
              bot('sendMessage',[
 'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text' => "$ha",
              'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
   }
   
	 elseif($textmessage == "فال" or $textmessage == "fal"){
$add = "http://www.beytoote.com/images/Hafez/".rand(1,149).".gif";
bot('sendphoto', [
'chat_id' => $chat_id,
'photo'=>$add,
'caption' =>"
☝️ فال حافظ برای شما گرفته شد.
 ",
  'reply_to_message_id'=>$message_id,
	 ]); 
	}
	 elseif($textmessage == "زمان" or $textmessage == "time" ){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"
⏰ $time 
",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]); 
	 }
	 
	 elseif($textmessage == "من" or $textmessage == "me"){
	 $profile = "https://telegram.me/$username";
 bot('sendphoto',[
'chat_id' => $chat_id,
'photo'=>$profile,
'caption' =>"#پروفایل_شما  :)
➖➖➖➖➖➖➖
🔹First Name : $first_name
🔹Last Name : $last_name
🔹Username : @$username
🔹id : $chat_id
➖➖➖➖➖➖➖",
  'reply_to_message_id'=>$message_id,
	 ]); 
	}
	
		 elseif($textmessage == "ping" or $textmessage == "/ping" or $textmessage == "پینگ" ){
	 $load = sys_getloadavg();
	 $mem = memory_get_usage();
	 $ver = phpversion();  
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"
• ᴘɪɴɢ : <code>$load[0]</code>
• ᴍᴇᴍ : <code>$mem KB</code>
• ᴘʜᴘ ᴠᴇʀ : <code>$ver</code>
",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]); 
	 }
	 elseif($textmessage == "bot" or $textmessage == "آنلاینی" or $textmessage == "رباتی" or $textmessage == "ربات"){
$bot = [
"گوه بخور",
"بنال",
"کیر میخوای؟",
"😶مگه مامانتم که صدام میکنی",
"مامانت خونست؟",
"هان",
"جونم",
"کیرمی"
];
$r = $bot[rand(0, count($bot)-1)];
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "$r",
'reply_to_message_id'=>$message_id,
]);
}
	 elseif($textmessage == "بای"){

	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "بچوس",
'reply_to_message_id'=>$message_id,
]);
}
	 elseif($textmessage == "تست سرعت"){

	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "سلام",
'reply_to_message_id'=>$message_id,
]);
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "من",
'reply_to_message_id'=>$message_id,
]);
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "اصغر هستم",
'reply_to_message_id'=>$message_id,
]);
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "در خدمت",
'reply_to_message_id'=>$message_id,
]);
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "توی اوبی",
'reply_to_message_id'=>$message_id,
]);
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "شوخی کردم",
'reply_to_message_id'=>$message_id,
]);
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "در خدمت شما",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"سلام") !== false){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "سلام $first_name عزیزم",
'reply_to_message_id'=>$message_id,

]);
return;
}
elseif($textmessage == "کیرمی" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "مگه کیرم داری؟💩",
'reply_to_message_id'=>$message_id,
]);
return;
}
elseif($textmessage == "کس ننت" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "برو مادرکصته",
'reply_to_message_id'=>$message_id,
]); 
return;
}
elseif(strpos($textmessage,"عمتو گاییدم")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "منم شوهر عمتو گاییدم",
'reply_to_message_id'=>$message_id,
]);
return;
}
elseif(strpos($textmessage,"کسکش")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "شغل پدرتو چرا جار میزنی🤡",
'reply_to_message_id'=>$message_id,
]);
return;
}
elseif(strpos($textmessage,"جاکش")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "شغل پدرتو جار نزن🤡",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif(strpos($textmessage,"کیرم")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => " اینهمه کیرم کیرم میکنی من میکردمت که چیزی نداشتی",
'reply_to_message_id'=>$message_id,
]);	
return;
	}
	if($textmessage == "دوقوق" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "دوقوق و کیر خر",
'reply_to_message_id'=>$message_id,
]);   
return;
}
elseif($textmessage == "دقیق" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "دقیق و کیر خر",
'reply_to_message_id'=>$message_id,
]);   
return;
}
elseif(strpos($textmessage,"بی ادب")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => " من بی ادب بودم که بابات زنده نمیموند",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif(strpos($textmessage,"کصمادر")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "معرفی نکن خودتو خوشگله پسر❤️",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif(strpos($textmessage,"کصشعر")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "کصشعر که زندگیته عزیزم",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif($textmessage == "عزیزمی" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "ولی تو کیرمم نیستی",
'reply_to_message_id'=>$message_id,
]); 
return;
}
elseif($textmessage == "لاشی" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "لاشی که باباته",
'reply_to_message_id'=>$message_id,
]);   
return;
};
if($textmessage == "بد شد" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "قیافت شد یعنی؟",
'reply_to_message_id'=>$message_id,
]);
return;
}
elseif(strpos($textmessage,"چرا")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "چون کیر من وصل کون بابا جونته",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif($textmessage == "خفه شو" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "ادم به باباش نمیگه خفه شو",
'reply_to_message_id'=>$message_id,
]); 
return;
}
elseif(strpos($textmessage,"خارکصته")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "کص خارم دهنت",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif($textmessage == "پدرت" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "پدرم؟ رو مادرت🥰",
'reply_to_message_id'=>$message_id,
]); 
return;
}
elseif(strpos($textmessage,"خر")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "در مورد بابات صحبت میکنی؟",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif(strpos($textmessage,"گوه")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "بابات یعنی؟",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif($textmessage == "ن" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "ن ن نکن حروم زاده",
'reply_to_message_id'=>$message_id,
]);
return;
}
elseif(strpos($textmessage,"مادرت")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "ناموسی نده بی همه چیز",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif($textmessage == "گمشو" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "من که تازه پیدات کردم پسر خوبم <3",
'reply_to_message_id'=>$message_id,
]);
return;
}
elseif(strpos($textmessage,"بیناموس")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "منم ربات هستم خوشوقتم🙏🌹",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif($textmessage == "ریدم" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "توالته مگه اینجا؟",
'reply_to_message_id'=>$message_id,
]); 
return;
}
elseif($textmessage == "سگ" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "بابات یعنی؟",
'reply_to_message_id'=>$message_id,
]); 
return;
}
elseif(strpos($textmessage,"حروم")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "منم ربات هستم خوشوقتم🙏🌹",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif(strpos($textmessage,"خوردم")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "کیر مارم یه دهن میزدی",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif($textmessage == "عزیز" and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "نترس نمیگم مگه جنده ای که همه برات عزیزن",
'reply_to_message_id'=>$message_id,
]);  
return;
}
elseif(strpos($textmessage,"جنده")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "خودتو معرفی نکن خوشگله پسر",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif(strpos($textmessage,"خایه مالی")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "شغل شریف پدرت",
'reply_to_message_id'=>$message_id,
]);
return;
	}
elseif(strpos($textmessage,"گایید")!== false and $osff2 !== $whitelist){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "گریه کن",
'reply_to_message_id'=>$message_id,
]);
return;
}
elseif($textmessage =="بکنش" and $osff !== Mrfireee and $osff !== asgharghatelbot) {
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "چشم",
'reply_to_message_id'=>$message_id,
]);
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "حتمی باید بگامت تا ساکت شی قرمساق",
'reply_to_message_id'=>$ssrr,
]);

$file_id = "CAACAgIAAxkBAAEccEFj0wLKOGrvFTBU-FINcQugS2ARnwAC2CgAAmRZmEpNKLDxWWWi8C0E";
$apikiri = "5843207036:AAH1Ulg-tpXTgYtZz89E1W4fC_7viiWTUfQ";
$send_sticker=file_get_contents('https://api.telegram.org/bot'.$apikiri.'/sendSticker?chat_id='.$chat_id.'&sticker='.$file_id);
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "اوف چه کونی🤩",
'reply_to_message_id'=>$ssrr,
]);
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "این از قبلیایی که کردمم بهتر بود دمت گرم",
'reply_to_message_id'=>$message_id,
]);
return;

}
elseif($textmessage and file_exists("cmd/$textmessage.txt")){
	$textcmd = file_get_contents("cmd/$textmessage.txt");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$textcmd,
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
]);
return;
}

elseif($textmessage == "بکنش" and $osff == Mrfireee){
	bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' => "باباتو که نمیشه کرد",
'reply_to_message_id'=>$message_id,
]);
return;
}
if(preg_match('/^\/([Dd]ayer) (.*)/s',$textmessage) and $tc == 'group' | $tc == 'supergroup' | $tc == 'private') {
preg_match('/^\/([Dd]ayer) (.*)/s',$textmessage,$match);
$ev1 = $match[2];
$a1 = str_replace('a','ⓐ',$ev1);
$a1 = str_replace('A','ⓐ',$a1);
$b1 = str_replace("b","ⓑ",$a1);
$b1 = str_replace("B","ⓑ",$b1);
$c1 = str_replace("c","ⓒ",$b1);
$c1 = str_replace("C","ⓒ",$c1);
$d1 = str_replace("d","ⓓ",$c1);
$d1 = str_replace("D","ⓓ",$d1);
$e1 = str_replace("e","ⓔ",$d1);
$e1 = str_replace("E","ⓔ",$e1);
$f1 = str_replace("f","ⓕ",$e1);
$f1 = str_replace("F","ⓕ",$f1);
$g1 = str_replace("g","ⓖ",$f1);
$g1 = str_replace("G","ⓖ",$g1);
$h1 = str_replace("h","ⓗ",$g1);
$h1 = str_replace("H","ⓗ",$h1);
$i1 = str_replace("i","ⓘ",$h1);
$i1 = str_replace("I","ⓘ",$i1);
$j1 = str_replace("j","ⓙ",$i1);
$j1 = str_replace("J","ⓙ",$j1);
$k1 = str_replace("k","ⓚ",$j1);
$k1 = str_replace("K","ⓚ",$k1);
$l1 = str_replace("l","ⓛ",$k1);
$l1 = str_replace("L","ⓛ",$l1);
$m1 = str_replace("m","ⓜ",$l1);
$m1 = str_replace("M","ⓜ",$m1);
$n1 = str_replace("n","ⓝ",$m1);
$n1 = str_replace("N","ⓝ",$n1);
$o1 = str_replace("o","ⓞ",$n1);
$o1 = str_replace("O","ⓞ",$o1);
$p1 = str_replace("p","ⓟ",$o1);
$p1 = str_replace("P","ⓟ",$p1);
$q1 = str_replace("q","ⓠ",$p1);
$q1 = str_replace("Q","ⓠ",$q1);
$r1 = str_replace("r","ⓡ",$q1);
$r1 = str_replace("R","ⓡ",$r1);
$s1 = str_replace("s","ⓢ",$r1);
$s1 = str_replace("S","ⓢ",$s1);
$t1 = str_replace("t","ⓣ",$s1);
$t1 = str_replace("T","ⓣ",$t1);
$u1 = str_replace("u","ⓤ",$t1);
$u1 = str_replace("U","ⓤ",$u1);
$v1 = str_replace("v","ⓥ",$u1);
$v1 = str_replace("V","ⓥ",$v1);
$w1 = str_replace("w","ⓦ",$v1);
$w1 = str_replace("W","ⓦ",$w1);
$x1 = str_replace("x","ⓧ",$w1);
$x1 = str_replace("X","ⓧ",$x1);
$y1 = str_replace("y","ⓨ",$x1);
$y1 = str_replace("Y","ⓨ",$y1);
$z1 = str_replace("z","ⓩ",$y1);
$z1 = str_replace("Z","ⓩ",$z1);
$z1 = str_replace("1","ⓩ",$z1); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$z1,
]);
}
if(preg_match('/^\/([Ll]ittle) (.*)/s',$textmessage) and $tc == 'group' | $tc == 'supergroup' | $tc == 'private') {
preg_match('/^\/([Ll]ittle) (.*)/s',$textmessage,$match);
$ev1 = $match[2];
$a1 = str_replace('a',"ᵃ",$ev1);
$a1 = str_replace('A',"ᵃ",$a1);
$b1 = str_replace("b","ᵇ",$a1);
$b1 = str_replace("B","ᵇ",$b1);
$c1 = str_replace("c","ᶜ",$b1);
$c1 = str_replace("C","ᶜ",$c1);
$d1 = str_replace("d","ᵈ",$c1);
$d1 = str_replace("D","ᵈ",$d1);
$e1 = str_replace("e","ᵉ",$d1);
$e1 = str_replace("E","ᵉ",$e1);
$f1 = str_replace("f","ᶠ",$e1);
$f1 = str_replace("F","ᶠ",$f1);
$g1 = str_replace("g","ᵍ",$f1);
$g1 = str_replace("G","ᵍ",$g1);
$h1 = str_replace("h","ʰ",$g1);
$h1 = str_replace("H","ʰ",$h1);
$i1 = str_replace("i","ᶤ",$h1);
$i1 = str_replace("I","ᶤ",$i1);
$j1 = str_replace("j","ʲ",$i1);
$j1 = str_replace("J","ʲ",$j1);
$k1 = str_replace("k","ᵏ",$j1);
$k1 = str_replace("K","ᵏ",$k1);
$l1 = str_replace("l","ˡ",$k1);
$l1 = str_replace("L","ˡ",$l1);
$m1 = str_replace("m","ᵐ",$l1);
$m1 = str_replace("M","ᵐ",$m1);
$n1 = str_replace("n","ᶰ",$m1);
$n1 = str_replace("N","ᶰ",$n1);
$o1 = str_replace("o","ᵒ",$n1);
$o1 = str_replace("O","ᵒ",$o1);
$p1 = str_replace("p","ᵖ",$o1);
$p1 = str_replace("P","ᵖ",$p1);
$q1 = str_replace("q","ᵠ",$p1);
$q1 = str_replace("Q","ᵠ",$q1);
$r1 = str_replace("r","ʳ",$q1);
$r1 = str_replace("R","ʳ",$r1);
$s1 = str_replace("s","ˢ",$r1);
$s1 = str_replace("S","ˢ",$s1);
$t1 = str_replace("t","ᵗ",$s1);
$t1 = str_replace("T","ᵗ",$t1);
$u1 = str_replace("u","ᵘ",$t1);
$u1 = str_replace("U","ᵘ",$u1);
$v1 = str_replace("v","ᵛ",$u1);
$v1 = str_replace("V","ᵛ",$v1);
$w1 = str_replace("w","ʷ",$v1);
$w1 = str_replace("W","ʷ",$w1);
$x1 = str_replace("x","ˣ",$w1);
$x1 = str_replace("X","ˣ",$x1);
$y1 = str_replace("y","ʸ",$x1);
$y1 = str_replace("Y","ʸ",$y1);
$z1 = str_replace("z","ᶻ",$y1);
$z1 = str_replace("Z","ᶻ",$z1);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$z1,
]);
}
if(preg_match('/^\/([Bb]lue) (.*)/s',$textmessage) and $tc == 'group' | $tc == 'supergroup' | $tc == 'private') {
preg_match('/^\/([Bb]lue) (.*)/s',$textmessage,$match);
$ev1 = $match[2];
$a1 = str_replace('a','•🇦',$ev1);
$a1 = str_replace('A','•🇦',$a1);
$b1 = str_replace("b","•🇧",$a1);
$b1 = str_replace("B","•🇧",$b1);
$c1 = str_replace("c","•🇨",$b1);
$c1 = str_replace("C","•🇨",$c1);
$d1 = str_replace("d","•🇩",$c1);
$d1 = str_replace("D","•🇩",$d1);
$e1 = str_replace("e","•🇪",$d1);
$e1 = str_replace("E","•🇪",$e1);
$f1 = str_replace("f","•🇫",$e1);
$f1 = str_replace("F","•🇫",$f1);
$g1 = str_replace("g","•🇬",$f1);
$g1 = str_replace("G","•🇬",$g1);
$h1 = str_replace("h","•🇭",$g1);
$h1 = str_replace("H","•🇭",$h1);
$i1 = str_replace("i","•🇮",$h1);
$i1 = str_replace("I","•🇮",$i1);
$j1 = str_replace("j","•🇯",$i1);
$j1 = str_replace("J","•🇯",$j1);
$k1 = str_replace("k","•🇰",$j1);
$k1 = str_replace("K","•🇰",$k1);
$l1 = str_replace("l","•🇱",$k1);
$l1 = str_replace("L","•🇱",$l1);
$m1 = str_replace("m","•🇲",$l1);
$m1 = str_replace("M","•🇲",$m1);
$n1 = str_replace("n","•🇳",$m1);
$n1 = str_replace("N","•🇳",$n1);
$o1 = str_replace("o","•🇴",$n1);
$o1 = str_replace("O","•🇴",$o1);
$p1 = str_replace("p","•🇵",$o1);
$p1 = str_replace("P","•🇵",$p1);
$q1 = str_replace("q","•🇶",$p1);
$q1 = str_replace("Q","•🇶",$q1);
$r1 = str_replace("r","•🇷",$q1);
$r1 = str_replace("R","•🇷",$r1);
$s1 = str_replace("s","•🇸",$r1);
$s1 = str_replace("S","•🇸",$s1);
$t1 = str_replace("t","•🇹",$s1);
$t1 = str_replace("T","•🇹",$t1);
$u1 = str_replace("u","•🇻",$t1);
$u1 = str_replace("U","•🇻",$u1);
$v1 = str_replace("v","•🇺",$u1);
$v1 = str_replace("V","•🇺",$v1);
$w1 = str_replace("w","•🇼",$v1);
$w1 = str_replace("W","•🇼",$w1);
$x1 = str_replace("x","•🇽",$w1);
$x1 = str_replace("X","•🇽",$x1);
$y1 = str_replace("y","•🇾",$x1);
$y1 = str_replace("Y","•🇾",$y1);
$z1 = str_replace("z","•🇿",$y1);
$z1 = str_replace("Z","•🇿",$z1);
$z1 = str_replace("1","•🇿",$z1); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$z1,
]);
}
	    	 //-----admin-panel-----
elseif($textmessage == "مدیریت" or $textmessage == "پنل" or $textmessage == "/panel"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	if($chat_id == $admin ){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>" به پنل مدیریت خوش آمدید🎈
✅ <code> شما آدمین شناخته شدید </code>
➖➖➖➖➖➖➖➖
💭اسم شما : $first_name
⏳ آیدی عددی شما آدمین گرامی : $chat_id می باشد !
➖➖➖➖➖➖➖➖
👇 یکی از گزینه هارا انتخاب کنید 👇",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
           'keyboard'=>[
    [['text'=>"👥آمار کلی ربات👥"],['text'=>"🍿پاکسازی اسپم"]],
    	[['text'=>"📮پیام همگانی📮"],['text'=>"📤فوروارد همگانی📤"]],
    	[['text'=>"📚بخش یادگیری"],['text'=>"Back | برگشت"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]); 
}else{
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"دنبال کصمادرتی؟",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]); 
}
}

///*-*-*-*-*-**-*-*-*-*--*-*-*-*-*---
elseif($textmessage == "🔹بازگشت به پنل"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	if($chat_id == $admin ){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📍 به منوی اصلی پنل مدیریت #برگشتید!
🔹 <code> درصورتی که نیاز به راهنمایی دارید روی گزینه راهنمای پنل بزنید</code>
➖➖➖➖➖➖➖➖
👇 یکی از گزینه های زیر را انتخاب کنید 👇",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
           'keyboard'=>[
    [['text'=>"👥آمار کلی ربات👥"],['text'=>"🍿پاکسازی اسپم"]],
    	[['text'=>"📮پیام همگانی📮"],['text'=>"📤فوروارد همگانی📤"]],
    	[['text'=>"📚بخش یادگیری"],['text'=>"Back | برگشت"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]); 
}else{
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"😑شما دسترسی به بخش مدیریت را ندارید!",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]); 
}
}
elseif($textmessage == "🍿پاکسازی اسپم"){
Deletefolder("data/spam");
rmdir("data/spam");
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	if($chat_id == $admin ){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"😄🍿 لیست اسپم پاکسازی شد.",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
           'keyboard'=>[
    	[['text'=>"🔹بازگشت به پنل"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]); 
	 }else{
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"😑شما دسترسی به بخش مدیریت را ندارید!",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]); 
}
}
elseif($textmessage == "📚بخش یادگیری"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	if($chat_id == $admin ){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📍 در این بخش میتونی کلمه یاد بدید.. کلمه حذف کنید و یا کلمه هارو ببینید.
➖➖➖➖➖➖➖➖
👇 یکی از گزینه های زیر را انتخاب کنید 👇",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
           'keyboard'=>[
    	[['text'=>"📉لیست کلمه ها"]],
    	[['text'=>"😄 یاد دادن کلمه جدید"],['text'=>"🔹بازگشت به پنل"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]); 
}else{
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"😑شما دسترسی به بخش مدیریت را ندارید!",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]); 
}
}
elseif($chat_id == $admin and $textmessage == "📉لیست کلمه ها"){
$list = file_get_contents("cmd/list.txt");
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"
✏️ لیست کلمه هایی که به من یاد دادی !
➖➖➖➖➖➖➖➖➖➖➖➖
<code>$list</code>",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 	
}
elseif($chat_id == $admin and $textmessage == "😄 یاد دادن کلمه جدید"){	
mkdir("cmd");
$user["step"] = "settextanpa";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"🔺 متنی که می خواهید ربات به آن پاسخ دهد را بفرستید.",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"🔹بازگشت به پنل"]],
	],
		"resize_keyboard"=>true,
	 ])
]); 
}

elseif($step == "settextanpa" and $chat_id == $admin and $textmessage != "🔹بازگشت به پنل"){	
	if(!file_exists("cmd/$textmessage.txt")){
$user["step"] = "set-cmd-text";
$user["gpgramtok"] = $textmessage;
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"حالا پاسخ را ارسال کنید.",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"🔹بازگشت به پنل"]],
	],
		"resize_keyboard"=>true,
	 ])
]); 
}else{
	  bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"❌ این کلمه رو قبلا بلد بودم.",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
]); 	
}
}
elseif($step == "set-cmd-text" and $chat_id == $admin and $textmessage != "🔹بازگشت به پنل"){	
$cmds = $user["gpgramtok"];
file_put_contents("cmd/$cmds.txt",$textmessage);
$myfile2 = fopen("cmd/list.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$cmds\n");
fclose($myfile2);
$user["step"] = "none";
$user["gpgramtok"] = "";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"✅ ثبت شد.",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"🔹بازگشت به پنل"]],
	],
		"resize_keyboard"=>true,
	 ])
]); 
}
//---
elseif($chat_id == $admin and $textmessage == "📮پیام همگانی📮"){	
$user["step"] = "send2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"پیام خود را برای ارسال همگانی ارسال نمایید➰",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"🔹بازگشت به پنل"]],
	],
		"resize_keyboard"=>true,
	 ])
]); 
}
elseif($chat_id == $admin && $step == "send2all" && $textmessage != "🔹بازگشت به پنل"){ 
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
    $all_member = fopen( "data/members.txt", 'r');
	while( !feof( $all_member)) {
 	$user = fgets( $all_member);
  bot('sendMessage',[
 'chat_id'=>$user,
 'text'=>$textmessage,
 'parse_mode'=>"HTML",
  ]);
}
  bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"پیام همگانی با موفقیت به همه اعضا ارسال شد✔️",
 'parse_mode'=>"HTML",
  ]);
}

//----
elseif($chat_id == $admin and $textmessage == "📤فوروارد همگانی📤"){
	$user["step"] = "f2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[

 'chat_id'=>$admin,
 'text'=>"پیام خود را برای فروارد همگانی فروارد نمایید➰",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"🔹بازگشت به پنل"]],
	],
		"resize_keyboard"=>true,
	 ])
]); 
}

elseif($textmessage != "🔹بازگشت به پنل" && $from_id == $admin && $step == "f2all"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
    $all_member = fopen( "data/members.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
		   bot('ForwardMessage',[
	'chat_id'=>$user,
	'from_chat_id'=>$admin,
	'message_id'=>$message_id
	]);
		}    
		bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"فروارد همگانی به همه اعضای ربات فروارد شد✔️",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
]); 
}
	 	 	 //-----------------------*-*-*-*
elseif($chat_id == $admin and $textmessage == "👥آمار کلی ربات👥"){	
$alluser = file_get_contents("data/members.txt");
	$alaki = explode("\n",$alluser);
    $allusers = count($alaki)-1;
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"➰تعداد کل اعضای ربات : $allusers",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
]); 
}

}
unlink('error_log');
?>