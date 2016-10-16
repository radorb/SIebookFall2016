<div id="body1" class="container-fluid" align = "center">
<?php
//including the database connection file
include_once("config.php");
include('master.php');
include('session.php');
 
if(isset($_POST['Submit'])) {
    $id = (int)$_POST['sectionId'];
    $number = (int)$_POST['number'];
    $title = $_POST['title'];
    $url = $_POST['url'];
    
    $sql = "SELECT seqNumber FROM links WHERE sections_rec_id = $id AND seqNumber = $number";
    $result0 = mysqli_query($db,$sql);
    $row0 = mysqli_fetch_array($result0,MYSQLI_ASSOC);
    $active = $row0['active'];
      
    $count = mysqli_num_rows($result0);
    
    // checking empty fields
    if($count > 0 || empty($number) || empty($title) || empty($url)) {                
        if($count > 0) {
            echo "<br/><font color='red'>Link Number already exists.</font><br/>";
        }
        
        if(empty($number)) {
            echo "<br/><font color='red'>Link Number field is empty.</font><br/>";
        }
        
        if(empty($title)) {
            echo "<font color='red'>Link Title field is empty.</font><br/>";
        }
        
        if(empty($url)) {
            echo "<font color='red'>Link URL field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)
        $query = "SELECT MAX(rec_id) FROM links";
        $result1 = mysqli_query($db,  $query);
        $row1 = mysqli_fetch_row($result1);
        $largestNumber = (int)$row1[0]+1;
        $linkNumber = (int)$number;
        $sectionId = (int)$id;
        //insert data to database
        $result = mysqli_query($db, "INSERT INTO links(rec_id,seqNumber,title,url,sections_rec_id) VALUES('$largestNumber','$linkNumber','$title','$url','$sectionId')");
        
        //display success message
        echo "<br/><font color='green'>Link added successfully.";
        echo "<br/><a href='listLinks.php?id=$id'>View Result</a>";
    }
}
?>
</div>