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
    
    // checking empty fields
    if(empty($number) || empty($title)) {            
        if(empty($number)) {
            echo "<br/><font color='red'>Section Number field is empty.</font><br/>";
        }
        
        if(empty($title)) {
            echo "<font color='red'>Section Title field is empty.</font><br/>";
        }   
    } else {    
        //updating the table
        $result = mysqli_query($db, "UPDATE sections SET number='$number',title='$title' WHERE rec_id=$id");
        
        //redirectig to the display page.
        header("Location: listSections.php?id=$id2");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
$id2 = $_GET['id2'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM sections WHERE rec_id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $number = $res['number'];
    $title = $res['title'];
}
?>
 
<div id="body1" class="container-fluid" align = "center">
    <br/><a href='javascript:self.history.back();'>Go Back</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editSections.php">
        <table border="0">
            <tr> 
                <td>Section Number</td>
                <td><input type="number" name="number" min="1" value="<?php echo $number;?>"></td>
            </tr>
            <tr> 
                <td>Section Title</td>
                <td><input type="text" name="title" value="<?php echo $title;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
                <td><input type="hidden" name="id2" value="<?php echo $_GET['id2'];?>"></td>
            </tr>
        </table>
    </form>
</div>