<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='listLinks.php?cat=' + val ;
}

function reload2(form)
{
var dd = document.getElementById("cat");
var val1 = dd.options[dd.selectedIndex].value;
var val2=form.cat2.options[form.cat2.options.selectedIndex].value;
self.location='listLinks.php?cat=' + val1 +'&cat2=' + val2 ;
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

@$cat2=$_GET['cat2']; // Use this line or below line if register_global is off
if(strlen($cat2) > 0 and !is_numeric($cat2)){ // to check if $cat is numeric data or not. 
echo "Data Error";
exit;
}

///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT rec_id, title FROM chapters order by number"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat) and strlen($cat) > 0){
$quer="SELECT rec_id,title FROM sections where chapters_rec_id=$cat order by number"; 
}else{$quer="SELECT rec_id,title FROM sections order by number"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////

if(isset($cat2) and strlen($cat2) > 0){
$quer3=mysqli_query($db, "SELECT * FROM links where sections_rec_id=$cat2 order by seqNumber"); 
}else{$quer3=mysqli_query($db, "SELECT * FROM links order by seqNumber"); } 

echo "<form method=post name=f1 action=''>";
/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
echo "<br>";
echo '<a href="welcome.php">Welcome Menu</a>';
echo '<br/>';
echo "<br/><label>Select Chapter:&nbsp;</label><select id='cat' name='cat' onchange=\"reload(this.form)\"><option value=''>Select Chapter</option>";
foreach ($db->query($quer2) as $noticia2) {
if($noticia2['rec_id']==@$cat){echo "<option selected value='$noticia2[rec_id]'>$noticia2[title]</option>"."<BR>";}
else{echo  "<option value='$noticia2[rec_id]'>$noticia2[title]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<br/><br/><label>Select Section:&nbsp;</label><select id='cat2' name='cat2' onchange=\"reload2(this.form)\"><option value=''>Select Section</option>";
foreach ($db->query($quer) as $noticia) {
if($noticia['rec_id']==@$cat2){echo "<option selected value='$noticia[rec_id]'>$noticia[title]</option>"."<BR>";}
else{echo  "<option value='$noticia[rec_id]'>$noticia[title]</option>";}
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////
//// Add your other form fields as needed here/////
echo "<input type=hidden value=Submit>";
echo "</form>";
echo '<a href="addLinks.php?id=' . $cat2 . '">Add New Link</a>';
echo '<br/>';
echo '<br/>';
//////////////////  This will end the first drop down list ///////////
    
echo    "<table width='80%' border=0>";
echo        "<tr bgcolor='#CCCCCC'>";
echo            "<td>Number</td>";
echo            "<td>Title</td>";
echo            "<td>URL</td>";
echo            "<td>Update</td>";
echo        "</tr>";
        while($res = mysqli_fetch_array($quer3)) {         
            echo "<tr>";
            echo "<td>".$res['seqNumber']."</td>";
            echo "<td>".$res['title']."</td>";
            echo "<td>".$res['url']."</td>";
            echo "<td><a href=\"editLinks.php?id=$res[rec_id]\">Edit</a> | <a href=\"deleteLinks.php?id=$res[rec_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
echo    "</table>";
echo "</div>";
?>