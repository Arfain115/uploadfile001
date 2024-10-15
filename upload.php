<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check if a file was uploaded
    if (isset($_FILES['uploaded_file'])) {

        // File information
        $upload_dir = 'uploads/';
        $file_name = $_FILES['uploaded_file']['name'];
        $file_tmp = $_FILES['uploaded_file']['tmp_name'];
        $file_size = $_FILES['uploaded_file']['size'];
        $file_error = $_FILES['uploaded_file']['error'];

        // Check if there's no error in the upload
        if ($file_error === 0) {

            // Allowed extensions
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = ['jpg', 'jpeg', 'png'];

            // Validate file extension
            if (in_array($file_ext, $allowed_exts)) {

                // Validate file size (limit: 2MB)
                if ($file_size <= 2000000) {

                    // Unique file name generation
                    $new_file_name = uniqid('', true) . "." . $file_ext;

                    // Move file to 'uploads' folder
                    if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                        echo "<p style='color:green;'>File uploaded successfully!</p>";
                        echo "<img src='uploads/$new_file_name' alt='Uploaded Image'>";
                    } else {
                        echo "<p style='color:red;'>Failed to move the uploaded file.</p>";
                    }
                } else {
                    echo "<p style='color:red;'>File size exceeds 2MB limit.</p>";
                }
            } else {
                echo "<p style='color:red;'>Only JPG, JPEG, and PNG files are allowed.</p>";
            }
        } else {
            echo "<p style='color:red;'>There was an error uploading your file.</p>";
        }
    }
}
