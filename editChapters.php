<?php
include('master.php');
include('session.php');
include("config.php");

$result = $db->query("SELECT number, title FROM chapters ORDER BY number");
    
echo "<br>";
echo '<div id="body1" class="container-fluid" align = "center">';
echo '<h3>Edit Existing Chapter</h3>';
echo '<br>';
echo "<label>Select Chapter:&nbsp;</label><select name='number'>";
echo '<option value="0">Chapter</option>';

while ($row = $result->fetch_assoc()) {

    unset($number, $title);
    $number = $row['number'];
    $title = $row['title']; 
    echo '<option value="'.$number.'">'.$title.'</option>';
                 
}

echo "</select>";

echo '<br>';
echo '<br>';

echo '<form action = "" method = "post">';
echo     '<label>Chapter Number:&nbsp;</label><input type = "number" name = "editnumber" min="1" class = "box" /><br /><br />';
echo     '<label>Chapter Title:&nbsp;</label><input type = "text" name = "edittitle" class = "box" /><br/><br />';
echo     '<input type = "submit" value = " Submit "/>&nbsp;<input type = "submit" value = " Delete "/>';
echo '</form>';

echo '<br>';
echo '<h3>Add New Chapter</h3>';
echo '<br>';

echo '<form action = "" method = "post">';
echo     '<label>Chapter Number:&nbsp;</label><input type = "number" name = "addnumber" min="1" class = "box" /><br /><br />';
echo     '<label>Chapter Title:&nbsp;</label><input type = "text" name = "addtitle" class = "box" /><br/><br />';
echo     '<input type = "submit" value = " Submit "/><br />';
echo '</form>';
?>