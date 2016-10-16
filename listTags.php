<?php
include_once("config.php");
include('master.php');
include('session.php');

echo '<div id="body1" class="container-fluid" align = "center">';
@$id=$_GET['id']; // Use this line or below line if register_global is off
if(strlen($id) > 0 and !is_numeric($id)){ // to check if $id is numeric data or not. 
echo "Data Error";
exit;
}

if(isset($id) and strlen($id) > 0){
$quer3=mysqli_query($db, "SELECT * FROM keywords where links_rec_id=$id"); 
}else{echo "Data Error";exit;}

echo "<br>";
echo '<a href="welcome.php">Welcome Menu</a>';
echo '<br/>';
echo '<br/>';
echo "<a href='javascript:self.history.back();'>Go Back</a>";
echo '<br/>';
echo '<br/>';
echo '<a href="addTags.php?id=' . $id . '">Add New Tag</a>';
echo '<br/>';
echo '<br/>';
//////////////////  This will end the first drop down list ///////////
    
echo    "<table border='1px solid black' border-collapse='collapse' width='80%'>";
echo        "<tr bgcolor='#CCCCCC'>";
echo            "<td>Tags</td>";
echo            "<td>Update</td>";
echo        "</tr>";
        while($res = mysqli_fetch_array($quer3)) {         
            echo "<tr>";
            echo "<td>".$res['keyword']."</td>";
            echo "<td><a href=\"editTags.php?id=$res[rec_id]&id2=$id\">Edit</a> | <a href=\"deleteTags.php?id=$res[rec_id]&id2=$id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
echo    "</table>";
echo "</div>";
?>