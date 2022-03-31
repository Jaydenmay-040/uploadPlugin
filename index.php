<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plugin</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <label for="colorpicker">Color Picker:</label>
        <input type="color" name="color" id="colorpicker">
        <button type="submit" name="submit">UPLOAD</button>
    </form>

    <div id="banner" style="width: 40%; height: 300px"></div>
</body>
</html>