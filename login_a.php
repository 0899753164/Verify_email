
<?php
ob_start();
session_start();
require 'config.inc.php';
require "class.phpmailer.php";

function showMessage($mess, $url) {
    print "<script language = 'JavaScript'>alert('".$mess."');</script>";
    if ($url != "0") {
        print  "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
    }
}
$da_time = date("Y-m-d");
$email =htmlspecialchars($_POST["email"], ENT_QUOTES);

// 
// Check mail type
if($_POST["mail_type"] !=''){
    $type_mail =htmlspecialchars($_POST["mail_type"], ENT_QUOTES);
    $mail_format =$email.''.$type_mail;
    $get_mail = filter_var($mail_format, FILTER_VALIDATE_EMAIL);
    // echo '<img src="http://worldmedicsky.info/demo/sm-inv/images/loading-spinner.gif"> ระบบกำลังตรวจสอบอีเมล์ของคุณ กรุณารอสักครู่.....';
    
}else{
    echo "<script>alert('รูปแบบอีเมล์ไม่ถูกต้อง กรุณาเลือกประเภทอีเมล์ ');</script>";
    echo "<script>window.location='https://www.software.worldmedic.com/download2.php?Group_porduct=';</script>";
}
//////////////////////////////////// Verify email //////////////////////////
    // Verify mail
    // Include library file
    // Keyword "Verify Email Address and Check if Email is Real using PHP"
    // Refference https://www.codexworld.com/verify-email-address-check-if-real-exists-domain-php/
    require_once '../VerifyEmail.class.php'; 

    // Initialize library class
    $mail = new VerifyEmail();

    // Set the timeout value on stream
    $mail->setStreamTimeoutWait(20);

    // Set debug output mode
    $mail->Debug= FALSE; 
    $mail->Debugoutput= 'html'; 

    // Set email address for SMTP request
    $mail->setEmailFrom('worldmedic1software@gmail.com');

    // Email to check value from post
    $emailVerify = $get_mail; 

    // Check if email is valid and exist
    if($mail->check($emailVerify)){ 
        // อีเมล์มีอยู่จริง
      //  echo 'Email &lt;'.$emailVerify.'&gt; is exist!';

    }elseif(verifyEmail::validate($emailVerify)){ 
        // รูปแบบอีเมล์ถูกต้อง แต่ไม่พบที่อยู่ หรืออีเมล์ไม่มีอยู่จริง
        echo "<script>alert('ไม่พบที่อยู่อีเมล์ของคุณ! กรุณาตรวจสอบอีเมล์ให้ถูกต้อง');</script>";
        echo "<script>window.location='https://www.software.worldmedic.com/download2.php?Group_porduct=';</script>";
    }else{
        // ไม่พบที่อยู่อีเมล์หรือ อีเมล์ปลอม
        echo "<script>alert('อีเมล์นี้ไม่มีอยู่จริง ไม่พบที่อยู่อีเมล์ กรุณาตรวจสอบอีเมล์ให้ถูกต้อง!');</script>";
        echo "<script>window.location='https://www.software.worldmedic.com/download2.php?Group_porduct=';</script>";
    }
/////////////////////////////////////// 
// die();
// 
$type =$new = htmlspecialchars($_POST["type"], ENT_QUOTES);
$fname =htmlspecialchars($_POST["fname"], ENT_QUOTES);
$lname =htmlspecialchars($_POST["lname"], ENT_QUOTES);
$pass =htmlspecialchars($_POST["pass"], ENT_QUOTES);
$phone =htmlspecialchars($_POST["phone"], ENT_QUOTES);

// match phone
$tel = $phone;
// Check format 3-7
if(preg_match("/^[0-9]{3}-[0-9]{7}$/", $tel)) {
    // valid | รูปแบบถูกต้อง
    // Validate Start number
    // ตรวจสอบเลขนำหน้า 06,08,09 เท่านั้น
    if(substr($tel, 0, 2) == '06' || substr($tel, 0, 2) == '08' || substr($tel, 0, 2) == '09'){
        // valid start number
        // ตรวจสอบ หมายเลขมั่ว
        $datanum=array("061-0987654","061-9876543", "061-8765432","061-7654321", "061-1231231","061-1212121","061-2121212","061-1313131","061-1414141",
        "061-1515151","061-1616161","061-1717171","061-1818181","061-1919191","061-1010101", "061-0101010", "061-2345678","062-3456789","063-2345678",
        "064-2345678","065-2345678","066-2345678","067-2345678","068-2345678","069-2345678","060-0000000","061-1111111","061-2222222","061-3333333",
        "061-4444444","061-5555555","061-6666666","061-7777777","061-8888888","061-9999999","061-0000000","062-1111111","062-2222222","062-3333333",
        "062-4444444","062-5555555","062-6666666","062-7777777","062-8888888","062-9999999","062-0000000","063-1111111","063-2222222","063-4444444",
        "063-5555555","063-6666666","063-7777777","063-8888888","063-9999999","063-0000000","064-1111111","064-2222222","064-3333333","064-4444444",
        "064-5555555","064-6666666","064-7777777","064-8888888","064-9999999","064-0000000","065-1111111","065-2222222","065-3333333","065-4444444",
        "065-5555555","065-6666666","065-7777777","065-8888888","065-9999999","065-0000000","666-1111111","666-2222222","666-3333333","666-4444444",
        "666-5555555","666-6666666","666-7777777","666-8888888","666-9999999","666-0000000","667-1111111","667-2222222","667-3333333","667-4444444",
        "667-5555555","667-5555555","667-7777777","667-8888888","667-9999999","667-0000000","668-1111111","668-2222222","668-3333333","668-4444444",
        "668-5555555","668-6666666","668-9999999","668-0000000","669-1111111","669-2222222","669-3333333","669-4444444","669-5555555","669-6666666",
        "669-7777777","669-8888888","669-0000000","660-1111111","660-2222222","660-3333333","660-4444444","660-5555555","660-6666666","660-7777777",
        "660-8888888","660-9999999","660-0000000",

        "081-0987654","081-9876543", "081-8765432","081-7654321", "081-1231231","081-1212121","081-2121212","081-1313131","081-1414141",
        "081-1515151","081-1616161","081-1717171","081-1818181","081-1919191","081-1010101", "081-0101010", "081-2345678","082-3456789","083-2345678",
        "084-2345678","085-2345678","086-2345678","087-2345678","088-2345678","089-2345678","080-0000000","081-1111111","081-2222222","081-3333333",
        "081-4444444","081-5555555","081-6666666","081-7777777","081-8888888","081-9999999","081-0000000","082-1111111","082-2222222","082-3333333",
        "082-4444444","082-5555555","082-6666666","082-7777777","082-8888888","082-9999999","082-0000000","083-1111111","083-2222222","083-4444444",
        "063-5555555","083-6666666","083-7777777","083-8888888","083-9999999","083-0000000","084-1111111","084-2222222","084-3333333","084-4444444",
        "064-5555555","084-6666666","084-7777777","084-8888888","084-9999999","084-0000000","085-1111111","085-2222222","085-3333333","085-4444444",
        "085-5555555","085-6666666","085-7777777","085-8888888","085-9999999","085-0000000","866-1111111","866-2222222","866-3333333","866-4444444",
        "866-5555555","866-6666666","866-7777777","866-8888888","866-9999999","866-0000000","867-1111111","867-2222222","867-3333333","867-4444444",
        "867-5555555","867-5555555","867-7777777","867-8888888","867-9999999","867-0000000","868-1111111","868-2222222","868-3333333","868-4444444",
        "868-5555555","868-6666666","868-9999999","868-0000000","869-1111111","869-2222222","869-3333333","869-4444444","869-5555555","869-6666666",
        "869-7777777","869-8888888","869-0000000","860-1111111","860-2222222","860-3333333","860-4444444","860-5555555","860-6666666","860-7777777",
        "860-8888888","860-9999999","860-0000000",

        "091-0987654","091-9876543", "091-8765432","091-7654321", "091-1231231","091-1212121","091-2121212","091-1313131","091-1414141",
        "091-1515151","091-1616161","091-1717171","091-1818181","091-1919191","091-1010101", "091-0101010", "091-2345678","092-3456789","093-2345678",
        "094-2345678","095-2345678","096-2345678","097-2345678","098-2345678","099-2345678","090-0000000","091-1111111","091-2222222","091-3333333",
        "091-4444444","091-5555555","091-6666666","091-7777777","091-8888888","091-9999999","091-0000000","092-1111111","092-2222222","092-3333333",
        "092-4444444","092-5555555","092-6666666","092-7777777","092-8888888","092-9999999","092-0000000","093-1111111","093-2222222","093-4444444",
        "093-5555555","093-6666666","093-7777777","093-8888888","093-9999999","093-0000000","094-1111111","084-2222222","094-3333333","094-4444444",
        "094-5555555","094-6666666","094-7777777","094-8888888","094-9999999","094-0000000","095-1111111","095-2222222","095-3333333","095-4444444",
        "095-5555555","095-6666666","095-7777777","095-8888888","095-9999999","095-0000000","966-1111111","966-2222222","966-3333333","966-4444444",
        "996-5555555","966-6666666","966-7777777","966-8888888","966-9999999","966-0000000","967-1111111","967-2222222","967-3333333","967-4444444",
        "997-5555555","967-5555555","967-7777777","967-8888888","967-9999999","967-0000000","968-1111111","968-2222222","968-3333333","968-4444444",
        "998-5555555","968-6666666","968-9999999","968-0000000","969-1111111","969-2222222","969-3333333","969-4444444","969-5555555","969-6666666",
        "999-7777777","969-8888888","969-0000000","960-1111111","960-2222222","960-3333333","960-4444444","960-5555555","960-6666666","960-7777777",
        "990-8888888","960-9999999","960-0000000"
        );
        // Check random number from input
        foreach($datanum as $value){
            if($tel == $value){
                echo $value.'='.$tel;
                echo "<script>alert('หมายเลขโทรศัพท์ไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง');</script>";
                echo "<script>window.location='https://www.software.worldmedic.com/download2.php?Group_porduct=';</script>";
            break;
            } else{}   
        }
    } else {
        echo "<script>alert('ไม่มีหมายเลข '".substr($tel, 0, 2).");</script>";
        echo "<script>window.location='https://www.software.worldmedic.com/download2.php?Group_porduct=';</script>";
    }
    // 
} else {
    echo "<script>alert('กรุณาใส่หมายเลขโทรศัทพ์ให้ครบ 10 หลัก');</script>";
    echo "<script>window.location='https://www.software.worldmedic.com/download2.php?Group_porduct=';</script>";
}
// 

$line_id =htmlspecialchars($_POST["line_id"], ENT_QUOTES);
$address =htmlspecialchars($_POST["address"], ENT_QUOTES);
$aump =htmlspecialchars($_POST["aump"], ENT_QUOTES);
$province =htmlspecialchars($_POST["province"], ENT_QUOTES);
$zip =htmlspecialchars($_POST["zip"], ENT_QUOTES);
$soft =htmlspecialchars($_POST["soft"], ENT_QUOTES);
if($pass == '-'){
    $type_load = "NM";
    $pass = "";
}
// echo 'get_mail='.$get_mail; die();

$FNAME_SS = $fname;
$LNAME_SS = $lname;
$CODE_SS = $pass;
$PHONE = $tel;
$EMAIL = $mail_format;
$ADDRESS = $address;
$AUMP = $aump;
$PROVINCE = $province;
$ZIP = $zip;
$SOFT = $soft;

$_SESSION['FNAME_SS'] = $FNAME_SS;
$_SESSION['LNAME_SS'] = $LNAME_SS;
$_SESSION['CODE_SS'] = $CODE_SS;
$_SESSION['TYPE'] = $TYPE;
$_SESSION['PHONE'] = $PHONE;
$_SESSION['EMAIL'] = $EMAIL;
$_SESSION['ADDRESS'] = $ADDRESS;
$_SESSION['AUMP'] = $AUMP;	
$_SESSION['PROVINCE'] = $PROVINCE;
$_SESSION['ZIP'] = $ZIP;
$_SESSION['SOFT'] = $SOFT;
?>
<html>
    <head>
        <title>WorldMedic Software:: Enable Medical &amp; Healthcare Software...</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <img src="http://worldmedicsky.info/demo/sm-inv/images/loading-spinner.gif"> Please Wait.....
        <?php
        $sql = "INSERT INTO mem_load SET fname='$fname',lname='$lname',code='$pass',type='$type',phone='$tel',line_id='$line_id',email='$get_mail',address='$address',aump='$aump',province='$province',zip='$zip',soft_like='$soft',date='$da_time',type_load='$type_load'";
        $rs= mysql_query($sql);
        if(!$rs){
            echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');window.history.back();</script>";
            exit();
        }
        $id_cus = mysql_insert_id();
        $mod = md5($id_cus); 
        mysql_query("UPDATE mem_load SET id_real='$id_cus' ,id_mod='$mod' WHERE id='$id_cus'");
        mysql_query('SET CHARACTER SET UTF8');
        mysql_query('SET character_set_client = UTF8');
        mysql_query('SET character_set_connection = UTF8');
        $sql ="SELECT * FROM  mem_load AS a LEFT JOIN tb_product AS b ON a.soft_like=b.id_run WHERE 1=1 AND a.id='".$id_cus."' ORDER BY a.id DESC";
        $rs = mysql_query($sql);
		$row = mysql_num_rows($rs);
        $rc = mysql_fetch_object($rs);
        $mail_to = $rc->email;
        $message = "<strong>ชื่อ  : </strong> ".$rc->fname."<br>";
        $message .= "<strong>สกุล : </strong> ".$rc->lname."<br>\n";
        $message .= "<strong>เลขที่ใบประกอบวิชาชีพ  : </strong> ".$rc->code."<br>\n";
        $message .= "<strong>วิชาชีพ  : </strong> ".$rc->type."<br>\n";
        $message .= "<strong>โทรศัพท์  : </strong> ".$rc->phone."<br>\n";
        $message .= "<strong>LINE ID  : </strong> ".$rc->line_id."<br>\n";
        $message .= "<strong>E-mail  : </strong> ".$rc->email."<br>\n";
        $message .= "<strong>ที่อยู่  : </strong> ".$rc->address."<br>\n";
        $message .= "<strong>อำเภอ  : </strong> ".$rc->aump."<br>\n";
        $message .= "<strong>จังหวัด  : </strong> ".$rc->province."<br>\n";
        $message .= "<strong>รหัสไปรษณีย์  : </strong> ".$rc->zip."<br>\n";
        $message .= "<strong>ผลิตภัณฑ์ที่สนใจ  : </strong> ".$rc->pro_name." ".$rc->pro_name2."<br>\n";

        // oner resived
        $to2 = "worldmedic@worldmedic.com";
        $to3 = "software@worldmedic.com";
        $to4 = "business_admin@worldmedic.com";

        // CC if you want
        //$to5 = "support@worldmedic.com";
        //$to4 = "danai@worldmedic.com";
        //$to_Programmer = "darksoulxp@gmail.com";

        // test
        //$to_test = "nuradeen.bing0899@gmail.com";

if($row > 0 && $rc->fname != '' && $rc->fname != '' && $rc->lname != '' && $rc->type != '' && $rc->phone != '' && $rc->email != '' && $rc->address != ''){
        $subject = "รายชื่อผู้เข้ามา DownLoad Software วันที่ " .  date("d M y");
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP
        try {
            $mail->Encoding = "quoted-printable";
            $mail->CharSet = "UTF-8";
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "worldmedic1software@gmail.com";
            $mail->Password = "qydqg100cm";
            $mail->From = $to4;
            // test
            //$mail->From = $to_test;
           
            $mail->FromName = "Software Worldmedic";
            
             $mail->AddAddress($to2);
			 $mail->AddAddress($to3);
            $mail->AddAddress($to4);
            
            // resived test 
           //$mail->AddAddress($to_test);
            
			//$mail->AddBCC($to_Programmer);
            $mail->Subject = $subject;
            $mail->IsHTML(true);
            $mail->Body = $message;
            $mail->Send();
        }catch (phpmailerException$e) {
            echo $e->errorMessage();
        }catch (Exception $e) {
            echo $e->getMessage();
            //sleep(2);
            //continue;
        }
}
        $sql2 = "SELECT * FROM tb_product WHERE id_run='".$SOFT."' ";
        $rs2 = mysql_query($sql2);
        $rc2 = mysql_fetch_object($rs2);
        $link1 = '<a href="'.$rc2->download.'" target="_blank" title="คลิกขวา Open link new tab" >ดาวน์โหลดซอฟต์แวร์</a>';
        $link2 = '<a href="'.$rc2->manual.'" target="_blank">ดาวน์โหลดคู่มือซอฟต์แวร์</a>';
        $link3 = '<a href="http://www.software.worldmedic.com/download/page.php?id='.$rc2->id_run.'&product='.$rc2->pro_name.' '.$rc2->pro_name2.'" target="_blank">รายละเอียดซอฟต์แวร์</a>';
        //$email = "webprogrammer3@worldmedic.com";

        $strMessage = '<div>
    <p class="MsoNormal">
        <b><i><span style="color:black">WorldMedic&nbsp; Information &amp; Technology.</span></i></b>
        <b><i><span style="color:red"> ::: Support Team</span></i></b>
        <i><span style="color:black"><br></span></i>
        <span style="font-size:8.0pt;color:#7f7f7f">==============================<wbr>==================================<br></span>
        <img border="0" src="http://worldmedic.info/img_mail/1.jpg">
    </p>
    <p class="MsoNormal">
        <b><i><span style="font-size:8.0pt;color:#7f7f7f"><img border="0" width="110" height="20" src="http://worldmedic.info/img_mail/2.jpg" alt="Description: cid:image001.jpg@01C9D3D7.46CDC690" class="CToWUd"></span></i></b>
        <b><span style="font-size:8.0pt;color:#7f7f7f"><br></span></b>
        <b><span style="font-size:8.0pt;color:#595959">WorldMedic Information &amp; Technology.</span></b>
        <span style="font-size:8.0pt;color:#595959"><br></span>
        <span style="font-size:7.5pt;color:#595959">No.1 Ramindra 42/1 WorldMedic Bldg. Ramindra Rd.<br>Kannayao&nbsp; Bangkok 10230 Thailand.<br>Tel. 0-2949-7816-20 Fax. 0-2949-7816-20 Ext.</span>
        <span lang="TH" style="font-size:7.5pt;font-family:&quot;Cordia New&quot;,&quot;sans-serif&quot;;color:#595959"> </span>
        <span style="font-size:7.5pt;color:#595959">14&nbsp;&nbsp; <br>Call Center &nbsp;0-2949-7806&nbsp; <br></span>
        <span style="font-size:7.5pt;color:#595959">Mobile: +668-8208-5130 / +668-7674-3377&nbsp;&nbsp;&nbsp; </span>
        <span style="font-size:7.5pt;color:#595959">Email: </span>
        <span style="font-size:7.5pt;color:#4a442a"><a href="mailto:support@worldmedic.com" target="_blank"><span style="color:blue">support@worldmedic.com</span></a></span>
        <span style="font-size:7.5pt;color:#404040"> </span>
        <span style="font-size:7.5pt;color:#595959"><br>Website: <a href="http://www.worldmedic.com/" target="_blank"><span style="color:#595959">www.worldmedic.com</span></a> / <a href="http://www.worldmedic.co.th/" target="_blank"><span style="color:#595959">www.worldmedic.co.th</span></a></span>
    </p>
    <p class="MsoNormal">
        <span lang="TH" style="font-size:9.0pt;font-family:&quot;Microsoft Sans Serif&quot;,&quot;sans-serif&quot;;color:black">หากต้องการข้อมูลสนับสนุนเพิ่<wbr>มเติม หรือ ต้องการให้สตาฟเราช่วยเหลืออื่<wbr>นๆ สามารถติดต่อได้ที่บริษัทฯ หรือเว็บไซต์ที่พัฒนาไว้สำหรั<wbr>บเป็นช่องทางติดต่อกับท่านครับ</span>
        <span style="font-size:9.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:black"><u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <b><span style="font-size:9.0pt;font-family:&quot;Cambria&quot;,&quot;serif&quot;;color:#00b0f0">Call Center:&nbsp;0-2949-7806&nbsp; </span></b>
        <b><span style="font-size:9.0pt;font-family:&quot;Cambria&quot;,&quot;serif&quot;;color:#00b0f0"><u></u><u></u></span></b>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Email: </span>
        <span style="color:#1f497d"><a href="mailto:worldmedic@worldmedic.com" target="_blank"><span style="font-size:8.0pt;color:#00b0f0">worldmedic@worldmedic.com</span></a></span>
        <span style="font-size:8.0pt;color:#1f497d"> &nbsp;/ </span>
        <span style="color:#1f497d"><a href="mailto:Support@worldmedic.com" target="_blank"><span style="font-size:8.0pt;color:#00b0f0">Support@worldmedic.com</span></a></span>
        <span style="font-size:8.0pt;color:#1f497d"> </span>
        <span style="font-size:8.0pt;color:#1f497d"><u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Website: </span>
        <span style="font-size:8.0pt;color:#00b0f0"><a href="http://www.worldmedic.com/" target="_blank"><span style="color:#00b0f0">www.worldmedic.com</span></a>&nbsp; /&nbsp; <a href="http://www.worldmedic.co.th/" target="_blank"><span style="color:#00b0f0">www.worldmedic.co.th</span></a></span>
        <span style="font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#1f497d"><u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Software Center Port:</span>
        <span style="font-size:8.0pt;color:#00b0f0"> <a href="http://www.worldmedicsoftware.com/" target="_blank"><span style="color:#00b0f0">www.worldmedicsoftware.com</span></a></span>
        <span style="font-size:8.0pt;color:#1f497d"><u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Software Center: </span>
        <span style="color:#1f497d"><a href="http://www.software.worldmedic.com/" target="_blank"><span style="font-size:8.0pt;color:#00b0f0">www.software.worldmedic.com</span></a></span>
        <span style="font-size:8.0pt;color:#1f497d"> <u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Care Center: </span>
        <span style="color:#1f497d"><a href="http://www.carecenter.worldmedic.com/" target="_blank"><span style="font-size:8.0pt;color:#00b0f0">www.carecenter.worldmedic.com</span></a></span>
        <span style="font-size:8.0pt;color:#1f497d"> <u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Training Center: </span>
        <span style="color:#1f497d"><a href="http://www.training.worldmedic.com/" target="_blank"><span style="font-size:8.0pt;color:#00b0f0">www.training.worldmedic.com</span></a></span>
        <span style="font-size:8.0pt;color:#1f497d"><u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Document Center: </span>
        <span style="color:#1f497d"><a href="http://www.manual.worldmedic.com/" target="_blank"><span style="font-size:8.0pt;color:#00b0f0">www.manual.worldmedic.com</span></a></span>
        <span style="font-size:8.0pt;color:#1f497d"><u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Accessory Center: </span>
        <span style="color:#1f497d"><a href="http://www.accessory.worldmedic.com/" target="_blank"><span style="font-size:8.0pt;color:#00b0f0">www.accessory.worldmedic.com</span></a></span>
        <span style="font-size:8.0pt;color:#1f497d"> <u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Support Live Chat: </span>
        <span style="color:#1f497d"><a href="http://www.software.worldmedic.com/chat/" target="_blank"><span style="font-size:8.0pt;color:#00b0f0">www.software.worldmedic.com/<wbr>chat</span></a></span>
        <span style="font-size:8.0pt;color:#00b0f0"><u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:black">Buy Software &amp; Accessory:</span>
        <span style="font-size:8.0pt;color:#00b0f0"> </span>
        <span style="color:#1f497d"><a href="http://www.mbmed.worldmedic.com/" target="_blank"><span style="font-size:8.0pt;color:#00b0f0">www.mbmed.worldmedic.com</span></a></span>
        <span style="font-size:8.0pt;color:#00b0f0"> </span>
        <span style="font-size:8.0pt;color:#1f497d"><u></u><u></u></span>
    </p>
    <p class="MsoNormal">
        <span style="font-size:8.0pt;color:#1f497d">Call Center: </span>
        <span style="font-size:8.0pt;color:#00b0f0"><a href="http://www.9497806.com/" target="_blank"><span style="color:#00b0f0">www.9497806.com</span></a> <u></u><u></u></span>
    </p>
    <table width="100%">
        <tr>
            <td  width="20%" align="center"><img border="0" src="http://worldmedic.info/img_mail/0.jpg" alt="http://worldmedic.info/img_mail/0.jpg"></td>
            <td  width="20%" align="center"><img border="0" src="http://worldmedic.info/img_mail/4.jpg" alt="http://worldmedic.info/img_mail/4.jpg"></td>
            <td  width="20%" align="center"><img border="0" src="http://worldmedic.info/img_mail/5.jpg" alt="http://worldmedic.info/img_mail/5.jpg"></td>
            <td  width="20%" align="center"><img border="0" src="http://worldmedic.info/img_mail/6.jpg" alt="http://worldmedic.info/img_mail/6.jpg"></td>
            <td  width="20%" align="center"><img border="0" src="http://worldmedic.info/img_mail/7.jpg" alt="http://worldmedic.info/img_mail/7.jpg"></td>
        </tr>
    </table>
    <br>
    <span style="font-size:9.0pt;font-family:Consolas;color:red"><b>DISCLAIMER : </b></span><br/><br/>
    <span style="font-size:9.0pt;font-family:Consolas;color:red">The information contained in this e-mail may be confidential,proprietary, and/or legally privileged. It is intended only for the person or entity to which it is addressed. If you are not the intended recipient, you are not allowed to distribute, copy, review, retransmit, disseminate or use this e-mail or any part of it in any form whatsoever for any purpose. If you have received this e-mail in error, please immediately notify the sender and delete the original message. Please be aware that the contents of this e-mail may not be secure and should not be seen as forming a legally binding contract unless otherwise stated. Thank you.</span>
    <img border="0" src="http://worldmedic.info/img_mail/8.jpg" alt="http://worldmedic.info/img_mail/8.jpg">
</div>';

        $html = 'เรียน คุณ'.$rc->fname.' '.$rc->lname.'<br><br>
บริษัทเวิลด์เมดิก อินฟอร์เมชั่น แอนด์ เทคโนโลยี จำกัด ส่งลิ้งดาวน์โหลดซอฟต์แวร์และคู่มื่อซอฟต์แวร์ชุดทดลองใช้มาให้ค่ะ<br/>
Link Software : '.$link1.'<br/>
Link Manual : '.$link2.'<br/>
Link Screenshot : '.$link3.'<br/><br/>
ขอบคุณสำหรับการดาวน์โหลดซอฟต์แวร์ชุดทดลองใช้ค่ะ<br><br>นับถือ<br><br>'.$strMessage;
        //รหัสขอลงทะเบียนของท่านคือ "<span style="color:blue"> '.$code1.' </span>"<br>
        // ////////////////////////////////// Customer resived ////////////////////////////
        $email = $rc->email;
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        try {
            $mail->Encoding = "quoted-printable";
            $mail->CharSet = "utf-8";
            $mail->Host = 'ssl://smtp.gmail.com'; 
            $mail->Port = 465;
            $mail->SMTPAuth = true;

            // Sender email support@worldmedic.com is not using | 16/11/63
            // $mail->Username = "support@worldmedic.com"; 
            // $mail->Password = "qydqg300cm";
            // $mail->From = "support@worldmedic.com"; 

            $mail->Username = "worldmedic1software@gmail.com";
            $mail->Password = "qydqg100cm";
            $mail->From = "worldmedic1software@gmail.com"; 

            $mail->FromName = 'Support Worldmedic';

            //$mail->AddCC('software@worldmedic.com', 'Software Worldmedic');
            //$mail->AddCC('support@worldmedic.com', 'Software Worldmedic');
            // Resived
            $mail->AddAddress($mail_to);
            $mail->Subject  = "ลิ้งดาวน์โหลดซอฟต์แวร์และคู่มื่อซอฟต์แวร์ชุดทดลองใช้ - Worldmedic";
            $mail->isHTML(true);
            $mail->Body = $html;
            //$mail->AltBody = $message_body;
            $mail->Send();
        }catch (phpmailerException$e) {
            echo $e->errorMessage();
        }catch (Exception $e) {
            echo $e->getMessage();
            //sleep(2);
            //continue;
        }
        //sleep(5);
        // showMessage("ระบบได้ทำการส่งลิ้งค์ไปที่ email ของคุณเรียบร้อยแล้ว ขอบคุณสำหรับการดาวน์โหลดซอฟต์แวร์ชุดทดลองใช้ค่ะ","index_detail2.php?check=CPE");
        // 
        // showMessage("ระบบได้ทำการส่งลิ้งค์ไปที่ email ของคุณเรียบร้อยแล้ว ขอบคุณสำหรับการดาวน์โหลดซอฟต์แวร์ชุดทดลองใช้ค่ะ","index_detail3.php?check=CPE");
        echo "<script>alert('ระบบได้ทำการส่งลิ้งค์ไปที่ email ของคุณเรียบร้อยแล้ว ขอบคุณสำหรับการดาวน์โหลดซอฟต์แวร์ชุดทดลองใช้ค่ะ');</script>";
        echo "<script>window.location='https://www.software.worldmedic.com/download2.php?Group_porduct=';</script>";
        ?>
    </body>
</html>
