<div id="body1" class="container-fluid" align = "center">
<?php
//including the database connection file
include_once("config.php");
include('master.php');
include('session.php');
 
if(isset($_POST['Submit'])) {    
    $id = $_POST['chapterId'];
    $number = $_POST['number'];
    $title = $_POST['title'];
        
    // checking empty fields
    if(empty($number) || empty($title)) {                
        if(empty($number)) {
            echo "<br/><font color='red'>Section Number field is empty.</font><br/>";
        }
        
        if(empty($title)) {
            echo "<font color='red'>Section Title field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)
        $query = "SELECT MAX(rec_id) FROM sections";
        $result1 = mysqli_query($db,  $query);
        $row1 = mysqli_fetch_row($result1);
        $largestNumber = (int)$row1[0]+1;
        $sectionNumber = (int)$number;
        $chapterId = (int)$id;
        //insert data to database
        $result = mysqli_query($db, "INSERT INTO sections(rec_id,number,title,chapters_rec_id) VALUES('$largestNumber','$sectionNumber','$title','$chapterId')");
        
        //display success message
        echo "<br/><font color='green'>Section added successfully.";
        echo "<br/><a href='listSections.php'>View Result</a>";
    }
}
?>
</div>