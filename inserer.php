<?php

require ('model.php');
$image=$_POST["nom"];
$alt=$_POST["alt"];
$libelle=$_POST["libelle"];
$couleur=$_POST["couleur"];
$prix=$_POST["prix"];
$connexion = get_connect();

echo $image;

$target_dir = "../img/";
$entry_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo 'entry file='.$entry_file.'<br/>';
$extension=end(explode(".", $entry_file));

echo 'extension='.$extension.'<br/>';
$target_file = $target_dir .$_POST["nom"] .".".$extension;
$currimage=$_POST["nom"] .".".$extension;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "aA file with the same name already exists. It was be replaced by the new one";
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 99900000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg") {
    echo "Sorry, only JPG are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to " . $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo '<br/>'.$target_file;

insert_produits($currimage,$alt,$libelle,$couleur,$prix,'2018-04-06',$connexion);
//header ("Location: tables.php");
?>