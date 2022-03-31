<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 65000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.php?uploadsuccess");
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }

    // COLOR PICKER FUNCTIONALITY

    // path and name of the file
    $filetxt = 'color.json';

    // check if all form data are submited, else output error message
    if(isset($_POST['color'])) {
    // if form fields are empty, outputs message, else, gets their data
    if(empty($_POST['color'])) {
        echo 'All fields are required';
    }
    else {
        $file = file_get_contents("color.json");
        $data = json_decode($file, true);
        $last_item    = end($data);
        $last_item_id = $last_item['id'];
        // gets and adds form data into an array
        $formdata = array(
            'id'             => ++$last_item_id,
            'img' => $fileDestination,
            'color'=> $_POST['color']
        );

        // path and name of the file
        $filetxt = 'color.json';

        $arr_data = array();        // to store all form data

        // check if the file exists
        if(file_exists($filetxt)) {
        // gets json-data from file
        $jsondata = file_get_contents($filetxt);

        // Get last id
            

        // converts json string into array
        $arr_data = json_decode($jsondata, true);
        }

        // appends the array with new form data
        $arr_data[] = $formdata;

        // encodes the array into a string in JSON format (JSON_PRETTY_PRINT - uses whitespace in json-string, for human readable)
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

        // saves the json string in "color.json" (in "dirdata" folder)
        // outputs error message if data cannot be saved
        if(file_put_contents('color.json', $jsondata)) echo 'Data successfully saved';
        else echo 'Unable to save data in "color.json"';
    }
    }
    else echo 'Form fields not submited';

    $json = '
    {        
        "id": 4,
        "img": "uploads\/62446748c2dcf9.07006618.png",
        "color": "#73ff00"
    }';
    
    $yummy = json_decode($json)
    
    echo $yummy => type //donut
}
