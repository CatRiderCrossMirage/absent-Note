<?php

require_once __DIR__ . '/vendor/autoload.php'; 

//grab variable
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

$subject = $_POST['subject'];
$semester = $_POST['semester'];
$yearDegree = $_POST['yearDegree'];
$degree = $_POST['degree'];
$studentID = $_POST['studentID'];
$fullname = $_POST['fullname'];
$major = $_POST['major'];
$tell = $_POST['tell'];
$email = $_POST['email'];

$Numyear = $_POST['Numyear'];
$yearStart = $_POST['yearStart'];
$semesterStart = $_POST['semesterStart'];
$yearEnd = $_POST['yearEnd'];
$semesterEnd = $_POST['semesterEnd'];
$document = $_POST['document'];
$namehos = $_POST['namehos'];
$motiveBecuase = $_POST['motiveBecuase'];


$dateWrite = $_POST['dateWrite'];

$dateWriteSplite = explode("-",$dateWrite);
$monthName = $monthArr[$dateWriteSplite[1]];
$year = $dateWriteSplite[0]+543;

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
            'I' => 'THSarabunNew-Italic.ttf',
            'B' => 'THSarabunNew-Bold.ttf',
            'BI' => 'THSarabunNew-BoldItalic.ttf',
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
            <td style='border: none;text-align:center;'><img src='img/NULOGO.PNG' height='90'></td>
            <td style='border: none;text-align:center;padding-left:50px;'>
                <b><p style='text-align:center;font-size:28px;'>
                มหาวิทยาลัยนเรศวร<br>
                คำร้องทั่วไป</p></b><br>
                <p style='text-align:center;font-size:20px;'>
                ภาคการศึกษา $semester &nbsp; ปีการศึกษา $yearDegree  </p>
            </td>
            <td style='border: none;text-align:center;'><img src='img/NU17logo.PNG' height='60'>
            <p style='text-align:right; font-size:20px;'>
            วันที่&nbsp;&nbsp;$dateWriteSplite[2]  เดือน  $monthName พ.ศ.&nbsp;&nbsp; $year <br>
            ระดับปริญญา $degree <br>
            รหัสประจำตัวนิสิต $studentID </p>
            </td>
        </tr>
    </table>
    
    
    <p style='font-size:17px;'>  
    เรียน     อธิการบดี <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้าพเจ้า $fullname 
    คณะ สถาปัตยกรรมศาสตร์ ศิลปะและการออกแบบ <br>
    สาขาวิชา $major โทร $tell Email $email <br>
    มีความประสงค์ขอพักการศึกษา จำนวน $Numyear ภาคเรียน ตั้งแต่ภาคเรียน $yearStart ปีการศึกษา $semesterStart ถึง ภาคเรียน $yearEnd ปีการศึกษา $semesterEnd <br>
    พร้อมได้แนบหลักฐาน &nbsp;&nbsp;&nbsp; $document &nbsp;&nbsp;  $namehos ลงวันที่ ..............................<br>
    เนื่องจาก $motiveBecuase &nbsp;&nbsp;&nbsp;&nbsp;
    เมื่อครบกำหนดการขอลาพักการศึกษาแล้่ว ข้าพเจ้าจะลงทะเบียนเรียนในภาคการศึกษาถัดไป หากข้าพเจ้าขอลาพักการศึกษา มากกว่า 1 ภาคการศึกษา ข้าพเจ้าจะรักษาสภาพในระบบทะเบียนออนไลน์ ตามปฏิทินการศึกษาของมหาสิทยาลัยกำหนดต่อไป <br>
    
    จึงเรียนมาเพื่อโปรดพิจารณา <br>
    
    </p>

    

    <p style='text-align:right;font-size:17px;'>
    นิสิตลงนาม.................................................<br>
    ...................../..................../...................
    </p>

    <p style='text-align:center; font-size:17px;'> 
    ข้าพเจ้า ........................................................................ ในฐานะผู้ปกครอง <br>
    ยินยอมและเห็นควรให้ $fullname (ลาพักการศึกษา)
    </p>



<div class='row'>
    <div class='col'>
        <table>
            <tr>
                <td><p style='font-size:17px;'> ความคิดเห็นของอาจารย์ที่ปรึกษา <br>
                    ..........................................................................................................<br>
                    ..........................................................................................................<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงนาม ....................................<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(......................................)<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............/.........../..........</p>
                    
                </td>
                <td><p style='font-size:17px;'><br>
                    &nbsp;&nbsp;&nbsp;&nbsp; ความคิดเห็นของงานทะเบียนนิสิตและประมวลผลการศึกษา' <br>
                    ..........................................................................................................<br>
                    ..........................................................................................................<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (นางวาสนา พาใจดี) <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; หัวหน้างานทะเบียนนิสิตและประมวลผล <br>
                    
                </td>
            </tr>
            <tr>
                <td><p style='font-size:17px;'>
                &nbsp;&nbsp;&nbsp;&nbsp; ความคิดเห็นของคณบดีที่นิสิตสังกัด <br>
                ..........................................................................................................<br>
                ..........................................................................................................<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงนาม ....................................<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(......................................)<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............/.........../..........</p>
                
                </td>
                <td><p style='font-size:17px;'>
                    &nbsp;&nbsp;&nbsp;&nbsp;คำสั่งมหาวิทยาลัยนเรศวร <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] เห็นชอบและดำเนินการต่อไป <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] ไม่เห็นชอบ เนื่องจาก..................................................... <br><br><br>
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(นางสาวจรวยพร สุดสวาสดิ์) <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้อำนวยการกองบริการศึกษา ปฏิบัติราชการแทน<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; อธิการบดีมหาวิทยาลัยนเรศวร</p>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <p style='font-size:17px;'>
                    &nbsp;&nbsp;&nbsp;&nbsp;สำหรับเจ้าหน้าที่งานทะเบียนฯ (กบศ.) <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] เพื่อโปรดทราบ <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] เพื่อโปรดดำเนินการต่อไป <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] เพื่อเก็บไว้เป็นหลักฐาน <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] อืนๆ ................................. <br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงนาม ....................................<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;......../.........../..........</p>
                </td>
            </tr>
        </table>
    </div>
</div>
";


$mpdf->writeHTML($data);

$mpdf->Output();

?>