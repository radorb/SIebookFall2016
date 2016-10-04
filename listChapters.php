<?php
include_once("config.php");
include('master.php');
include('session.php');
$result = mysqli_query($db, "SELECT * FROM chapters ORDER BY number");
?>
 
<div id="body1" class="container-fluid" align = "center">
    <br/><a href="addChapters.html">Add New Chapter</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Number</td>
            <td>Title</td>
            <td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['number']."</td>";
            echo "<td>".$res['title']."</td>";    
            echo "<td><a href=\"editChapters.php?id=$res[rec_id]\">Edit</a> | <a href=\"deleteChapters.php?id=$res[rec_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</div>