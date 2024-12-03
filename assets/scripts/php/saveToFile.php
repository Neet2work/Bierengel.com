<?php
// saveToFile.php

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    // Format the data as a string
    $content = "Kontaktformular Eingabe:\n";
    $content .= "Vorname: " . ($data['vorname'] ?? 'N/A') . "\n";
    $content .= "Name: " . ($data['name'] ?? 'N/A') . "\n";
    $content .= "E-Mail: " . ($data['email'] ?? 'N/A') . "\n";
    $content .= "Telefon: " . ($data['telefon'] ?? 'N/A') . "\n";
    $content .= "Betreff: " . ($data['betreff'] ?? 'N/A') . "\n";
    $content .= "Beschreibung: " . ($data['beschreibung'] ?? 'N/A') . "\n";
    $content .= "------------------------\n";

    // Generate a unique file name with timestamp and date
    $timestamp = date("Y-m-d_H-i-s"); // Format: YYYY-MM-DD_HH-MM-SS
    $file = __DIR__ ."/submissions/kontaktformular_$timestamp.txt";
    echo "Saving file to: $file\n";


    // Write the content to a new file
    file_put_contents($file, $content);

    // Return a success response
    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "Data saved successfully.", "file" => $file]);
} else {
    // Return an error response
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "No data received."]);
}

