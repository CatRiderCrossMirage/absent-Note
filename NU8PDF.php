<?php

require_once __DIR__ . '/vendor/autoload.php'; 

// grab variable
$major = $_POST['major'];
$semester = $_POST['semester'];
$yearDegree = $_POST['yearDegree'];
$degree = $_POST['degree'];
$studentID = $_POST['studentID'];
$fullname = $_POST['fullname'];
$tell = $_POST['tell'];
$email = $_POST['email'];
$address = $_POST['address'];
$document = $_POST['document'];
$numsub = $_POST['numsub'];

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
            คำร้องขอเพิ่มรายวิชาหลังกำหนด</b><br> 
            ภาคการศึกษาที่ $semester ปีการศึกษา $yearDegree
            </p>
        </td>
        <td style='border: none;text-align:right;'>
            <img src='pic/NU8logo.png' height='60'>
            วันที่ $dateWriteSplite[2] เดือน $monthName ปี $year <br>
            ระดับปริญญา$degree <br>
            รหัสประจำตัวนิสิต $studentID
        </td>
    </tr>
    </table>
    <p style='text-align:left;padding-left:80px;font-size:20px;'><b>เรียน</b> อธิการบดี<br></p>
    <p style='text-align:left;padding-left:100px;font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;<b>ข้าพเจ้า</b>&nbsp;&nbsp;$fullname &nbsp;&nbsp;&nbsp;&nbsp; 
    <b>คณะ</b>&nbsp;&nbsp;สถาปัตยกรรมศาสตร์&nbsp;&nbsp;&nbsp;&nbsp; <br> <b>สาขาวิชา</b>&nbsp;&nbsp; $major &nbsp;&nbsp;&nbsp;&nbsp; <b>โทร</b>&nbsp;&nbsp; $tell &nbsp;&nbsp;&nbsp;&nbsp;  <b>E-mail</b> &nbsp;&nbsp; $email <br>
    <b>ที่อยู่ที่สามารถติดต่อได้</b> &nbsp;&nbsp; $address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
    <b>โดยมีความประสงค์เพื่อ</b>&nbsp;&nbsp; $document &nbsp;&nbsp;&nbsp; <b>จำนวน</b>&nbsp;&nbsp; $numsub &nbsp;<b>รายวิชา</b>&nbsp; โดยชำระค่าปรับ <br>
    ระบุรหัสวิชา &nbsp;&nbsp; 1.&nbsp;.................... &nbsp;&nbsp; กลุ่มเรียน &nbsp;.......... &nbsp;&nbsp; กลุ่มเรียนใหม่ &nbsp;(กรณีขอเปลี่ยนกลุ่มเรียน).............  <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.&nbsp;.................... &nbsp;&nbsp; กลุ่มเรียน &nbsp;.......... &nbsp;&nbsp; กลุ่มเรียนใหม่ &nbsp;(กรณีขอเปลี่ยนกลุ่มเรียน).............  <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.&nbsp;.................... &nbsp;&nbsp; กลุ่มเรียน &nbsp;.......... &nbsp;&nbsp; กลุ่มเรียนใหม่ &nbsp;(กรณีขอเปลี่ยนกลุ่มเรียน).............  <br>
    
    ทั้งนี้&nbsp;ได้แนบเอกสาร&nbsp;NU6&nbsp;มาเพื่อประกอบการพิจารณาขอเพิ่มรายวิชาด้วยแล้ว<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจารณา</p>
    <p style='text-align:right;'>
    นิสิตลงนาม ................................................</p>
    

<div class='row'>
    <div class='col'>
        <table>
            <tr>
                <td><p style='font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp; ความคิดเห็นของคณบดีที่นิสิตสังกัด<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;..........................................................................................................<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;..........................................................................................................<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงนาม ....................................<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;......../.........../..........</p>
                    
                </td>
                <td><p style='font-size:20px;'><br>
                    &nbsp;&nbsp;&nbsp;&nbsp; คำสั่งมหาวิทยาลัยนเรศวร <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] อนุมัติ <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] ไม่อนุมัติ &nbsp;&nbsp;&nbsp;&nbsp; เนื่องจาก &nbsp;&nbsp; .............................<br><br>
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(นางสาวจรวยพร&nbsp;&nbsp;&nbsp;สุดสวาสดิ์)<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้อำนวยการกองบริการการศึกษา&nbsp;&nbsp;&nbsp;ปฏิบัติราขการแทน&nbsp;&nbsp;&nbsp;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อธิการบดีมหาวิทยาลัยนเรศวร</p>
                </td>
            </tr>
            <tr>
                <td><p style='font-size:20px;'>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp; ความคิดเห็นของงานทะเบียนฯ<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เรียน&nbsp;&nbsp;อธิการบดี <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เพื่อโปรดพิจารณาอนุมัติ <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การขอเพิ่มรายวิชาหลังกำหนด&nbsp;&nbsp; โดยชำระค่าปรับสัปดาห์ละ.................บาท <br>&nbsp;&nbsp;&nbsp;&nbsp;จำนวน................สัปดาห์
                    &nbsp;&nbsp;&nbsp;ทั้งนี้  &nbsp;&nbsp;&nbsp; ชำระค่าปรับไม่เกินวันที่ ...........................
                    <br>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(นางวาสนา&nbsp;&nbsp;&nbsp;พาใจดี)<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หัวหน้างานทะเบียนนิสิตและประมวลผล&nbsp;&nbsp;&nbsp;</p>
                </td>
                <td><p style='font-size:20px;'><br>
                    &nbsp;&nbsp;&nbsp;&nbsp; สำหรับเจ้าหน้าที่งานทะเบียน <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] เพื่อโปรดทราบ <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] เพื่อโปรดดำเนินการต่อไป <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] เพื่อเก็บไว้เป็นหลักฐาน <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;] อื่นๆ.................................................... <br>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงนาม ....................................<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.........................................)<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;......../.........../..........</p>
                </td>
            </tr>
        </table>
        <p style='font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;<b>หมายเหตุ</b>&nbsp;&nbsp;กรณีขอเพิ่มรายวิชาหลังกำหนดโดยชำระค่าปรับ สามารถดำเนินการได้ระยะเวลา 5 สัปดาห์ <br>หลังจากหมดเขตการเพิ่ม-ถอน รายวิชาตามปฏิทินการศึกษาของมหาวิทยาลัยนเรศวร โดยนิสิตต้องแนบ <br>เอกสาร<b>NU6</b>ผ่านอาจารย์ผู้สอนรายวิชานั้นๆ และคณบดีพิจารณาอนุมัติการขอเพิ่มรายวิชามาก่อน
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;หากนิสิตไม่แนบเอกสาร<b>NU6</b>ตามระเบียบฯ&nbsp;งานทะเบียนฯ&nbsp;จะไม่รับพิจารณาดำเนินการต่อไป&nbsp;** 
    </div>
</div>
";


$mpdf->writeHTML($data);

$mpdf->Output();

?>