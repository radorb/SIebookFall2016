<?php
include("config.php");
include('master.php');
include('session.php');

$id = $_GET['id'];

if(empty($id)) {
    echo '<div id="body1" class="container-fluid" align = "center">';
    echo "<br><font color='red'>Please go back and select a chapter, section and link!</font><br/>";
    echo "<br><a href='javascript:self.history.back();'>Go Back</a>";
    exit;
}

?>
    
<div id="body1" class="container-fluid" align = "center">
    <br/><a href='javascript:self.history.back();'>Go Back</a>
    <br/><br/>
    
    <form action="addTagsR.php" method="post" name="form1">
        <table width="25%" border="0">
            <input type="hidden" name="linkId" value="<?php echo $_GET["id"]; ?>">
            <tr> 
                <td>Tags</td>
                <td><input type="text" name="tags"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</div>