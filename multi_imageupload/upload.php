<?php
include 'dbconn.php';
if(isset($_REQUEST['submit']))
{
    // File upload configuration
    $targetDir = "uploads/";
    $allowTypes = array('jpg','png','jpeg','gif');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    
    if(!empty(array_filter($_FILES['files']['name']))){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename(time().$key.$_FILES['files']['name'][$key]);
            
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."', NOW()),";
                }else{
                    echo "unable to insert intp the server";
                }
            }else{
               echo  "Sorry only jpg, png, jpeg files are allowed";
                
            }
        }
        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL,',');
            // Insert image file name into database
            $insert = $conn->query("INSERT INTO images (file_name, uploaded_on) VALUES $insertValuesSQL");
            if($insert)
            {
             header('Location:image_display.php');
            }else
              {
                $statusMsg = "Sorry, there was an error uploading your file.";
              }
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
    
    // Display status message
    echo $statusMsg;
}

?>
