<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Wenn Composer verwendet wird
require 'vendor/autoload.php';

// Wenn manuell installiert
// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server-Einstellungen
    $mail->isSMTP();                                      // Verwende SMTP
    $mail->Host       = 'smtp.gmail.com';                 // SMTP-Server von Gmail
    $mail->SMTPAuth   = true;                             // SMTP-Authentifizierung aktivieren
    $mail->Username   = 'larsygomasochist.com';                // Gmail-Adresse
    $mail->Password   = 'rfzp whap onfa oijs';              // App-Passwort
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // TLS-Verschlüsselung
    $mail->Port       = 587;                              // SMTP-Port für TLS

    // Absender
    $mail->setFrom('deine@gmail.com', 'Dein Name');
    // Empfänger
    $mail->addAddress('empfaenger@domain.com', 'Empfängername');

    // E-Mail-Inhalt
    $mail->isHTML(true);                                  // HTML-E-Mail
    $mail->Subject = 'Test-E-Mail mit PHPMailer';
    $mail->Body    = '<b>Dies ist eine Testnachricht.</b>';
    $mail->AltBody = 'Dies ist die Textversion der Nachricht.';

    // E-Mail senden
    $mail->send();
    echo 'Nachricht wurde gesendet';
} catch (Exception $e) {
    echo "Nachricht konnte nicht gesendet werden. Fehler: {$mail->ErrorInfo}";
}

