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

@$id2=$_GET['id2']; // Use this line or below line if register_global is off
if(strlen($id2) > 0 and !is_numeric($id2)){ // to check if $id is numeric data or not. 
echo "Data Error";
exit;
}

if(isset($id) and strlen($id) > 0){
$quer3=mysqli_query($db, "SELECT * FROM links where sections_rec_id=$id order by seqNumber"); 
}else{echo "Data Error";exit;} 

echo "<br>";
echo '<a href="welcome.php">Welcome Menu</a>';
echo '<br/>';
echo '<br/>';
echo "<a href='javascript:self.history.back();'>Go Back</a>";
echo '<br/>';
echo '<br/>';
echo '<a href="addLinks.php?id=' . $id . '">Add New Link</a>';
echo '<br/>';
echo '<br/>';
//////////////////  This will end the first drop down list ///////////
    
echo    "<table border='1px solid black' border-collapse='collapse' width='80%'>";
echo        "<tr bgcolor='#CCCCCC'>";
echo            "<td>Number</td>";
echo            "<td>Title</td>";
echo            "<td>URL</td>";
echo            "<td>Update</td>";
echo        "</tr>";
        while($res = mysqli_fetch_array($quer3)) {         
            echo "<tr>";
            echo "<td>".$res['seqNumber']."</td>";
            echo "<td><a href=\"listTags.php?id=$res[rec_id]\">".$res['title']."</a></td>";
            echo "<td>".$res['url']."</td>";
            echo "<td><a href=\"editLinks.php?id=$res[rec_id]&id2=$id&id3=$id2\">Edit</a> | <a href=\"deleteLinks.php?id=$res[rec_id]&id2=$id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
echo    "</table>";
echo "</div>";
?>