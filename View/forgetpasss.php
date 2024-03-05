<section class="vh-100" >
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Cập Nhật Password</p>

                <!-- <form class="mx-1 mx-md-4" method="post">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" placeholder="Nhập password mới" name="password" id="form3Example4c" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <input type="password" placeholder="Nhập lại password mới" id="form3Example4cd" class="form-control" />
                    </div>
                  </div>

                 

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" name="submit_reset" class="btn btn-primary btn-lg" value="Cập Nhật"></input>
                  </div>

                </form> -->
                <form class="mx-1 mx-md-4" action="index.php?action=forget&act=forgetpass_action" method="post">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" placeholder="Nhập password mới" name="passwordNew" id="form3Example4c" class="form-control" />
                      

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <input type="password" placeholder="Nhập lại password mới" id="form3Example4cd" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" name="submit_reset" class="btn btn-primary btn-lg" value="Cập Nhật"></input>
                  </div>
                </form>

              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
    /* Thêm CSS này vào stylesheet hoặc trong tài liệu HTML của bạn */

    /* Kiểu cho các trường nhập mật khẩu */
    input[type="password"] {
        border: 2px solid #ced4da;
        border-radius: 0.375rem;
        padding: 0.75rem;
        width: 100%;
        margin-bottom: 1rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    /* Kiểu để chỉ ra mật khẩu khớp đúng */
    .password-match {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 0.75rem;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }

    /* Kiểu để chỉ ra mật khẩu không khớp */
    .password-not-match {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 0.75rem;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Thêm đoạn mã này vào tài liệu HTML của bạn -->
<script>
    $(document).ready(function () {
        $('input[type="password"]').on('input', function () {
            var password1 = $('#form3Example4c').val();
            var password2 = $('#form3Example4cd').val();

            if (password1 === password2 && password1 !== '' && password2 !== '') {
                $('#form3Example4c, #form3Example4cd').removeClass('password-not-match').addClass('password-match');
            } else {
                $('#form3Example4c, #form3Example4cd').removeClass('password-match').addClass('password-not-match');
            }
        });
    });
</script>