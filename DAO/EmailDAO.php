<?php
include_once 'models/Email.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class EmailDAO
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->cauHinh();
    }
    private function cauHinh()
    {
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 465;
        $this->mail->isHTML(true);
        $this->mail->Username = "theduong2932004@gmail.com";
        $this->mail->Password = "z w b f l z f f r j b l a r l j";
        $this->mail->setFrom("theduong2932004@gmail.com");
        $this->mail->CharSet = 'UTF-8'; // Đặt bộ ký tự thành UTF-8
    }
    public function quenMatKhau($id, $email)
    {
        $htmlContent = file_get_contents('views/taiKhoan/user/QuenMatKhau.php');
        $tieuDe = "Đặt lại mật khẩu";

        // Tạo đường link dẫn
        $linkDanhLaiMatKhau = 'http://localhost/php/Nhom01_WebBanHang_Edubook/index.php?controller=quenMatKhau&datLaiMatKhau&id=' . $id . '&email=' . $email;

        // Thay thế nội dung email với đường link dẫn
        $htmlContent = str_replace("{linkDanhLaiMatKhau}", $linkDanhLaiMatKhau, $htmlContent);

        $this->mail->Subject = mb_encode_mimeheader($tieuDe, "UTF-8", "B");
        $this->mail->Body = $htmlContent;
        $this->mail->addAddress($email);

        if (!$this->mail->send()) {
            echo "Không thể gửi email: " . $this->mail->ErrorInfo;
        }
    }
}
