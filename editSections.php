<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='editSections.php?cat=' + val ;
}

</script>

<?php
include('master.php');
include('session.php');
include("config.php");
    
echo "<br>";
echo '<div id="body1" class="container-fluid" align = "center">';
echo '<h3>Edit Existing Section</h3>';
echo '<br>';
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
$quer="SELECT title FROM sections where chapters_rec_id=$cat order by number"; 
}else{$quer="SELECT title FROM sections order by number"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////

echo "<form method=post name=f1 action='dd-check.php'>";
/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
echo "<label>Select Chapter:&nbsp;</label><select name='cat' onchange=\"reload(this.form)\"><option value=''>Select Chapter</option>";
foreach ($db->query($quer2) as $noticia2) {
if($noticia2['rec_id']==@$cat){echo "<option selected value='$noticia2[rec_id]'>$noticia2[title]</option>"."<BR>";}
else{echo  "<option value='$noticia2[rec_id]'>$noticia2[title]</option>";}
}
echo "</select>";
echo '<br>';
echo '<br>';
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<label>Select Section:&nbsp;</label><select name='subcat'>Select Section</option>";
foreach ($db->query($quer) as $noticia) {
echo  "<option value='$noticia[title]'>$noticia[title]</option>";
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////
//// Add your other form fields as needed here/////
echo '<br>';
echo '<br>';
echo     '<label>Section Number:&nbsp;</label><input type = "number" name = "editnumber" min="1" class = "box" /><br /><br />';
echo     '<label>Section Title:&nbsp;</label><input type = "text" name = "edittitle" class = "box" /><br/><br />';
echo     '<input type = "submit" value = " Submit "/>&nbsp;<input type = "submit" value = " Delete "/>';
echo "</form>";

echo '<br>';
echo '<h3>Add New Section</h3>';
echo '<br>';

echo '<form action = "" method = "post">';
echo     '<label>Section Number:&nbsp;</label><input type = "number" name = "addnumber" min="1" class = "box" /><br /><br />';
echo     '<label>Section Title:&nbsp;</label><input type = "text" name = "addtitle" class = "box" /><br/><br />';
echo     '<input type = "submit" value = " Submit "/><br />';
echo '</form>';
?>