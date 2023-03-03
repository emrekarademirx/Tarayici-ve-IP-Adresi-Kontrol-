<?php

session_start();

$user_email = "example@email.com"; // kullanıcının kayıtlı e-posta adresi
$user_agent = $_SERVER['HTTP_USER_AGENT']; // kullanıcının tarayıcı tipi
$user_ip = $_SERVER['REMOTE_ADDR']; // kullanıcının IP adresi

if (!isset($_SESSION['user_agent']) || $_SESSION['user_agent'] != $user_agent || !isset($_SESSION['user_ip']) || $_SESSION['user_ip'] != $user_ip) {
    // kullanıcının tarayıcı tipi veya IP adresi değişti
    $_SESSION['user_agent'] = $user_agent;
    $_SESSION['user_ip'] = $user_ip;

    $subject = "Güvenlik Uyarısı: Farklı Tarayıcı veya IP Adresinden Giriş Yapıldı";
    $message = "Sayın Kullanıcı,\n\n";
    $message .= "Hesabınız " . date("d-m-Y H:i:s") . " tarihinde farklı bir tarayıcı veya IP adresinden kullanılmıştır.\n";
    $message .= "Eğer bu siz değilseniz, hesabınızın güvenliği için lütfen hesabınızı kapatın veya şifrenizi değiştirin.\n\n";
    $message .= "Aşağıdaki bilgiler kullanılarak giriş yapıldı:\n";
    $message .= "IP Adresi: " . $user_ip . "\n";
    $message .= "Tarayıcı Tipi: " . $user_agent . "\n\n";
    $message .= "Saygılarımızla,\n";
    $message .= "Emre Karademir\n";
    $message .= "Web sitesi: emrekarademir.com\n";
    $message .= "GitHub: emrekarademirx\n";
    $headers = "From: noreply@emrekarademir.com\r\n";

    // e-posta gönder
    mail($user_email, $subject, $message, $headers);
}

// diğer kodlarınız

?>
