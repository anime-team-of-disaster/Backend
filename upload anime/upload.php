<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    print_r($file);
    $fileName =$_FILES['file']['name'];
    $fileTmpName =$_FILES['file']['tmp_name'];
    $fileSize    =$_FILES['file']['size'];
    $fileError =$_FILES['file']['error'];
    $fileType =$_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf' );

    if (in_array($fileActualExt,$allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination,);

                header("Location: index.php?uploadsuccess");
            } else {
                echo "Kurwa więcej niż 500mb pojebało cię do reszty chcesz nam serwer zapierdolić?";
            }
        } else {
            echo "Nie określony błąd powiedz michałkowi to naprawi. może...";
        }
    } else {
        echo "Nie możesz wrzucić na serwer tego pliku idioto! (o typ chodzi)";
    }

}
    


?>