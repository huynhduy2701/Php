<div class=" my-5 border rounded-3 shadow-lg  bg-body-tertiar">
<form action="index.php?action=dangky&act=dangky_action" method="post">
    <h3 class="text-center my-3">Đăng Kí</h3>
  <!-- 2 column grid layout with text inputs for the first and last names -->
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

  <!-- tên đăng nhập input -->
  <div data-mdb-input-init class="form-outline mb-4">
   <label class="form-label" for="form3Example3">Tên Đăng Nhập </label>
   <input type="text" name="txtuser" id="form3Example4" class="form-control" />
 </div>
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="form3Example3">Email </label>
    <input type="email" name="txtemail" id="form3Example3" class="form-control" />
  </div>
  <!-- Địa chỉ -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="form3Example3">Địa Chỉ </label>
    <input type="text" name="diachi" id="form3Example5" class="form-control" />
  </div>
<!-- số điện thoại input -->
<div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="form3Example3">Số Điện Thoại </label>
    <input type="text" name="sodienthoai" id="form3Example6" class="form-control" />
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="form3Example4">Mật Khẩu</label>
    <input type="password" name="password" id="form3Example7" class="form-control" />
  </div>
<!-- Password input -->
<div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="form3Example4">Nhập Lại Mật Khẩu</label>
    <input type="password" id="form3Example8" name="retypepassword" class="form-control" />
  </div>

  <!-- Submit button -->
  <button  type="submit" class="btn btn-primary  mb-4 form-control " name="submit">Đăng Kí</button>
  <div class="d-flex  justify-content-center mb-3">
    <p class="mb-0">Have an account? <a href="index.php?action=dangnhap" class="text-black-50 fw-bold">Login Up</a>
    </p>
  </div>
</form>
</div>