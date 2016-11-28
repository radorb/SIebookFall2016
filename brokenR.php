<div id="body1" class="container-fluid" align = "center">
<h3>Report Broken Link</h3>
<?php
include("config.php");
include('master.php');

if(isset($_POST['Submit'])) {
    $chapterrecid = (int)$_POST['cat'];
    $sectionrecid = (int)$_POST['cat2'];
    $linkrecid = (int)$_POST['cat3'];
    
    // checking empty fields
    if(empty($chapterrecid) || empty($sectionrecid) || empty($linkrecid)) {                
        if(empty($chapterrecid)) {
            echo "<br/><font color='red'>Please go back and select a chapter.</font><br/>";
        }
        
        if(empty($sectionrecid)) {
            echo "<br/><font color='red'>Please go back and select a section.</font><br/>";
        }
        
        if(empty($linkrecid)) {
            echo "<br/><font color='red'>Please go back and select a link.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)
        $query1 = "SELECT MAX(rec_id) FROM broken";
        $result1 = mysqli_query($db,  $query1);
        $row1 = mysqli_fetch_row($result1);
        $largestNumber = (int)$row1[0]+1;
        
        $query2 = "SELECT title FROM chapters WHERE rec_id=$chapterrecid";
        $result2 = mysqli_query($db,  $query2);
        $row2 = mysqli_fetch_row($result2);
        $chaptertitle = $row2[0];
        
        $query3 = "SELECT title FROM sections WHERE rec_id=$sectionrecid";
        $result3 = mysqli_query($db,  $query3);
        $row3 = mysqli_fetch_row($result3);
        $sectiontitle = $row3[0];
        
        $query4 = "SELECT title FROM links WHERE rec_id=$linkrecid";
        $result4 = mysqli_query($db,  $query4);
        $row4 = mysqli_fetch_row($result4);
        $linktitle = $row4[0];
        
        //insert data to database
        $result = mysqli_query($db, "INSERT INTO broken(rec_id,chapter,section,link) VALUES('$largestNumber','$chaptertitle','$sectiontitle','$linktitle')");
        
        // the message
//        $msg = "Technology Boot Camp eBook Website - Reported Broken Link\nChapter: .'$chaptertitle'. Section: .'$sectiontitle'. Link: .'$linktitle'";

        // use wordwrap() if lines are longer than 70 characters
//        $msg = wordwrap($msg,70);

        // send email
//        mail("someone@example.com","Technology Boot Camp eBook Website - Reported Broken Link",$msg);
        
        //display success message
        echo "<br/><font color='green'>Broken link reported successfully.<br/>";
        echo "<br/><a href='index.php'>Technology Boot Camp - Home</a>";
    }
}
?>