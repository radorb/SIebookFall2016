<?php
include("config.php");
include('master.php');
include('session.php');
?>

<div id="body1" class="container-fluid" align = "center">
    <br/><a href='javascript:self.history.back();'>Go Back</a>
    <br/><br/>
 
    <form action="addChaptersR.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Chapter Number</td>
                <td><input type="number" name="number" min="1"></td>
            </tr>
            <tr> 
                <td>Chapter Title</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</div>