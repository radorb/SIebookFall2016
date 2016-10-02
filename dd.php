<?php
include("config.php");
?>

<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='dd.php?cat=' + val ;
}

</script>

<?Php

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
echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select Chapter</option>";
foreach ($db->query($quer2) as $noticia2) {
if($noticia2['rec_id']==@$cat){echo "<option selected value='$noticia2[rec_id]'>$noticia2[title]</option>"."<BR>";}
else{echo  "<option value='$noticia2[rec_id]'>$noticia2[title]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<select name='subcat'><option value=''>Select Section</option>";
foreach ($db->query($quer) as $noticia) {
echo  "<option value='$noticia[title]'>$noticia[title]</option>";
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////
//// Add your other form fields as needed here/////
echo "<input type=submit value=Submit>";
echo "</form>";
?>
<br><br>
<a href=dd.php>Reset and start again</a>
