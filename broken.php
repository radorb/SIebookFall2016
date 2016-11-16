<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
var val2=form.cat2.options[form.cat2.options.selectedIndex].value;
self.location='broken.php?cat=' + val + '&cat2=' + val2 ;
}

</script>

<?php
include('master.php');
include("config.php");

echo '<div id="body1" class="container-fluid" align = "center">';
echo '<h3>Report Broken Link</h3>';
echo '<br>';
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
$quer="SELECT rec_id, title FROM sections where chapters_rec_id=$cat order by number"; 
}else{$quer="SELECT rec_id, title FROM sections order by number"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////

/////// for third drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat2) and strlen($cat2) > 0){
$quer3="SELECT rec_id, title FROM links where sections_rec_id=$cat2 order by seqNumber"; 
}else{$quer3="SELECT rec_id, title FROM links order by seqNumber"; } 
////////// end of query for third subcategory drop down list box ///////////////////////////

echo "<form method=post name=f1 action='brokenR.php'>";
/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
echo "<label>Chapter:&nbsp;</label><select name='cat' onchange=\"reload(this.form)\"><option value=''>Select Chapter</option>";
foreach ($db->query($quer2) as $noticia2) {
if($noticia2['rec_id']==@$cat){echo "<option selected value='$noticia2[rec_id]'>$noticia2[title]</option>"."<BR>";}
else{echo  "<option value='$noticia2[rec_id]'>$noticia2[title]</option>";}
}
echo "</select>";
echo '<br>';
echo '<br>';
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<label>Section:&nbsp;</label><select name='cat2' onchange=\"reload(this.form)\"><option value=''>Select Section</option>";
foreach ($db->query($quer) as $noticia) {
if($noticia['rec_id']==@$cat2){echo "<option selected value='$noticia[rec_id]'>$noticia[title]</option>"."<BR>";}
else{echo  "<option value='$noticia[rec_id]'>$noticia[title]</option>";}
}
echo "</select>";
echo '<br>';
echo '<br>';
//////////////////  This will end the second drop down list ///////////

//////////        Starting of third drop downlist /////////
echo "<label>Link:&nbsp;</label><select name='cat3'><option value=''>Select Link</option>";
foreach ($db->query($quer3) as $noticia3) {
echo  "<option value='$noticia3[rec_id]'>$noticia3[title]</option>";
}
echo "</select>";
//////////////////  This will end the third drop down list ///////////
//// Add your other form fields as needed here/////
echo '<br>';
echo '<br>';
echo     '<input type = "submit" value = " Submit "/>';
echo "</form>";
?>

<!--<div id="body1" class="container-fluid" align = "center">
<br>
<p>
<font color="red">
<b>
<u>
Please be sure to include the chapter, section and link when reporting a broken link.
</u>
</b>
</font>
<br>
<br>
Thank you.
<br>
<br>
<a href="mailto:gsteinbe@kent.edu?subject=Report%20Broken%20Link&body=Chapter:%20%0D%0A%0D%0ASection:%20%0D%0A%0D%0ALink:%20" target="_top">Report broken link!</a>
</p>
</div>-->