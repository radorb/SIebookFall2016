<?php
include("config.php");
include('master.php');
include('session.php');

if($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];
	
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
	
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
		$message = "The file you are trying to upload is not a .zip file. Please try again.";
	} else {

	$target_path = "import/".$filename;  // change this to the correct site path
	if(move_uploaded_file($source, $target_path)) {
		$zip = new ZipArchive();
		$x = $zip->open($target_path);
		if ($x === true) {
			$zip->extractTo("import/"); // change this to the correct site path
			$zip->close();
	
			unlink($target_path);
		}
                
                $chapterrecid=1;
$sectionrecid=1;
$linkrecid=1;
$tagrecid=1;

$query1 = mysqli_query($db, "DELETE FROM chapters");

foreach(glob('import/chapters/*', GLOB_ONLYDIR) as $chapter) 
    {
	$chaptertitle=ltrim($chapter,"import/chapters/");
        
        $result1 = mysqli_query($db, "INSERT INTO chapters(rec_id,number,title) VALUES('$chapterrecid','$chapterrecid','$chaptertitle')");
        
        $sectionseqnum=1;
        
        foreach(glob($chapter.'/*.txt') as $section) 
	    {	
		$sectiontitle=trim($section,"import/chapters/.'$chapter'./.txt");
                $sectiontitle2 = substr($sectiontitle, 4);
                
                $result2 = mysqli_query($db, "INSERT INTO sections(rec_id,number,title,chapters_rec_id) VALUES('$sectionrecid','$sectionseqnum','$sectiontitle2','$chapterrecid')");
                
                $contents = file_get_contents($section);
                $pollfields = explode(';', $contents);
                
                $fieldcount=1;
                $linkseqnum=1;
                
                foreach($pollfields as $field) 
                    {
                        if($fieldcount==1){
                            $result3 = mysqli_query($db, "INSERT INTO links(rec_id,seqNumber,title,url,sections_rec_id) VALUES('$linkrecid','$linkseqnum','$field','about:blank','$sectionrecid')");
                        }
                        if($fieldcount==2){
                            $result4 = mysqli_query($db, "UPDATE links SET url='$field' WHERE rec_id=$linkrecid");
                            
                            ++$linkrecid;
                            ++$linkseqnum;
                        }
                        if($fieldcount==3){
                            $lrid=$linkrecid-1;
                            
                            $result5 = mysqli_query($db, "INSERT INTO keywords(rec_id,keyword,links_rec_id) VALUES('$tagrecid','$field','$lrid')");
                            
                            ++$tagrecid;
                            $fieldcount=$fieldcount-$fieldcount;
                        }
                        ++$fieldcount;
                    }
                    ++$sectionrecid;
                    ++$sectionseqnum;
	    }
            ++$chapterrecid;
    }
    
    function deleteDirectory($dir) { 
        if (!file_exists($dir)) { return true; }
        if (!is_dir($dir) || is_link($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) { 
            if ($item == '.' || $item == '..') { continue; }
            if (!deleteDirectory($dir . "/" . $item, false)) { 
                chmod($dir . "/" . $item, 0777); 
                if (!deleteDirectory($dir . "/" . $item, false)) return false; 
            }; 
        } 
        return rmdir($dir); 
    }
deleteDirectory('import/chapters');
		$message = "Your .zip file was imported.";
	} else {	
		$message = "There was a problem with the import. Please try again.";
	}
        }
}
?>

<div id="body1" class="container-fluid" align = "center">
    <br>
    <?php if($message) echo "<p>$message</p>"; ?>
    <form enctype="multipart/form-data" method="post" action="">
    <label>Choose a zip file to import: <input type="file" name="zip_file" /></label>
    <br>
    <input type="submit" name="submit" value="Import" />
    </form>
</div>