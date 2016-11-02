<?php
// including the database connection file
include_once("config.php");
include('master.php');
include('session.php');
 
if(isset($_POST['update']))
{    
    $id = (int)$_POST['id'];
    $id2 = (int)$_POST['id2'];
    $id3 = (int)$_POST['id3'];
    
    $section=(int)$_POST['section'];
    $nnumber=(int)$_POST['number'];
    $title=$_POST['title'];
    $url=$_POST['url'];
    
    echo "$section";
    
    // checking empty fields
    if(empty($nnumber) || empty($title) || empty($url)) {            
        if(empty($nnumber)) {
            echo "<br/><font color='red'>Link Number field is empty.</font><br/>";
        }
        
        if(empty($title)) {
            echo "<font color='red'>Link Title field is empty.</font><br/>";
        }
        
        if(empty($url)) {
            echo "<font color='red'>Link URL field is empty.</font><br/>";
        }
        
    } else {    
        $result2 = mysqli_query($db, "SELECT * FROM links WHERE rec_id=$id");
 
        while($res = mysqli_fetch_array($result2))
        {
            $onumber = (int)$res['seqNumber'];
        }
        
        if($nnumber == $onumber){
            //updating the table
            $result = mysqli_query($db, "UPDATE links SET seqNumber='$nnumber',title='$title',url='$url',sections_rec_id='$section' WHERE rec_id=$id");
        
            //redirectig to the display page.
            header("Location: listLinks.php?id=$id2&id2=$id3");
        }  else {
             //updating the table
             $result3 = mysqli_query($db, "UPDATE links SET seqNumber='$onumber' WHERE seqNumber=$nnumber AND sections_rec_id=$id2");
             $result4 = mysqli_query($db, "UPDATE links SET seqNumber='$nnumber',title='$title',url='$url',sections_rec_id='$section' WHERE rec_id=$id");
        
             //redirectig to the display page.
             header("Location: listLinks.php?id=$id2&id2=$id3");
        }
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
$id2 = $_GET['id2'];
$id3 = $_GET['id3'];
 
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
                <td>Section</td>
                <td><?php $quer="SELECT rec_id, title FROM sections WHERE chapters_rec_id=$id3 order by number";
                    echo "<select id='section' name='section'>";
                    foreach ($db->query($quer) as $noticia) {
                    if($noticia['rec_id']==$id2){echo "<option selected value='$noticia[rec_id]'>$noticia[title]</option>"."<BR>";}
                    else{echo  "<option value='$noticia[rec_id]'>$noticia[title]</option>";}
                    }
                    echo "</select>";     
                ?></td>
            </tr>
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
                <td><input type="hidden" name="id3" value="<?php echo $_GET['id3'];?>"></td>
            </tr>
        </table>
    </form>
</div>