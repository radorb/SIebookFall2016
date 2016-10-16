<?php
include_once("config.php");
include('master.php');
include('session.php');

if($login_session == 'admin'){
    $result1 = mysqli_query($db, "SELECT * FROM chapters ORDER BY number");
}

if($login_session == 'security'){
    $result1 = mysqli_query($db, "SELECT * FROM chapters WHERE title='Security'");
}

if($login_session == 'infrastructure'){
    $result1 = mysqli_query($db, "SELECT * FROM chapters WHERE title='Infrastructure'");
}

if($login_session == 'mobile'){
    $result1 = mysqli_query($db, "SELECT * FROM chapters WHERE title='Mobile Development'");
}
?>
 
<div id="body1" class="container-fluid" align = "center">
    <br>
    <a href="welcome.php">Welcome Menu</a>
    <br><br/><a href='javascript:self.history.back();'>Go Back</a>
    <br/>
    <br/>
    <?php
    if($login_session == 'admin'){
        echo '<a href="addChapters.php">Add New Chapter</a><br/><br/>';
    }
    ?>
 
    <table border="1px solid black" border-collapse="collapse" width='80%'>
        <tr bgcolor='#CCCCCC'>
            <td>Number</td>
            <td>Title</td>
            <td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result1)) {         
            echo "<tr>";
            echo "<td>".$res['number']."</td>";
            echo "<td><a href=\"listSections.php?id=$res[rec_id]\">".$res['title']."</a></td>";    
            echo "<td><a href=\"editChapters.php?id=$res[rec_id]\">Edit</a> | <a href=\"deleteChapters.php?id=$res[rec_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</div>