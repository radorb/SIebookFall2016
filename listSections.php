<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='listSections.php?cat=' + val ;
}

</script>

<?php
include_once("config.php");
include('master.php');
include('session.php');

echo '<div id="body1" class="container-fluid" align = "center">';
@$cat=$_GET['cat']; // Use this line or below line if register_global is off
if(strlen($cat) > 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
echo "Data Error";
exit;
}



///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT rec_id, title FROM chapters order by number"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat) and strlen($cat) > 0){
$quer=mysqli_query($db, "SELECT * FROM sections where chapters_rec_id=$cat order by number"); 
}else{$quer=mysqli_query($db, "SELECT * FROM sections order by number"); } 
////////// end of query for second subcategory drop down list box ///////////////////////////

echo "<form method=post name=f1 action=''>";
/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
echo "<br>";
echo '<a href="welcome.php">Welcome Menu</a>';
echo '<br/>';
echo "<br/><label>Select Chapter:&nbsp;</label><select name='cat' onchange=\"reload(this.form)\"><option value=''>Select Chapter</option>";
foreach ($db->query($quer2) as $noticia2) {
if($noticia2['rec_id']==@$cat){echo "<option selected value='$noticia2[rec_id]'>$noticia2[title]</option>"."<BR>";}
else{echo  "<option value='$noticia2[rec_id]'>$noticia2[title]</option>";}
}
echo "</select>";
echo "<input type=hidden value=Submit>";
echo "</form>";
echo '<a href="addSections.php?id=' . $cat . '">Add New Section</a>';
echo '<br/>';
echo '<br/>';
//////////////////  This will end the first drop down list ///////////
    
echo    "<table width='80%' border=0>";
echo        "<tr bgcolor='#CCCCCC'>";
echo            "<td>Number</td>";
echo            "<td>Title</td>";
echo            "<td>Update</td>";
echo        "</tr>";
        while($res = mysqli_fetch_array($quer)) {         
            echo "<tr>";
            echo "<td>".$res['number']."</td>";
            echo "<td>".$res['title']."</td>";    
            echo "<td><a href=\"editSections.php?id=$res[rec_id]\">Edit</a> | <a href=\"deleteSections.php?id=$res[rec_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
echo    "</table>";
echo "</div>";
?>