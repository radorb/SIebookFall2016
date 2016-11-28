<?php
include_once("config.php");
include('master.php');
include('session.php');

if($login_session == 'admin'){
    $result1 = mysqli_query($db, "SELECT * FROM broken ORDER BY chapter, section, link");
}

if($login_session == 'security'){
    $result1 = mysqli_query($db, "SELECT * FROM broken WHERE chapter='Security' ORDER BY chapter, section, link");
}

if($login_session == 'infrastructure'){
    $result1 = mysqli_query($db, "SELECT * FROM broken WHERE chapter='Infrastructure' ORDER BY chapter, section, link");
}

if($login_session == 'mobile'){
    $result1 = mysqli_query($db, "SELECT * FROM broken WHERE chapter='Mobile' ORDER BY chapter, section, link");
}
?>
 
<div id="body1" class="container-fluid" align = "center">
    <br>
    <a href="welcome.php">Welcome Menu</a>
    <br><br/><a href='javascript:self.history.back();'>Go Back</a>
    <br/>
    <br/>
 
    <table border="1px solid black" border-collapse="collapse" width='80%'>
        <tr bgcolor='#CCCCCC'>
            <td>Chapter</td>
            <td>Section</td>
            <td>Link</td>
            <td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result1)) {         
            echo "<tr>";
            echo "<td>".$res['chapter']."</td>";
            echo "<td>".$res['section']."</td>";
            echo "<td>".$res['link']."</td>";
            echo "<td><a href=\"deleteBroken.php?id=$res[rec_id]\" onClick=\"return confirm('Are you sure the reported broken link is fixed?')\">Clear</a></td>";        
        }
        ?>
    </table>
</div>