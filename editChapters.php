<?php
// including the database connection file
include_once("config.php");
include('master.php');
include('session.php');
 
if(isset($_POST['update']))
{    
    $id = (int)$_POST['id'];
    
    $nnumber=(int)$_POST['number'];
    $title=$_POST['title'];   
    
    // checking empty fields
    if(empty($nnumber) || empty($title)) {            
        if(empty($nnumber)) {
            echo "<br/><font color='red'>Number field is empty.</font><br/>";
        }
        
        if(empty($title)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }   
    } else {    
        $result2 = mysqli_query($db, "SELECT * FROM chapters WHERE rec_id=$id");
 
        while($res = mysqli_fetch_array($result2))
        {
            $onumber = (int)$res['number'];
        }
        
        if($nnumber == $onumber){
            //updating the table
            $result = mysqli_query($db, "UPDATE chapters SET number='$nnumber',title='$title' WHERE rec_id=$id");
        
            //redirectig to the display page.
            header("Location: listChapters.php");
        }  else {
             //updating the table
             $result3 = mysqli_query($db, "UPDATE chapters SET number='$onumber' WHERE number=$nnumber");
             $result4 = mysqli_query($db, "UPDATE chapters SET number='$nnumber',title='$title' WHERE rec_id=$id");
        
             //redirectig to the display page.
             header("Location: listChapters.php");
        }
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM chapters WHERE rec_id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $number = $res['number'];
    $title = $res['title'];
}
?>
 
<div id="body1" class="container-fluid" align = "center">
    <br/><a href='javascript:self.history.back();'>Go Back</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editChapters.php">
        <table border="0">
            <tr> 
                <td>Chapter Number</td>
                <td><input type="number" name="number" min="1" value="<?php echo $number;?>"></td>
            </tr>
            <tr> 
                <td>Chapter Title</td>
                <td><input type="text" name="title" value="<?php echo $title;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</div>