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

$semester = $_POST['semester'];
$yearDegree = $_POST['year'];
$degree = $_POST['degree'];
$studentID = $_POST['studentID'];
$fullname = $_POST['fullname'];
$faculty3Char = $_POST['faculty'];
$faculty = Array(
    "ARG"=>"คณะเกษตรศาสตร์ ทรัพยากรธรรมชาติและสิ่งแวดล้อม",
    "LAW"=>"คณะนิติศาสตร์",
    "BEC"=>"คณะบริหารธุรกิจ เศรษฐศาสตร์และการสื่อสาร",
    "NUE"=>"คณะพยาบาลศาสตร์",
    "PHA"=>"คณะเภสัชศาสตร์",
    "HUM"=>"คณะมนุษยศาสตร์",
    "LOG"=>"คณะโลจิสติกส์และดิจิทัลซัพพลายเชน",
    "SCI"=>"คณะวิทยาศาสตร์",
    "SME"=>"คณะวิทยาศาสตร์การแพทย์",
    "ENG"=>"คณะวิศวกรรมศาสตร์",
    "EDU"=>"คณะศึกษาศาสตร์",
    "ARC"=>"คณะสถาปัตยกรรมศาสตร์ ศิลปะและการออกแบบ",
    "AHS"=>"คณะสหเวชศาสตร์",
    "SOC"=>"คณะสังคมศาสตร์",
    "PHE"=>"คณะสาธารณสุขศาสตร์",
    "AHS"=>"คณะสหเวชศาสตร์",
    "INT"=>"วิทยาลัยนานาชาติ",
    "MED"=>"คณะแพทยศาสตร์",
    "DEN" =>"คณะทันตแพทยศาสตร์"
    // min-max 0-18
);
$major = $_POST['major'];
$tell = $_POST['tell'];
$why = $_POST['why'];

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
<style>
    table {
        border-collapse:collapse;
        width:100%;
    }
    td, th {
        border: 1px solid;
    }
    p {
        padding-left:28px;
    }
</style>
    <table>
    <tr>
        <td style='border: none;text-align:center;'><img src='pic/logoNU.jpg' height='70'></td>
        <td style='border: none;text-align:center;padding-left:50px;'>
            <b><p style='padding-top:2rem;text-align:center;font-size:24px;'>
            มหาวิทยาลัยนเรศวร<br>
            แบบขอเปลื่ยนแปลงการสอนรายวิชา</b><br> 
            ภาคการศึกษาที่ $semester ปีการศึกษา $yearDegree
            </p>
        </td>
        <td style='border: none;text-align:right;'>
            <img src='pic/nu7.png' height='60'>
            วันที่ $dateWriteSplite[2] เดือน $monthName ปี $year <br>
            ระดับปริญญา$degree <br>
            รหัสประจำตัวนิสิต $studentID
        </td>
    </tr>
    </table>
    <!-- content -->
    <p style='text-align:left;padding-left:80px;font-size:20px;'><b>เรียน</b> อธิการบดี<br></p>
    <p style='text-align:left;padding-left:100px;font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า $fullname คณะ $faculty[$faculty3Char] สาขาวิชา $major โทร $tell
    โดยมีความประสงค์เพื่อ $why จึงเรียนมาเพื่อโปรดพิจารณา</p>
    <p style='text-align:right;'>
    นิสิตลงนาม ................................................</p>
    <table>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;กรณีขอลงทะเบียนเรียน <b>** <u>โปรดกรอกรหัสรายวิชา กลุ่มเรียน</u> **</b><br>
            &nbsp;&nbsp;&nbsp;&nbsp;1. .......................................................... กลุ่มเรียน ...............<br>
            &nbsp;&nbsp;&nbsp;&nbsp;2. .......................................................... กลุ่มเรียน ...............<br>
            &nbsp;&nbsp;&nbsp;&nbsp;3. .......................................................... กลุ่มเรียน ...............<br>
            &nbsp;&nbsp;&nbsp;&nbsp;4. .......................................................... กลุ่มเรียน ...............<br>
            &nbsp;&nbsp;&nbsp;&nbsp;5. .......................................................... กลุ่มเรียน ...............<br>
            &nbsp;&nbsp;&nbsp;&nbsp;6. .......................................................... กลุ่มเรียน ...............<br>
            &nbsp;&nbsp;&nbsp;&nbsp;7. .......................................................... กลุ่มเรียน ...............<br>
            &nbsp;&nbsp;&nbsp;&nbsp;8. .......................................................... กลุ่มเรียน ...............<br>
            &nbsp;&nbsp;&nbsp;&nbsp;9. .......................................................... กลุ่มเรียน ...............<br>
            &nbsp;&nbsp;&nbsp;&nbsp;10. .......................................................... กลุ่มเรียน ...............<br>
        </td>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ความเห็นของงานทะเบียนนิสิตและประมวลผลการศึกษา<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เรียน อธิการบดี<br>
            &nbsp;&nbsp;&nbsp;&nbsp;เพื่อโปรดพิจารณาอนุมัติ การขอคืนสภาพและลงทะเบียน/<br>
            &nbsp;&nbsp;&nbsp;&nbsp;รักษาสถาพนิสิต ภาคเรียนที่ $semester ทั้งนี้ ชำระค่าปรับสัปดาห์ละ<br>
            &nbsp;&nbsp;&nbsp;&nbsp;................ บาท จำนวน...........สัปดาห์ ที่ กองคลัง อาคารมิ่งขวัญ<br>
            &nbsp;&nbsp;&nbsp;&nbsp;ไม่เกินวันที่......................................................................<br>
            <br><br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(นางสาววาสนา พาใจดี)<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หัวหน้างานทะเบียนนิสิตและประมวลผล
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;ความเห็นคณบดี<br>
            &nbsp;&nbsp;&nbsp;&nbsp;........................................................................................<br>
            &nbsp;&nbsp;&nbsp;&nbsp;........................................................................................<br>
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงนาม...................................... <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............/................/...............</p>
        </td>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;คำสั่งมหาวิทยาลัยนเรศวร <br>
            &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] อนุมัติ <br>
            &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] ไม่อนุมัติ เนื่องจาก............................................ <br>
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(นางสาวจรวยพร สุดสวาสดิ์)<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้อำนวยการกองบริการการศึกษา ปฎิบัติราชการแทน<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อธิการบดีมหาวิทยาลัยนเรศวร
        </td>
    </tr>
    </table>
    <p style='text-align:center;'>
    <u>หมายเหตุ</u> กรณีขอลงทะเบียนล่าช้า นิสิตต้องชำระค่าปรับตามระเบียบของมหาวิทยาลัย ดังนี้ </p><br>

    <table style='width:500px;height:400px;margin-left:auto;margin-right:auto;font-size:20px;'>
    <tr>
        <td style='text-align:center;'><b>สำหรับปริญญาตรี</b></td>
        <td style='text-align:center;'><b>สำหรับบัณฑิตศึกษา</b></td>
    </tr>
    <tr>
        <td>
            ค่าคืนสภาพนิสิต จำนวนเงิน 1,000 บาท<br>
            ค่าปรับล่าช้ารายสัปดาห์ๆ ละ 100 บาท
        </td>
        <td>
            ค่าคืนสภาพนิสิต จำนวนเงิน 2,000 บาท<br>
            ค่าปรับล่าช้ารายสัปดาห์ๆ ละ 200 บาท
        </td>
    </tr>
    <tr>
        <td colspan='2'>
            <u></b>ยื่นคำร้องขอได้ไม่เกิน 5 สัปดาห์</b></u> นับจากวันสุดท้ายของการลงทะเบียนเรียนออนไลน์ <br>
            หรือ เพิ่ม-ถอน รายวิชาโดยไม่ติดอักษร W ในช่วงที่มหาวิทยาลัยกำหนด
        </td>
    </tr>
    </table>
";


$mpdf->writeHTML($data);

$mpdf->Output();

?>