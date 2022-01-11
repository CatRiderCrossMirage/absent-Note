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

$subject = $_POST['subject'];
$fullname = $_POST['fullname'];
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
    <b>เรื่อง</b> $subject   <br>
    <b>เรียน</b> คณบดีคณะสถาปัตยกรรมศาสตร์ ศิลปะและการออกแบบ<br></p>

    <p style='padding-left:75px;font-size: 22px;'><I>
    <b>ข้าพเจ้า</b>&nbsp;&nbsp;&nbsp;&nbsp;$fullname &nbsp;&nbsp;&nbsp;&nbsp; 
    <b>ตำแหน่ง</b>&nbsp;&nbsp;&nbsp;&nbsp;$jobTitle &nbsp;&nbsp;&nbsp;&nbsp;<br>
    <b>สังกัด</b>&nbsp;&nbsp;&nbsp;&nbsp;$belongTo &nbsp;&nbsp;&nbsp;&nbsp;<br>
    ลา$motive <b>เนื่องจาก</b>&nbsp;&nbsp;&nbsp;&nbsp;$motiveBecuase <br>
    <b>ตั้งแต่วันที่</b>&nbsp;&nbsp;&nbsp;&nbsp;$dateStartAbsentSplite[2]&nbsp;&nbsp;&nbsp;&nbsp;<b>เดือน</b>&nbsp;&nbsp;&nbsp;&nbsp;$monthStart&nbsp;&nbsp;&nbsp;&nbsp;<b>พ.ศ.</b>$yearStart<b><br>
    ถึงวันที่</b>&nbsp;&nbsp;&nbsp;&nbsp;$dateEndAbsentSplite[2]&nbsp;&nbsp;&nbsp;&nbsp;<b>เดือน</b>&nbsp;&nbsp;&nbsp;&nbsp;$monthEnd&nbsp;&nbsp;&nbsp;&nbsp;<b>พ.ศ.</b>$yearEnd<br>
    <b>มีกำหนด</b>&nbsp;&nbsp;&nbsp;&nbsp;$numDate&nbsp;&nbsp;&nbsp;&nbsp;<b>วัน</b> <b>ข้าพเจ้าได้</b> ลา$motive<b> ครั้งสุดท้าย</b> <br>
    <b>ตั้งแต่วันที่</b>&nbsp;&nbsp;&nbsp;&nbsp;$dateStartAbsentlSplite[2]&nbsp;&nbsp;&nbsp;&nbsp;<b>เดือน</b>&nbsp;&nbsp;&nbsp;&nbsp;$monthLStart&nbsp;&nbsp;&nbsp;&nbsp;<b>พ.ศ.</b>$yearLStart <b><br>
    ถึงวันที่</b>&nbsp;&nbsp;&nbsp;&nbsp;$dateEndAbsentlSplite[2]&nbsp;&nbsp;&nbsp;&nbsp;<b>เดือน</b>&nbsp;&nbsp;&nbsp;&nbsp;$monthLEnd&nbsp;&nbsp;&nbsp;&nbsp;<b>พ.ศ.</b>$yearLEnd<br>
    <b>มีกำหนด</b>&nbsp;&nbsp;&nbsp;&nbsp;$numDatel&nbsp;&nbsp;&nbsp;&nbsp;<b>วัน</b><br></p>

    <br>

    <p style='text-align:center;font-size: 20px;'><I>
    <b>ขอแสดงความนับถือ</b><br>
    ลงชื่อ______________________________<br>
    (........$fullname........)<br></p>

    <div class='row'>
        <div class='column' style='float:left;width:50%;'>
        <div style='font-size: 18px;'><I>สถิติการลาในปีงบประมาณนี้ </I></div>  
            <table style='border-collapse: collapse;font-size: 20px;'>
                <tr style='border:1px solid #000;'> 
                    <td style='border:1px solid #000;'>ประเภทการลา</td>
                    <td style='border:1px solid #000;'>ลามาแล้ว<br>(วันทำการ)</td>
                    <td style='border:1px solid #000;'>ลาครั้งนี้<br>(วันทำการ)</td>
                    <td>รวมเป็น<br>(วันทำการ)</td>
                </tr>
                <tr style='border:1px solid #000;'>
                    <td style='border:1px solid #000;'>ป่วย</td>
                    <td style='border:1px solid #000;'></td>
                    <td style='border:1px solid #000;'></td>
                    <td></td>
                </tr>
                <tr style='border:1px solid #000;'>
                    <td style='border:1px solid #000;'>กิจส่วนตัว</td>
                    <td style='border:1px solid #000;'></td>
                    <td style='border:1px solid #000;'></td>
                    <td></td>
                </tr>
                <tr style='border:1px solid #000;'>
                    <td style='border:1px solid #000;'>คลอดบุตร</td>
                    <td style='border:1px solid #000;'></td>
                    <td style='border:1px solid #000;'></td>
                    <td></td>
                </tr>
            </table>
            <div style='font-size: 18px;'><I>
                ลงชื่อ_______________________________ผู้ตรวจสอบ <br>
                (ตำแหน่ง)_______________________________________<br>
                วันที่____________/__________________/_____________</I></div>
        </div>

        <div class='column' style='float:left;width:50%;'>
            <div style='font-size: 18px;'><I>
            ความเห็นผู้บังคับบัญชา <br>
            ____________________________________________ <br>
            ____________________________________________ <br>
            ลงชื่อ_____________________________________ <br>
            วันที่_______/____________/_____________ </I></div><br>
            <div style='font-size: 18px;'><I>คำสั่ง </I></div><br>
            <table>
                <tr >
                    <td><div style='width:30px;height: 30px;;border:2px solid #000;'></div></td>
                    <td>&nbsp; อนุญาต &nbsp;&nbsp;&nbsp;</td>
                    <td><div style='width:30px;height: 30px;;border:2px solid #000;'></div></td>
                    <td>&nbsp; ไม่อนุญาต</div> </td>
                </tr>
            </table><div style='font-size: 18px;'><I>
            ____________________________________________ <br>
            ____________________________________________ <br>
            วันที่_______/____________/_____________ </I></div>

        </div>
    </div>
";


$mpdf->writeHTML($data);

$mpdf->Output('absentNote.pdf');

?>