<div id="body1" class="container-fluid" align = "center">
<?php
//including the database connection file
include_once("config.php");
include('master.php');
include('session.php');
 
if(isset($_POST['Submit'])) {
    $id = $_POST['linkId'];
    $tags = $_POST['tags'];
        
    // checking empty fields
    if(empty($tags)) {                
        if(empty($tags)) {
            echo "<br/><font color='red'>Tags field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)
        $query = "SELECT MAX(rec_id) FROM keywords";
        $result1 = mysqli_query($db,  $query);
        $row1 = mysqli_fetch_row($result1);
        $largestNumber = (int)$row1[0]+1;
        $linkId = (int)$id;
        //insert data to database
        $result = mysqli_query($db, "INSERT INTO keywords(rec_id,keyword,links_rec_id) VALUES('$largestNumber','$tags','$linkId')");
        
        //display success message
        echo "<br/><font color='green'>Tags added successfully.";
        echo "<br/><a href='listTags.php'>View Result</a>";
    }
}
?>
</div>