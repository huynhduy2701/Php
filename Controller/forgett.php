<?php
$act = "forgett";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'forgett':
        # code...
        include_once "./View/inputmailforget.php";
        break;
        case 'forget_action':
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $_SESSION['email'] = $email; // Lưu trực tiếp địa chỉ email vào session
                $user = new user();
                $checkUser = $user->checkEmail($email)->rowCount();
    
                if ($checkUser > 0) {
                    $code = random_int(100000, 999999);
                    $_SESSION['code'] = $code; // Lưu code vào session
                    
                    $mail = new PHPMailer();
                    $mail->CharSet = "utf-8";
                                    $mail->IsSMTP();
                                    // enable SMTP authentication
                                    $mail->SMTPAuth = true;
                                    // GMAIL username to:
                                    // $mail->Username = "php22023@gmail.com";//
                                    $mail->Username = "nlhd.2701@gmail.com"; //
                                    // GMAIL password
                                    // $mail->Password = "php22023ngoc";
                                    // $mail->Password = "awms eoun odzl vquq"; //Phplytest20@php
                                    $mail->Password = "hjop invp ygyv nexg"; //Phplytest20@php
                                    $mail->SMTPSecure = "tls";  // ssl
                                    // sets GMAIL as the SMTP server
                                    $mail->Host = "smtp.gmail.com";
                                    // set the SMTP port for the GMAIL server
                                    $mail->Port = "587"; // 465
                                    $mail->From = 'nlhd.2701@gmail.com';
                                    $mail->FromName = 'Cà Phê Sunny';
                                    // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                                    $mail->AddAddress($email, 'reciever_name');
                                    $mail->Subject = 'Reset Password';
                                    $mail->IsHTML(true);
                                    $mail->Body = 'Cấp lại mã code đổi mật khẩu của bạn là : <a href="#">' . $code . '</a>';
                                    
                    
                    if ($mail->Send()) {
                        
                        // echo '<script> alert("Vui lòng kiểm tra mã gởi về trong mail bạn");</script>';
                        echo '<script>
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Vui lòng kiểm tra mã gởi về trong mail bạn",
                            showConfirmButton: false,
                            timer: 1000
                          })
                           // Chuyển hướng sau 10 giây;;
                        </script>';
                        include "./View/codeforget.php";
                        
                    } else {
                        echo "Mail Error - >" . $mail->ErrorInfo;
                        include "./View/inputmailforget.php";
                    }
                } else {
    
                    // echo '<script> alert("Địa chỉ mail không tồn tại");</script>';
                    echo '<script>
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: "Địa chỉ mail không tồn tại",
                            showConfirmButton: false,
                            timer: 1000
                          })
                           // Chuyển hướng sau 10 giây;;
                        </script>';
                    include "./View/inputmailforget.php";
                }
            }
            break;
            case 'forgett_pass' :
                if (isset($_POST['submit'])) {
                    $enteredCode = $_POST['code'];
                    $storedCode = $_SESSION['code'];
       
                    // Kiểm tra xem mã nhập vào có đúng không
                    if ($enteredCode == $storedCode) {
                        // Nếu đúng, chuyển hướng đến trang nhập email lại
                        echo '<script>
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Nhập Mã Thành Công",
                            showConfirmButton: false,
                            timer: 1000
                          })
                           // Chuyển hướng sau 10 giây;;
                        </script>';
                    include "./View/forgetpasss.php";
                    } else {
                        // Nếu sai, hiển thị thông báo lỗi và cho người dùng nhập lại
                        echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "error",
                                title: "Mã không đúng. Vui lòng kiểm tra lại.",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        </script>';
                        include_once "./View/codeforget.php";
                    }
                }
             
                break;
                case 'forgetpass_action':
                    if (isset($_POST['submit_reset'])) {
                        # code...
                        $pass = $_POST['passwordNew'];
                        $pass2 = $_POST['passwordNew2'];
                        if ($pass!==$pass2) {
                            # code...
                            echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "error",
                                title: "Mật Khẩu Không Trùng.",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        </script>';
                        // echo "<script>alert('aa')</script>";
                        include_once "./View/forgetpasss.php";
                            
                        }
                        else{
                            $user = new user();
                            $pass = $_POST['passwordNew'];
                            $saltF = "G45a#?";
                            $saltL = "Td23$%";
                            $passnew = md5($saltF . $pass . $saltL);
                            $check=$user->updatePass($_SESSION['email'],$passnew);
                            // echo "<script>alert('aavvv')</script>";
                            echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "success",
                                title: "Mật Khẩu Được Thay Đổi.",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        </script>';
                     include_once "./View/home.php";
                        }
                       
                    }
                    break;
    default:
        # code...
        break;
}
?>