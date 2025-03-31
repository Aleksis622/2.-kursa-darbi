<?php
require_once 'config.php';

$imageTypes = ['jpg', 'jpeg', 'png', 'gif'];

try {
    $stmt = $conn->query("SELECT * FROM upload_paths");
    $files = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($files) {
        foreach ($files as $file) {
            $filePath = $file['file_path'];
            $fileName = $file['file_name'];
            $fileId = $file['id'];
            $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));// pasaka kads ir faila paplasinajums png,jpg un etc.

            echo "<div class = 'file-card' 'id='file{$fileId}'>";
            //checko vai attiecigais fails ir bilde
            if (in_array($fileExtension, $imageTypes)) {
                // ja jaa tad bildi attelojam ka thumbnail
                echo "<img src = '{$filePath}' alt = '{$fileName}' class = 'thumbnail'><br>";
            } else {
                // ja nav, attelo ka dokumenta ikonu
                echo "<div class = 'file-icon'>📄</div>";
            }
              //Attelojam faila nosaukumu un ari download linku/pogu
            echo "<div>{$fileName}</div>";
            echo "<a href = '{$filePath}' download>Download</a>";//iedod lietotajiem clickable download pogu prieks  attieciga faila
            echo "<button class = 'delete-button' onclick = 'deleteFile({$fileId})'>Delete</button>";// delete poga ar onclick() funkciju
            echo "</div>";
        }
    } else {
        echo "<p>No files uploaded yet.</p>";
    }
} catch (PDOException $e) {
    echo "<p>Error fetching files: " . $e->getMessage() . "</p>";
}

$conn = null;