<?php
include("config.php");
include('master.php');
include('session.php');

$id = $_GET['id'];

if(empty($id)) {
    echo '<div id="body1" class="container-fluid" align = "center">';
    echo "<br><font color='red'>Please go back and select a chapter and section!</font><br/>";
    echo "<br><a href='javascript:self.history.back();'>Go Back</a>";
    exit;
}

?>
    
<div id="body1" class="container-fluid" align = "center">
    <br/><a href='javascript:self.history.back();'>Go Back</a>
    <br/><br/>
    
    <form action="addLinksR.php" method="post" name="form1">
        <table border="0">
            <input type="hidden" name="sectionId" value="<?php echo $_GET["id"]; ?>">
            <tr> 
                <td>Link Number</td>
                <td><input type="number" name="number" min="1"></td>
            </tr>
            <tr> 
                <td>Link Title</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr> 
                <td>Link URL</td>
                <td><input type="text" name="url"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</div>