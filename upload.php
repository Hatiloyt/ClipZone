<?php
// Verzeichnis, in dem die Videos gespeichert werden
$targetDir = "uploads/";

// Dateiname mit Timestamp, um Konflikte zu vermeiden
$targetFile = $targetDir . time() . "_" . basename($_FILES["video-upload"]["name"]);

// Der Flag für den Upload
$uploadOk = 1;

// Datei-Typ prüfen (nur Videos erlauben)
$videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if ($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov" && $videoFileType != "mkv") {
    echo "Sorry, nur Video-Dateien (mp4, avi, mov, mkv) sind erlaubt.";
    $uploadOk = 0;
}

// Überprüfen, ob der Upload-Fehler besteht
if ($_FILES["video-upload"]["error"] > 0) {
    echo "Es gab einen Fehler beim Hochladen der Datei.";
    $uploadOk = 0;
}

// Wenn $uploadOk 0 ist, wurde der Upload abgebrochen
if ($uploadOk == 0) {
    echo "Die Datei wurde nicht hochgeladen.";
} else {
    // Versuch, die Datei zu speichern
    if (move_uploaded_file($_FILES["video-upload"]["tmp_name"], $targetFile)) {
        echo "Das Video wurde erfolgreich hochgeladen.";
    } else {
        echo "Es gab einen Fehler beim Speichern des Videos.";
    }
}
?>
