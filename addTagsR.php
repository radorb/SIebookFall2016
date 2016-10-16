<div id="body1" class="container-fluid" align = "center">
<?php
//including the database connection file
include_once("config.php");
include('master.php');
include('session.php');
 
if(isset($_POST['Submit'])) {
    $id = (int)$_POST['linkId'];
    $tags = $_POST['tags'];
    
    $sql = "SELECT tags FROM keywords WHERE links_rec_id = $id AND tags = '$tags'";
    $result0 = mysqli_query($db,$sql);
    $row0 = mysqli_fetch_array($result0,MYSQLI_ASSOC);
    $active = $row0['active'];
      
    $count = mysqli_num_rows($result0);
    
    // checking empty fields
    if($count > 0 || empty($tags)) {                
        if($count > 0) {
            echo "<br/><font color='red'>Tag already exists.</font><br/>";
        }
        
        if(empty($tags)) {
            echo "<br/><font color='red'>Tag field is empty.</font><br/>";
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
        echo "<br/><font color='green'>Tag added successfully.";
        echo "<br/><a href='listTags.php?id=$id'>View Result</a>";
    }
}
?>
</div>