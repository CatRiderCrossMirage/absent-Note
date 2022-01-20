<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- start bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- https://icons.getbootstrap.com/ -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@500&display=swap" rel="stylesheet">

    <link rel = "icon" type = "image/png" size="16x16" href = "pic/html.png">
    <link rel="stylesheet" href="style.css">

    <title>---- NU 6 ----</title>
</head>
<style>
    * {
        font-size: 100%;
        font-family: 'Sarabun', sans-serif;
    }
</style>
<body>
    <div class="container mt-5">

        <form action="nu6PDF.php" class="needs-validation offset-md-3 col-md-6" method="POST" novalidate>
            <h1>แบบการขอเปลี่ยนแปลงการสอนรายวิชา</h1>
            <p>กรุณากรอกข้อมูลในช่องให้ถูกต้องและครบถ้วน หลักจากนั้นกดปุ่มจะได้ไฟล์เอกสาร .pdf</p>
            <div class="row mb-2">
            <div class="form-floating col-md-4">
                    <input type="text" name="studentID" placeholder="รหัสนิสิต" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">รหัสนิสิต</label>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อเต็ม <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-6">
                    <input type="text" name="fullname" placeholder="ชื่อ - สกุล" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">ชื่อ - สกุล</label>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อเต็ม <br><br>
                    </div>
                </div>
                
            </div>
            
            <div class="row mb-2">
            <div class="form-floating col-md-4">
                    <input type="text" name="major" placeholder="ภาควิชา" class="form-control" id="validationSurname" required>
                    <label for="floatingInput">สาขา / ภาควิชา</label>
                    <div class="invalid-feedback">
                        กรุณากรอกสาขา / ภาควิชา <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-2">
                    <input type="text" name="rank" placeholder="ชั้นปี" class="form-control" id="validationSurname" required>
                    <label for="floatingInput">ชั้นปี</label>
                    <div class="invalid-feedback">
                        กรุณากรอกชั้นปี <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-3">
                    <input type="text" name="code" placeholder="รหัสหลักสูตร" class="form-control" id="validationSurname" required>
                    <label for="floatingInput">รหัสหลักสูตร</label>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสหลักสูตร <br><br>
                    </div>
                </div>

                
            </div>

            <div class="row mb-2">
                <div class="form-check-floating col-md-4">
                    <label for="">ระดับปริญญา</label><br>
                    <input type="radio" class="form-check-input" name="degree" value="ตรี" required>
                    <label for="floatingInput">ตรี</label><br>

                    <input type="radio" class="form-check-input" name="degree" value="โท" required>
                    <label for="floatingInput">โท</label><br>

                    <input type="radio" class="form-check-input" name="degree" value="เอก" required>
                    <label for="floatingInput">เอก</label>
                    <div class="invalid-feedback">
                        กรุณาเลือกระดับปริญญา <br>
                    </div>
                </div>

                <div class="form-check-floating col-md">
                    กรุณาเลือกภาคเรียน<br>
                    <label for="">ภาคปกติ</label><br>
                    <input type="radio" class="form-check-input" name="semester" value="ต้น" required>
                    <label for="floatingInput"> ต้น   </label>

                    <input type="radio" class="form-check-input" name="semester" value="ปลาย" required>
                    <label for="floatingInput"> ปลาย   </label>

                    <input type="radio" class="form-check-input" name="semester" value="ฤดูร้อน" required>
                    <label for="floatingInput"> ฤดูร้อน   </label><br>
                    <label for="">ภาคพิเศษ</label><br>
                    <input type="radio" class="form-check-input" name="semester" value="1" required>
                    <label for="floatingInput">1</label>

                    <input type="radio" class="form-check-input" name="semester" value="2" required>
                    <label for="floatingInput">2</label>

                    <input type="radio" class="form-check-input" name="semester" value="3" required>
                    <label for="floatingInput">3</label><br>
                    <div class="invalid-feedback">
                        กรุณาเลือกภาคเรียน <br>
                    </div>
                </div>

            </div>

            <br>
            
            <div class="row mb-2">
                <div class="form-floating col-md-6">
                    <input type="text" name="year" placeholder="ปีการศึกษา" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">ปีการศึกษา</label>
                    <div class="invalid-feedback">
                        กรุณากรอกปีการศึกษา <br><br>
                    </div>
                </div>
            </div><br>

            ข้อมูลรายวิชาที่ต้องการเปลี่ยนแปลงการสอน
            <div class="row mb-2">
                <div class="form-floating col-md-4">
                    <input type="text" name="subCode" placeholder="รหัสวิชา" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">รหัสวิชา</label>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสวิชา <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-4">
                    <input type="text" name="num" placeholder="หน่วยกิต" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">หน่วยกิต</label>
                    <div class="invalid-feedback">
                        กรุณากรอกหน่วยกิต <br><br>
                    </div>
                </div>
                
            </div>
            <div class="row mb-2">
                <div class="form-floating col-md-4">
                    <input type="text" name="subTH" placeholder="ชื่อวิชาภาษาไทย" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">ชื่อวิชาภาษาไทย</label>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อวิชาภาษาไทย <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-4">
                    <input type="text" name="subEN" placeholder="ชื่อวิชาภาษาอังกฤษ" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">ชื่อวิชาภาษาอังกฤษ</label>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อวิชาภาษาอังกฤษ <br><br>
                    </div>
                </div>
                
            </div>
    
           

            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Create PDF</button>
        </form>
    </div>
</body>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script> 
</html>