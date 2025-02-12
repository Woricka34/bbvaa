<?php
// Check if a file has been uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
    $target_dir = __DIR__ . '/'; // Current directory
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
    $uploadOk = 1;

    // Check if the file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if there were any upload errors
    if ($_FILES['fileToUpload']['error'] > 0) {
        echo "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }

    // Try to upload the file if everything is fine
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
            echo "The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>

<h2>Upload File</h2>

<form action="" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Select file to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
