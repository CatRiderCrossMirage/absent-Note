<?php

require_once __DIR__ . '/vendor/autoload.php'; 

// grab variable

$dateWrite = $_POST['dateWrite'];
$subject = $_POST['subject'];
$fullname = $_POST['fullname'];
$jobTitle = $_POST['jobTitle'];
$belongTo = $_POST['belongTo'];
$motive = $_POST['motive'];
$motiveBecuase = $_POST['motiveBecuase'];
$dateStartAbsent = $_POST['dateStartAbsent'];
$dateEndAbsent = $_POST['dateEndAbsent'];
$numDate = $_POST['numDate'];
$dateStartAbsentl = $_POST['dateStartAbsentl'];
$dateEndAbsentl = $_POST['dateEndAbsentl'];
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
    <p style='text-align:right;font-size: 22px;'><I>เขียนที่&nbsp;&nbsp;&nbsp;&nbsp;$dateWrite&nbsp;&nbsp;&nbsp;&nbsp;<br>
    วันที่____เดือน____________พ.ศ.________</p>

    <p style='font-size: 26px;'><I>
    <b>เรื่อง</b> $subject   <br>
    <b>เรียน</b> คณบดีคณะสถาปัตยกรรมศาสตร์ ศิลปะและการออกแบบ<br></p>

    <p style='padding-left:75px;font-size: 22px;'><I>
    <b>ข้าพเจ้า</b>&nbsp;&nbsp;&nbsp;&nbsp;$fullname &nbsp;&nbsp;&nbsp;&nbsp; 
    <b>ตำแหน่ง</b>&nbsp;&nbsp;&nbsp;&nbsp;$jobTitle &nbsp;&nbsp;&nbsp;&nbsp;<br>
    <b>สังกัด</b>&nbsp;&nbsp;&nbsp;&nbsp;$belongTo &nbsp;&nbsp;&nbsp;&nbsp;<br>
    ลา$motive <b>เนื่องจาก</b>  $motiveBecuase <br>
    <b>ตั้งแต่วันที่</b>&nbsp;&nbsp;&nbsp;&nbsp;$dateStartAbsent&nbsp;&nbsp;&nbsp;&nbsp;<b>เดือน</b>________<b>พ.ศ.</b>________ <b><br>
    ถึงวันที่</b>____$dateEndAbsent ____ <b>เดือน</b>________<b>พ.ศ.</b>________<br>
    <b>มีกำหนด</b>&nbsp;&nbsp;&nbsp;&nbsp;$numDate&nbsp;&nbsp;&nbsp;&nbsp;<b>วัน</b> <b>ข้าพเจ้าได้</b> ลา$motive<b> ครั้งสุดท้าย</b> <br>
    <b>ตั้งแต่วันที่</b>____$dateStartAbsentl ____ <b>เดือน</b>________<b>พ.ศ.</b>________ <b><br>
    ถึงวันที่</b>____$dateEndAbsentl ____<b>เดือน</b>________<b>พ.ศ.</b>________<br>
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