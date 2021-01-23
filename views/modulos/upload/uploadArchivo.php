<?php
if (isset($_FILES["file"])&&($_FILES["file"])!="") {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "../../archivos/".$_FILES['file']['name'])) {
        //more code here...
        echo $_FILES['file']['name'];
    } else {
        echo 0;
    }
} else {
    echo 0;
}
