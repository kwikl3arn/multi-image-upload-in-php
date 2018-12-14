<?php
// Include the database configuration file
include 'dbconn.php';

// Get images from the database
$query = $conn->query("SELECT * FROM images ORDER BY id DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
<img src="<?php echo $imageURL; ?>" alt="" width="20%" height="20%"/>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?> 