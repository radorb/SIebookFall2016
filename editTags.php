<?php
// including the database connection file
include_once("config.php");
include('master.php');
include('session.php');
 
if(isset($_POST['update']))
{    
    $id = (int)$_POST['id'];
    
    $tags=$_POST['tags'];
    
    // checking empty fields
    if(empty($tags)) {            
        if(empty($tags)) {
            echo "<br/><font color='red'>Tags field is empty.</font><br/>";
        }
        
    } else {    
        //updating the table
        $result = mysqli_query($db, "UPDATE keywords SET keyword='$tags' WHERE rec_id=$id");
        
        //redirectig to the display page.
        header("Location: listTags.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM keywords WHERE rec_id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $keyword = $res['keyword'];
}
?>
 
<div id="body1" class="container-fluid" align = "center">
    <br/><a href='javascript:self.history.back();'>Go Back</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editTags.php">
        <table border="0">
            <tr> 
                <td>Tags</td>
                <td><input type="text" name="tags" value="<?php echo $keyword;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</div>