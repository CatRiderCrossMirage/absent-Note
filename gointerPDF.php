<?php

require_once __DIR__ . '/vendor/autoload.php'; 

// grab variable
$monthArr = Array(
    "01"=>"มกราคม",
    "02"=>"กุมภาพันธ์",
    "03"=>"มีนาคม",
    "04"=>"เมษายน",
    "05"=>"พฤษภาคม",
    "06"=>"มิถุนายน", 
    "07"=>"กรกฎาคม",
    "08"=>"สิงหาคม",
    "09"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"
); 

$dateWrite = $_POST['dateWrite'];

$dateWriteSplite = explode("-",$dateWrite);
$monthName = $monthArr[$dateWriteSplite[1]];
$year = $dateWriteSplite[0]+543;

$birthday = $_POST['birthday'];

$birthdaySplite = explode("-",$birthday);
$monthNameb = $monthArr[$birthdaySplite[1]];
$yearb = $birthdaySplite[0]+543;

$dateStartWork = $_POST['dateStartWork'];

$dateStartWorkSplite = explode("-",$dateStartWork);
$monthNamew = $monthArr[$dateStartWorkSplite[1]];
$yearw = $dateStartWorkSplite[0]+543;



$fullname = $_POST['fullname'];
$age = $_POST['age'];
$rank = $_POST['rank'];
$summary = $_POST['summary'];
$nation = $_POST['nation'];
$yearDatel = $_POST['yearDatel'];
$monthDatel = $_POST['monthDatel'];
$numDatel = $_POST['numDatel'];
$lastmotive = $_POST['lastmotive'];
$lastnation = $_POST['lastnation'];
$LyearDatel = $_POST['LyearDatel'];
$LmonthDatel = $_POST['LmonthDatel'];
$LnumDatel = $_POST['LnumDatel'];
$jobTitle = $_POST['jobTitle'];
$belongTo = $_POST['belongTo'];
$motive = $_POST['motive'];
$motiveBecuase = $_POST['motiveBecuase'];

$dateStartAbsent = $_POST['dateStartAbsent'];
$dateStartAbsentSplite = explode("-",$dateStartAbsent);
$monthStart = $monthArr[$dateStartAbsentSplite[1]];
$yearStart = $dateStartAbsentSplite[0]+543;

$dateEndAbsent = $_POST['dateEndAbsent'];
$dateEndAbsentSplite = explode("-",$dateEndAbsent);
$monthEnd = $monthArr[$dateEndAbsentSplite[1]];
$yearEnd = $dateEndAbsentSplite[0]+543;
$numDate = $_POST['numDate'];

$dateStartAbsentl = $_POST['dateStartAbsentl'];
$dateStartAbsentlSplite = explode("-",$dateStartAbsentl);
$monthLStart = $monthArr[$dateStartAbsentlSplite[1]];
$yearLStart = $dateStartAbsentlSplite[0]+543;

$dateEndAbsentl = $_POST['dateEndAbsentl'];
$dateEndAbsentlSplite = explode("-",$dateEndAbsentl);
$monthLEnd = $monthArr[$dateEndAbsentlSplite[1]];
$yearLEnd = $dateEndAbsentlSplite[0]+543;
$numDatel = $_POST['numDatel'];

// creat PDF
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);

$data = "
    <p style='text-align:right;font-size: 22px;'><I>เขียนที่&nbsp;&nbsp;&nbsp;&nbsp;คณะสถาปัตยกรรม มหาวิทยาลัยนเรศวร<br>
    วันที่&nbsp;&nbsp;$dateWriteSplite[2]  เดือน&nbsp;&nbsp;$monthName พ.ศ.&nbsp;&nbsp;$year</p>

    <p style='font-size: 26px;'><I>
    <b>เรื่อง</b> ขอลาไปต่างประเทศ <br>
    <b>เรียน</b> อธิการบดีมหาวิทยาลัยนเรศวร<br></p>

    <p style='padding-left:75px;font-size: 22px;'><I>
    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า</b>&nbsp;&nbsp;&nbsp;&nbsp;$fullname &nbsp;&nbsp;&nbsp;&nbsp;
    <b>เกิดวันที่</b>&nbsp;&nbsp;$birthdaySplite[2]  <b>เดือน</b>&nbsp;&nbsp;$monthNameb <b>พ.ศ.</b>&nbsp;&nbsp;$yearb <br>
    <b>อายุ</b>&nbsp;&nbsp;&nbsp;&nbsp;$age &nbsp;&nbsp;&nbsp;&nbsp; <b>ได้เข้ารับราชการเมื่อวันที่</b>&nbsp;&nbsp;$dateStartWork[2]  <b>เดือน</b>&nbsp;&nbsp;$monthNamew <b>พ.ศ.</b>&nbsp;&nbsp;$yearw <br>
    <b>ปัจจุบันเป็นราชการตำแหน่ง</b>&nbsp;&nbsp;&nbsp;&nbsp;$jobTitle &nbsp;&nbsp;&nbsp;&nbsp; <b>ระดับ</b>&nbsp;&nbsp;&nbsp;&nbsp;$rank &nbsp;&nbsp;&nbsp;&nbsp;   <br>
    <b>สังกัด</b>&nbsp;&nbsp;&nbsp;&nbsp;$belongTo &nbsp;&nbsp;&nbsp;&nbsp;<br>
    <b>ได้รับเงินเดือน ๆ ละ</b>&nbsp;&nbsp;&nbsp;&nbsp;$summary &nbsp;&nbsp;&nbsp;&nbsp;   <b>มีความประสงค์จะ</b>&nbsp;&nbsp;&nbsp;&nbsp;ลา$motive <br>
    <b>ณ ประเทศ</b> &nbsp;&nbsp;&nbsp;&nbsp;$nation &nbsp;&nbsp;&nbsp;&nbsp; <b>มีกำหนด</b>&nbsp;&nbsp;&nbsp;&nbsp; $yearDatel &nbsp;&nbsp;&nbsp; <b>ปี</b> &nbsp;&nbsp;&nbsp;&nbsp; $monthDatel &nbsp;&nbsp;&nbsp; <b>เดือน</b> &nbsp;&nbsp;&nbsp;&nbsp; $numDatel &nbsp;&nbsp;&nbsp; <b>วัน</b>
    <b>ตั้งแต่วันที่</b>&nbsp;&nbsp;&nbsp;&nbsp;$dateStartAbsentSplite[2]&nbsp;&nbsp;&nbsp;&nbsp;<b>เดือน</b>&nbsp;&nbsp;&nbsp;&nbsp;$monthStart&nbsp;&nbsp;&nbsp;&nbsp;<b>พ.ศ.</b>$yearStart<b><br>
    ถึงวันที่</b>&nbsp;&nbsp;&nbsp;&nbsp;$dateEndAbsentSplite[2]&nbsp;&nbsp;&nbsp;&nbsp;<b>เดือน</b>&nbsp;&nbsp;&nbsp;&nbsp;$monthEnd&nbsp;&nbsp;&nbsp;&nbsp;<b>พ.ศ.</b>$yearEnd<br>
    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครั้งสุดท้ายข้าพเจ้าได้</b>&nbsp;&nbsp; ลา$lastmotive <br> 
    <b>ไปประเทศ</b> &nbsp;&nbsp;&nbsp;&nbsp;$lastnation &nbsp;&nbsp;&nbsp;&nbsp; <b>เป็นเวลา</b>&nbsp;&nbsp;&nbsp;&nbsp; $LyearDatel &nbsp;&nbsp;&nbsp; <b>ปี</b> &nbsp;&nbsp;&nbsp;&nbsp; $LmonthDatel &nbsp;&nbsp;&nbsp; <b>เดือน</b> &nbsp;&nbsp;&nbsp;&nbsp; $LnumDatel &nbsp;&nbsp;&nbsp; <b>วัน</b>
    <b>ตั้งแต่วันที่</b>&nbsp;&nbsp;&nbsp;&nbsp;$dateStartAbsentlSplite[2]&nbsp;&nbsp;&nbsp;&nbsp;<b>เดือน</b>&nbsp;&nbsp;&nbsp;&nbsp;$monthLStart&nbsp;&nbsp;&nbsp;&nbsp;<b>พ.ศ.</b>&nbsp;&nbsp;$yearLStart <b><br>
    ถึงวันที่</b>&nbsp;&nbsp;&nbsp;&nbsp;$dateEndAbsentlSplite[2]&nbsp;&nbsp;&nbsp;&nbsp;<b>เดือน</b>&nbsp;&nbsp;&nbsp;&nbsp;$monthLEnd&nbsp;&nbsp;&nbsp;&nbsp;<b>พ.ศ.</b>&nbsp;&nbsp;$yearLEnd<br>
    </p>

    <br>

    <p style='text-align:center;font-size: 20px;'><I>
    <b>ขอแสดงความนับถือ</b><br>
    ลงชื่อ______________________________<br>
    (........$fullname........)<br></p>


";


$mpdf->writeHTML($data);

$mpdf->Output();

?>