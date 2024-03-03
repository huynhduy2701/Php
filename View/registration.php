<div class="my-5 border rounded-3 shadow-lg bg-body-tertiar">
    <form action="index.php?action=dangky&act=dangky_action" method="post" name="registerForm" onsubmit="return validateForm()">
        <h3 class="text-center my-3">Đăng Kí</h3>
        <div class="row mb-4">
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example1">Họ</label>
                    <input type="text" name="hokh" id="form3Example1" class="form-control" />
                </div>
            </div>
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example2">Tên</label>
                    <input type="text" name="tenkh" id="form3Example2" class="form-control" />
                </div>
            </div>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Tên Đăng Nhập </label>
            <input type="text" name="txtuser" id="form3Example4" class="form-control" />
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form3Example4">Email </label>
            <input type="text" name="txtemail" id="form3Example3" class="form-control" />
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Địa Chỉ </label>
            <input type="text" name="diachi" id="form3Example5" class="form-control" />
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form3Example6">Số Điện Thoại </label>
            <input type="text" name="sodienthoai" id="form3Example6" class="form-control" />
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form3Example7">Mật Khẩu</label>
            <input type="password" name="password" id="form3Example7" class="form-control" />
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form3Example8">Nhập Lại Mật Khẩu</label>
            <input type="password" id="form3Example8" name="cfpassword" class="form-control" />
        </div>

        <button type="submit" class="btn btn-primary mb-4 form-control" name="submit">Đăng Kí</button>

        <div class="d-flex justify-content-center mb-3">
            <p class="mb-0">Have an account? <a href="index.php?action=dangnhap" class="text-black-50 fw-bold">Login Up</a></p>
        </div>
    </form>
</div>

<script>
    function validateForm() {
        var hoKh = document.forms["registerForm"]["hokh"].value;
        var tenKh = document.forms["registerForm"]["tenkh"].value;
        var username = document.forms["registerForm"]["txtuser"].value;
        var email = document.forms["registerForm"]["txtemail"].value;
        var diaChi = document.forms["registerForm"]["diachi"].value;
        var soDienThoai = document.forms["registerForm"]["sodienthoai"].value;
        var password = document.forms["registerForm"]["password"].value;
        var retypePassword = document.forms["registerForm"]["cfpassword"].value;

        if (hoKh == "" || tenKh == "" || username == "" || email == "" || diaChi == "" || soDienThoai == "" || password == "" || retypePassword == "") {
            Swal.fire({
                position: "top-center",
                icon: "error",
                title: "Vui lòng điền đầy đủ thông tin.",
                showConfirmButton: false,
                timer: 1000
            });
            return false;
        }

        if (password != retypePassword) {
            Swal.fire({
                position: "top-center",
                icon: "error",
                title: "Mật khẩu không trùng khớp.",
                showConfirmButton: false,
                timer: 1000
            });
            return false;
        }

        var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!email.match(emailPattern)) {
            Swal.fire({
                position: "top-center",
                icon: "error",
                title: "Email không hợp lệ",
                showConfirmButton: false,
                timer: 1000
            });
            return false;
        }

        var phonePattern = /^\d{10}$/;
        if (!soDienThoai.match(phonePattern)) {
            Swal.fire({
                position: "top-center",
                icon: "error",
                title: "Số điện thoại không hợp lệ.",
                showConfirmButton: false,
                timer: 1000
            });
            return false;
        }

        return true;
    }
</script>
