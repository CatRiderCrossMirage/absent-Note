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

    <title>----Absent note----</title>
</head>
<style>
    * {
        font-size: 100%;
        font-family: 'Sarabun', sans-serif;
    }
</style>
<body>
    <div class="container mt-5">

        <form action="absentPDF.php" class="needs-validation offset-md-3 col-md-6" method="POST" novalidate>
            <h1>แบบใบลาป่วย กิจส่วนตัว และคลอดบุตร</h1>
            <p>กรุณากรอกข้อมูลในช่องให้ถูกต้องและครบถ้วน หลักจากนั้นกดปุ่มจะได้ไฟล์เอกสาร .pdf</p>
            <div class="row mb-2">
                <div class="form-floating col-md-4">
                    <input type="date" name="dateWrite" placeholder="วัน/เดือน/ปี" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">วันที่</label>
                    <div class="invalid-feedback">
                        กรุณากรอกวันที่จะลา <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-8">
                    <input type="text" name="subject" placeholder="เรื่อง" class="form-control" id="validationSurname" required>
                    <label for="floatingInput">เรื่อง</label>
                    <div class="invalid-feedback">
                        กรุณากรอกเรื่องที่จะลา <br><br>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="form-floating col-md-6">
                    <input type="text" name="fullname" placeholder="ชื่อเต็ม" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">คำนำหน้าและชื่อเต็ม</label>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อเต็ม <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-6">
                    <input type="text" name="jobTitle" placeholder="ตำแหน่งงาน" class="form-control" id="validationSurname" required>
                    <label for="floatingInput">ตำแหน่งงาน</label>
                    <div class="invalid-feedback">
                        กรุณากรอกตำแหน่งงาน <br><br>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-2">
                <input type="text" name="belongTo" placeholder="สังกัด" class="form-control" id="validationBelong" required>
                <label for="floatingInput">สังกัด</label>
                <div class="invalid-feedback">
                    กรุณากรอกสังกัด <br><br>
                </div>
            </div>
            
            <div class="row mb-2">
                
                <div class="form-check-floating col-md-2">
                    <label for="">สาเหตุการลา</label><br>
                    <input type="radio" class="form-check-input" name="motive" value="ป่วย" required>
                    <label for="floatingInput">ลาป่วย</label><br>

                    <input type="radio" class="form-check-input" name="motive" value="กิจส่วนตัว" required>
                    <label for="floatingInput">กิจส่วนตัว</label><br>

                    <input type="radio" class="form-check-input" name="motive" value="คลอดบุตร" required>
                    <label for="floatingInput">คลอดบุตร</label>
                    <div class="invalid-feedback">
                        กรุณาเลือกสาเหตุการลา <br>
                    </div>
                </div>

                <div class="form-floating col-md-10" style="margin-top:1.5rem;">
                    <textarea type="message" name="motiveBecuase" placeholder="เนื่องจาก" class="form-control" id="validationMessage"required></textarea>
                    <label for="floatingInput">เนื่องจาก</label>
                    <div class="invalid-feedback">
                        กรุณากรอกสาเหตุการลา <br>
                    </div>
                </div>
            </div>
            <!-- วันที่จะลาจริงๆ -->
            กรุณากรอกวันที่ลา และจำนวนวัน
            <div class="row mb-2">
                <div class="form-floating col-md-4">
                    <input type="date" name="dateStartAbsent" placeholder="วัน/เดือน/ปี" class="form-control" id="validationDate"  required>
                    <label for="floatingInput">ลาตั้งแต่วันที่</label>
                    <div class="invalid-feedback">
                        กรุณากรอกวันที่จะลา <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-4">
                    <input type="date" name="dateEndAbsent" placeholder="วัน/เดือน/ปี" class="form-control" id="validationDate2"  required>
                    <label for="floatingInput">ลาถึงวันที่</label>
                    <div class="invalid-feedback">
                        กรุณากรอกวันที่จะลา <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-4">
                    <input type="text" name="numDate" placeholder="จำนวนวัน" class="form-control" id="validationnumDate" required>
                    <label for="floatingInput">จำนวนวัน</label>
                    <div class="invalid-feedback">
                        กรุณากรอกจำนวนวันที่ลา <br><br>
                    </div>
                </div>
            </div>
            <!-- วันที่ลาครั้งก่อน -->
            ลาครี่งสุดท้ายตั้งแต่วันที่
            <div class="row mb-2">
                <div class="form-floating col-md-4">
                    <input type="date" name="dateStartAbsentl" placeholder="วัน/เดือน/ปี" class="form-control" id="validationDatel"  required>
                    <label for="floatingInput">ลาตั้งแต่วันที่</label>
                    <div class="invalid-feedback">
                        กรุณากรอกวันที่จะลา <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-4">
                    <input type="date" name="dateEndAbsentl" placeholder="วัน/เดือน/ปี" class="form-control" id="validationDatel2"  required>
                    <label for="floatingInput">ลาถึงวันที่</label>
                    <div class="invalid-feedback">
                        กรุณากรอกวันที่จะลา <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-4">
                    <input type="text" name="numDatel" placeholder="จำนวนวัน" class="form-control" id="validationnumDatel" required>
                    <label for="floatingInput">จำนวนวัน</label>
                    <div class="invalid-feedback">
                        กรุณากรอกจำนวนวันที่ลา <br><br>
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