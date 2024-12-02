<?php
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $content = "Kontaktformular Eingabe:\n";
    $content .= "Vorname: " . ($data['vorname'] ?? 'N/A') . "\n";
    $content .= "Name: " . ($data['name'] ?? 'N/A') . "\n";
    $content .= "E-Mail: " . ($data['email'] ?? 'N/A') . "\n";
    $content .= "Telefon: " . ($data['telefon'] ?? 'N/A') . "\n";
    $content .= "Betreff: " . ($data['betreff'] ?? 'N/A') . "\n";
    $content .= "Beschreibung: " . ($data['beschreibung'] ?? 'N/A') . "\n";
    $content .= "------------------------\n";

    $timestamp = date("Y-m-d_H-i-s");
    $file = __DIR__ . "/submissions/Kontaktformular_$timestamp.txt";

    if (file_put_contents($file, $content)) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Data saved successfully.", "file" => $file]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to save data."]);
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "No data received."]);
}
