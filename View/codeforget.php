<!-- Password Reset 4 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
  <div class="container ">
    <div class="card border-light-subtle shadow-sm  ">
      <div class="row g-0">
        <div class="col-12 col-md-6 m-auto">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h2 class="h3">Nhập Mã</h2>
                  <!-- <h3 class="fs-6 fw-normal text-secondary m-0">Cung cấp địa chỉ email được liên kết với tài khoản của bạn để khôi phục mật khẩu.</h3> -->
                </div>
              </div>
            </div>
            <!-- <form action="index.php?action=forget&act=forgetpasss" method="post">
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="email" class="form-label">Nhập mã gởi về mail <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="email_forget" id="email" placeholder="Nhập mã code 6 số gởi về mail " required>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary" type="submit" name="submit">Tiếp Tục</button>
                  </div>
                </div>
              </div>
            </form> -->
            <form action="index.php?action=forget&act=forgetpass" method="post">
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="email" class="form-label">Nhập mã gởi về mail <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" maxlenght="6" name="code" id="email" placeholder="Nhập mã code 6 số gởi về mail " required>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary" type="submit" name="submit">Tiếp Tục</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-12 ">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-2 gap-md-4  flex-column flex-md-row justify-content-md-end">
                  <a href="#!" class="link-secondary text-decoration-none ">Login</a>
                  <a href="#!" class="link-secondary text-decoration-none ">Register</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>