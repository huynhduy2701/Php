<?php
    // $act = "forget";
    // if (isset($_GET['act'])) {
    //     $act = $_GET['act'];
    // }
    // switch ($act) {
    //     case 'forget':
    //         include_once "./View/inputmailforget.php";
    //         break;
    //     case 'forget_action':
    //         # code...
    //         if (isset($_POST['submit'])) {
    //             # code...
    //             $email = $_POST['email'];
    //             $_SESSION['email'] = isset($_SESSION['email']) ? $_SESSION['email'] : array();
    //             //kiểm tra mail này có tồn tại hay không
    //             $user= new user();
    //             $checkUser= $user->checkEmail($email)->rowCount();
    //             if ( $checkUser>0) {
    //                 # code... tạo ra code ngẫu nhiên
    //                 $code=random_int(100000,999999);
    //                 //
    //                 // tạo đối tượng
    //                 $item=array(
    //                     'id'=>$code,
    //                     'email'=>$email,
                        
    //                 );
    //                 $_SESSION['email'][]=$item;
    //                 //tiến hành gởi mail
    //                 $mail = new PHPMailer();
    //                 $mail->CharSet = "utf-8";
    //                 $mail->IsSMTP();
    //                 // enable SMTP authentication
    //                 $mail->SMTPAuth = true;
    //                 // GMAIL username to:
    //                 // $mail->Username = "php22023@gmail.com";//
    //                 $mail->Username = "nlhd.2701@gmail.com"; //
    //                 // GMAIL password
    //                 // $mail->Password = "php22023ngoc";
    //                 // $mail->Password = "awms eoun odzl vquq"; //Phplytest20@php
    //                 $mail->Password = "hjop invp ygyv nexg"; //Phplytest20@php
    //                 $mail->SMTPSecure = "tls";  // ssl
    //                 // sets GMAIL as the SMTP server
    //                 $mail->Host = "smtp.gmail.com";
    //                 // set the SMTP port for the GMAIL server
    //                 $mail->Port = "587"; // 465
    //                 $mail->From = 'nlhd.2701@gmail.com';
    //                 $mail->FromName = 'Cà Phê Sunny';
    //                 // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
    //                 $mail->AddAddress($email, 'reciever_name');
    //                 $mail->Subject = 'Reset Password';
    //                 $mail->IsHTML(true);
    //                 $mail->Body = 'Cấp lại mã code ' . $code . '';
    //                 if ($mail->Send()) {
    //                     echo '<script> alert("Check Your Email and Click on the
    //                         link sent to your email");</script>';
    //                     include "./View/codeforget.php";
    //                 } else {
    //                     echo "Mail Error - >" . $mail->ErrorInfo;
    //                     include "./View/inputmailforget.php";
    //                 }
    //                 // include "./View/resetpw.php";
    //             } else {
    //                 echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
    //                 include "./View/inputmailforget.php";
    //             }
                    

    //             }
            
        
    //         break;
    //         // case "forgetpasss":
    //         //     //$_session 
    //         //     $flag=true;
    //         //     if (isset($_POST['submit_reset'])) {
    //         //         # code...
    //         //         $pass=$_POST['password'];
    //         //         //dò xem pass này có tồn tại trong session không
    //         //         foreach($_SESSION['email'] as $key =>$item){
    //         //             if ($item['id']==$pass) {
    //         //                 $flag=false;
    //         //                 # code...
    //         //                 $emailold=$item['email'];//lấy ra email
    //         //                 //nếu có gắn salf thì ở đây cũng phải gắn
    //         //                 $saltF = "G45a#?";
    //         //                 $saltL = "Td23$%";
    //         //                 $passnew = md5($saltF.$pass.$saltL);
    //         //                 //tiến hành update
    //         //                 $user = new user();
    //         //                 $user->updatePass($emailold,$passnew);
    //         //             }
    //         //         }
    //         //     }
    //         //     else if ( $flag==true){
    //         //      include_once "./View/forgetpasss.php";
                    
    //         //     }
               
    //         //     break;
    //         case "forgetpasss":
    //             echo '<pre>';
    //             var_dump($_SESSION['email']);
    //             echo '</pre>';
    //             $flag = true;
    //             // Kiểm tra nội dung của $_SESSION['email']
    //             if (isset($_POST['submit_reset'])) {
    //                 $pass = $_POST['password'];
    //                 foreach ($_SESSION['email'] as $key => $item) {
    //                     if ($item['id'] == $pass) {
    //                         $flag = false;
    //                         $emailold = $item['email'];
    //                         $saltF = "G45a#?";
    //                         $saltL = "Td23$%";
    //                         $passnew = md5($saltF . $pass . $saltL);
    //                         $user = new user();
    //                         $user->updatePass($emailold, $passnew);
    //                     }
    //                 }
    //             }
    //             if ($flag == true) {
    //                 include_once "./View/forgetpasss.php";
    //             }
    //             break;
           
    //     default:
    //         # code...
    //         break;
    // }
    // controller/forget.php

$act = "forget";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'forget':
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
    case "forgetpass":
       
        if (isset($_POST['submit'])) {
           
            $enteredCode = $_POST['code'];
            $storedCode = $_SESSION['code'];
            // Kiểm tra xem mã có đúng định dạng không (chỉ chấp nhận 6 chữ số)
            if (!preg_match('/^\d{6}$/', $enteredCode)) {
                echo '<script> alert("Mã phải là 6 chữ số. Vui lòng kiểm tra lại.");</script>';
                include "./View/codeforget.php";
                exit; // Dừng thực hiện code tiếp theo
            }
    
            if ($enteredCode == $storedCode) {
                // Nếu mã nhập vào đúng, chuyển hướng sang trang forgetpasss
                // if (isset($_POST['submit_reset'])) {
                    //echo '<script> alert("jjjjjj.");</script>';
                    $pass = $_POST['code'];
                    $email = $_SESSION['email']; // Lấy địa chỉ email từ session
                    $code = $_SESSION['code']; // Lấy code từ session
                   
                    // Kiểm tra email và code tồn tại trong session
                    if ($email && $code && ($code==$pass)) {
                       // echo "helllo";
                        // $flag = false;
                        $user = new user();
                        $saltF = "G45a#?";
                        $saltL = "Td23$%";
                        $passnew = md5($saltF . $pass . $saltL);
                        $check=$user->updatePass($email, $passnew);
                        if($check!==false)
                        {
                            // echo '<script> alert("Nhập Mã Thành Công");</script>';
                            echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "success",
                                title: "Nhập Mã Thành Công",
                                showConfirmButton: false,
                                timer: 1000
                              })
                              setTimeout(function() {
                                window.location.href = "./index.php?action=forget&act=forgetpasss";
                            }, 900); // Chuyển hướng sau 10 giây;;
                            </script>';
                        //    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=forget&act=forgetpasss" />';
                        }
                        else
                        {
                            echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "error",
                                title: "Nhập Mã Thất Bại",
                                showConfirmButton: false,
                                timer: 1000
                              })
                              setTimeout(function() {
                                window.location.href = "./index.php?action=forget&act=codeforge";
                            }, 900); // Chuyển hướng sau 10 giây;;
                            </script>';
                            // echo '<script> alert("Thay Đổi Mật Khẩu ko Thành Công");</script>';
                            // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=forget&act=codeforget" />';
                        }
                        // unset($_SESSION['email']); // Xóa session email sau khi đã sử dụng
                        // unset($_SESSION['code']); // Xóa session code sau khi đã sử dụng
                        
        
                    
                }
        
            }
               
            }
        //include_once "./View/forgetpasss.php";
        break;
    // case "forgetpass_action1":

    //     if (isset($_POST['submit_reset'])) {
    //         $enteredCode = $_POST['code'];
    //         $storedCode = $_SESSION['code'];
    //         // Kiểm tra xem mã có đúng định dạng không (chỉ chấp nhận 6 chữ số)
    //         if (!preg_match('/^\d{6}$/', $enteredCode)) {
    //             echo '<script> alert("Mã phải là 6 chữ số. Vui lòng kiểm tra lại.");</script>';
    //             include "./View/codeforget.php";
    //             exit; // Dừng thực hiện code tiếp theo
    //         }
    
    //         if ($enteredCode == $storedCode) {
    //             // Nếu mã nhập vào đúng, chuyển hướng sang trang forgetpasss
    //             if (isset($_POST['submit_reset'])) {
    //                 $pass = $_POST['password'];
    //                 $email = $_SESSION['email']; // Lấy địa chỉ email từ session
    //                 $code = $_SESSION['code']; // Lấy code từ session
                   
    //                 // Kiểm tra email và code tồn tại trong session
    //                 if ($email && $code) {
    //                     echo "helllo";
    //                     // $flag = false;
    //                     $user = new user();
    //                     $saltF = "G45a#?";
    //                     $saltL = "Td23$%";
    //                     $passnew = md5($saltF . $pass . $saltL);
    //                     $check=$user->updatePass($email, $passnew);
    //                     if($check!==false)
    //                     {
    //                         echo '<script> alert("Thay Đổi Mật Khẩu Thành Công");</script>';
    //                         echo '<meta http-equiv="refresh" content="0;url=./index.php" />';
    //                     }
    //                     else
    //                     {
    //                         echo '<script> alert("Thay Đổi Mật Khẩu ko Thành Công");</script>';
    //                         echo '<meta http-equiv="refresh" content="0;url=./index.php?action=forget&act=forgetpasss" />';
    //                     }
    //                     // unset($_SESSION['email']); // Xóa session email sau khi đã sử dụng
    //                     // unset($_SESSION['code']); // Xóa session code sau khi đã sử dụng
                        
        
    //                 }
    //             }
        
               
               
    //         } else {
    //             // Nếu mã nhập vào không đúng, hiển thị thông báo lỗi và quay lại trang codeforget
    //             // echo '<script> alert("Mã nhập vào không đúng. Vui lòng kiểm tra lại.");</script>';
    //             echo '<script>
    //             Swal.fire({
    //                 position: "top-end",
    //                 icon: "error",
    //                 title: "Mã nhập vào không đúng. Vui lòng kiểm tra lại.",
    //                 showConfirmButton: false,
    //                 timer: 1000
    //               })
    //               setTimeout(function() {
    //                 window.location.href = "./index.php?action=dangnhap";
    //             }, 1000); // Chuyển hướng sau 10 giây;
    //             </script>';
    //             include "./View/codeforget.php";
    //         }
    //     } else {
    //         // Nếu không có mã được nhập, quay lại trang codeforget
    //         include "./View/codeforget.php";
    //     }
       
    //     break;
        case "forgetpasss":
            include_once "./View/forgetpasss.php";
            break;
        case "forgetpass_action":
        //include_once "./View/forgetpasss.php";
        if (isset($_POST['submit_reset'])) {
           
                $pass = $_POST['passwordNew'];
                
                
                
                $email = $_SESSION['email']; // Lấy địa chỉ email từ session
                $code = $_SESSION['code'];// Lấy code từ session;
                $saltF="G45a#?";
                $saltL="Td23$%";
                $code=md5($saltF.$code.$saltL);
                echo $code;
                echo "<br/>";
                // lấy ra pass trong database
                $user = new user();
                $passdb=$user->getPassOld($email);
                echo $passdb[0];
               // Kiểm tra email và code tồn tại trong session
                if (isset($code)) {
                    //echo "hhhhhh";
                   // echo '<script> alert("Tyyyyyy");</script>';
                   
                    $saltF="G45a#?";
                    $saltL="Td23$%";
                    $passnew=md5($saltF.$pass.$saltL);
                    echo $passnew;
                    $checkmk=$user->updatePass($email,$passnew);
                    if($checkmk!==false)
                    {
                        echo '<script>
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Thay Đổi Mật Khẩu Thành Công",
                            showConfirmButton: false,
                            timer: 1000
                          })
                          setTimeout(function() {
                            window.location.href = "./index.php";
                        }, 900); // Chuyển hướng sau 10 giây;;
                        </script>';
                        // echo '<script> alert("Thay Đổi Mật Khẩu Thành Công");</script>';
                       // echo '<meta http-equiv="refresh" content="0;url=./index.php" />';
                    }
                    else
                    {
                        echo '<script>
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Thay Đổi Mật Khẩu Không Thành Công",
                            showConfirmButton: false,
                            timer: 1000
                          })
                          setTimeout(function() {
                            window.location.href = "./index.php?action=forget&act=forgetpasss";
                        }, 900); // Chuyển hướng sau 10 giây;;
                        </script>';
                        // echo '<script> alert("Thay Đổi Mật Khẩu ko Thành Công");</script>';
                        //echo '<meta http-equiv="refresh" content="0;url=./index.php?action=forget&act=forgetpasss" />';
                    }
                    // unset($_SESSION['email']); // Xóa session email sau khi đã sử dụng
                    // unset($_SESSION['code']); // Xóa session code sau khi đã sử dụng
                   
                    // var_dump($passnew);
    
                }
            }
        break;
    default:
        break;
}


?>