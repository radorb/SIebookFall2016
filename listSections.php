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
$quer=mysqli_query($db, "SELECT * FROM sections where chapters_rec_id=$id order by number"); 
}else{echo "Data Error";exit;}

echo "<br>";
echo '<a href="welcome.php">Welcome Menu</a>';
echo '<br/>';
echo '<br/>';
echo "<a href='javascript:self.history.back();'>Go Back</a>";
echo '<br/>';
echo '<br/>';
echo '<a href="addSections.php?id=' . $id . '">Add New Section</a>';
echo '<br/>';
echo '<br/>';
    
echo    "<table border='1px solid black' border-collapse='collapse' width='80%'>";
echo        "<tr bgcolor='#CCCCCC'>";
echo            "<td>Number</td>";
echo            "<td>Title</td>";
echo            "<td>Update</td>";
echo        "</tr>";
        while($res = mysqli_fetch_array($quer)) {         
            echo "<tr>";
            echo "<td>".$res['number']."</td>";
            echo "<td><a href=\"listLinks.php?id=$res[rec_id]&id2=$id\">".$res['title']."</a></td>";    
            echo "<td><a href=\"editSections.php?id=$res[rec_id]&id2=$id\">Edit</a> | <a href=\"deleteSections.php?id=$res[rec_id]&id2=$id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
echo    "</table>";
echo "</div>";
?>