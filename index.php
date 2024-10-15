<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative File Upload</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="title">Upload Your Image!</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="file-upload">
                <label for="file" class="custom-file-upload">
                    <i class="fas fa-cloud-upload-alt"></i> Choose Image
                </label>
                <input type="file" name="uploaded_file" id="file" accept="image/*">
            </div>

            <button type="submit" class="btn-submit">Upload</button>

            <div class="message">
                <?php include 'upload.php'; ?>
            </div>
        </form>
    </div>
</body>

</html>