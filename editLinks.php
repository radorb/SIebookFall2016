<?php
// including the database connection file
include_once("config.php");
include('master.php');
include('session.php');
 
if(isset($_POST['update']))
{    
    $id = (int)$_POST['id'];
    $id2 = (int)$_POST['id2'];
    
    $number=(int)$_POST['number'];
    $title=$_POST['title'];
    $url=$_POST['url'];
    
    // checking empty fields
    if(empty($number) || empty($title) || empty($url)) {            
        if(empty($number)) {
            echo "<br/><font color='red'>Link Number field is empty.</font><br/>";
        }
        
        if(empty($title)) {
            echo "<font color='red'>Link Title field is empty.</font><br/>";
        }
        
        if(empty($url)) {
            echo "<font color='red'>Link URL field is empty.</font><br/>";
        }
        
    } else {    
        //updating the table
        $result = mysqli_query($db, "UPDATE links SET seqNumber='$number',title='$title',url='$url' WHERE rec_id=$id");
        
        //redirectig to the display page.
        header("Location: listLinks.php?id=$id2");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
$id2 = $_GET['id2'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM links WHERE rec_id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $number = $res['seqNumber'];
    $title = $res['title'];
    $url = $res['url'];
}
?>
 
<div id="body1" class="container-fluid" align = "center">
    <br/><a href='javascript:self.history.back();'>Go Back</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editLinks.php">
        <table border="0">
            <tr> 
                <td>Link Number</td>
                <td><input type="number" name="number" min="1" value="<?php echo $number;?>"></td>
            </tr>
            <tr> 
                <td>Link Title</td>
                <td><input type="text" name="title" value="<?php echo $title;?>"></td>
            </tr>
            <tr> 
                <td>Link URL</td>
                <td><input type="text" name="url" value="<?php echo $url;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
                <td><input type="hidden" name="id2" value="<?php echo $_GET['id2'];?>"></td>
            </tr>
        </table>
    </form>
</div>