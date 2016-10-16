<div id="body1" class="container-fluid" align = "center">
<?php
//including the database connection file
include_once("config.php");
include('master.php');
include('session.php');

if(isset($_POST['Submit'])) {    
    $number = (int)$_POST['number'];
    $title = $_POST['title'];
    
    $sql = "SELECT number FROM chapters WHERE number = $number";
    $result0 = mysqli_query($db,$sql);
    $row0 = mysqli_fetch_array($result0,MYSQLI_ASSOC);
    $active = $row0['active'];
      
    $count = mysqli_num_rows($result0);
    
    // checking empty fields
    if($count > 0 || empty($number) || empty($title)) {                
        if($count > 0) {
            echo "<br/><font color='red'>Chapter Number already exists.</font><br/>";
        }
        
        if(empty($number)) {
            echo "<br/><font color='red'>Chapter Number field is empty.</font><br/>";
        }
        
        if(empty($title)) {
            echo "<font color='red'>Chapter Title field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)
        $query = "SELECT MAX(rec_id) FROM chapters";
        $result1 = mysqli_query($db,  $query);
        $row1 = mysqli_fetch_row($result1);
        $largestNumber = (int)$row1[0]+1;
        $chapterNumber = (int)$number;
        //insert data to database
        $result = mysqli_query($db, "INSERT INTO chapters(rec_id,number,title) VALUES('$largestNumber','$chapterNumber','$title')");
        
        //display success message
        echo "<br/><font color='green'>Chapter added successfully.";
        echo "<br/><a href='listChapters.php'>View Result</a>";
    }
}
?>
</div>