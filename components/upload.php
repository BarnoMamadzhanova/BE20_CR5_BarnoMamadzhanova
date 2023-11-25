

<?php

    function fileUpload($photo, $source = "users"){
       
        $message = "";

        

        if($photo["error"] == 4){ 
            $photoName = "avatar.png";
            if(isset($_SESSION["user"])){
                $photoName = "avatar.png";
            }
            if($source == "animals"){
                $photoName = "default.png";
            }
            $message = "No picture has been chosen, but you can upload an image later :)";
        }else{
            $checkIfImage = getimagesize($photo["tmp_name"]); 
            $message = $checkIfImage ? "Ok" : "Not an image";

            if($message == "Ok"){
                $ext = strtolower(pathinfo($photo["name"], PATHINFO_EXTENSION)); 
                $photoName = uniqid(""). "." . $ext; 
                $destination = "../assets/{$photoName}";
                if (move_uploaded_file($photo["tmp_name"], $destination)) {
                    $message = "File uploaded successfully";
                } else {
                    $message = "Error uploading file";
                }
            }
        }
        return ["assets/" . $photoName, $message]; 
    }

?>

<?php

//     function fileUploadAnimal($photo) {
//         $photoName = "";
//         $message = "";

//         if ($photo["error"] == 4) {
//             $photoName = "default.png";
//             $message = "No picture has been chosen, but you can upload an image later :)";
//         } else {
//             $checkIfImage = getimagesize($photo["tmp_name"]);
//             $message = $checkIfImage ? "Ok" : "Not an image";

//             if ($message == "Ok") {
//                 $ext = strtolower(pathinfo($photo["name"], PATHINFO_EXTENSION));
//                 $photoName = uniqid("") . "." . $ext;
//                 $destination = "../assets/{$photoName}";
//                 if (move_uploaded_file($photo["tmp_name"], $destination)) {
//                     $message = "File uploaded successfully";
//                 } else {
//                     $message = "Error uploading file";
//                 }
//             }
//         }

//     return ["../assets/" . $photoName, $message];
// }

?>

<!-- <?php
//    function fileUpload($picture){

//         if($picture["error"] == 4){ // checking if a file has been selected, it will return 0 if you choose a file, and 4 if you didn't
//            $pictureName = "avatar.png"; // the file name will be avatar.png (default picture for a product)
//            $message = "No picture has been chosen, but you can upload an image later :)" ;
//        }else{
//            $checkIfImage = getimagesize($picture["tmp_name" ]); // checking if you selected an image, return false if you didn't select an image
//            $message = $checkIfImage ? "Ok" : "Not an image";
//        }

//         if($message == "Ok"){
//            $ext = strtolower(pathinfo($picture["name" ],PATHINFO_EXTENSION)); // taking the extension data from the image
//            $pictureName = uniqid("" ). "." . $ext; // changing the name of the picture to random string and numbers
//            $destination = "pictures/{$pictureName}" ; // where the file will be saved
//            move_uploaded_file($picture["tmp_name" ], $destination); // moving the file to the pictures folder
//        }

//        return  [$pictureName, $message]; // returning the name of the picture and the message
//    }

?> -->

