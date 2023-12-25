<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Upvex - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\favicon.ico">

        <!-- App css -->
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="assets\images\logo-light.png" alt="" height="26"></span>
                                    </a>
                                    <p></p>
                                </div>

                                <h5 class="auth-title">Đăng Nhập</h5>

                                <form id="loginForm" action="#">

                                    <div class="form-group">
                                        <p id="error" style="color: #f0643b;" ></p>
                                        <p id="success" style="color: #1d937c;" ></p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email</label>
                                        <input class="form-control" type="email" id="emailaddress" required="" placeholder="Nhập địa chỉ email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Mật khẩu</label>
                                        <input class="form-control" type="password" required="" id="password" placeholder="Nhập mật khẩu">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit"> Đăng nhập </button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <p class="mt-3 text-muted">Hoặc đăng nhập với</p>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Quên mật khẩu?</a></p>
                                <p class="text-muted">Chưa có tài khoản? <a href="./?action=register" class="text-muted ml-1"><b class="font-weight-semibold">Đăng ký</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2023 &copy; Thiết kế bởi <a href="">Upvex</a> 
        </footer>

        <!-- Vendor js -->
        <script src="assets\js\vendor.min.js"></script>

        <!-- App js -->
        <script src="assets\js\app.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
        

        <script>

            $('#loginForm').submit(function(event) {
                    // Chặn hành vi mặc định của form (gửi form)
                    event.preventDefault();

                    // Lấy giá trị từ các trường input
                    var email = $('#emailaddress').val();
                    var password = $('#password').val();

                    const dataSend = {
                        email       : email,
                        password    : password,
                    }

                    // Tiếp tục xử lý dữ liệu, ví dụ: gửi thông tin đăng nhập lên server bằng Ajax
                    $.ajax({
                        type: 'POST',
                        url: './views/client/controller/login.php',
                        data: dataSend,
                        success: function(response) {
                            
                            const res = JSON.parse(response);

                            if(res.error_code == 0){
                                $('#success').text( res.message );
                                $('#error').text('');
                                setTimeout(() => {
                                    window.location.href = './'
                                }, 3000);
                            } else {
                                $('#error').text( res.message );
                                $('#success').text('');
                            }

                        },
                        error: function(error) {
                            // Xử lý lỗi nếu có
                        }
                    });
                });

        </script>
    </body>
</html>