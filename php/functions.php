<?php

function getPhoneText()
{
    return "Phone: " . getFileHTML("text/contact/phone.txt");
}

function getEmailHTML()
{
    $email = getFileHTML("text/contact/email.txt");
    return "Email: <a href='mailto:$email'>$email</a>";
}

function getFileText($txtFile)
{
    if(file_exists($txtFile))
    {
        return remove_utf8_bom(file_get_contents($txtFile));
    }

    return "";
}

function getFileHTML($txtFile)
{
    return nl2br(getFileText($txtFile));
}

function getHeadingFileHTML($phpFile)
{
    $txtFile = "text/headings/" . str_replace(".php", ".txt", $phpFile);
    
    if(file_exists($txtFile))
    {
        $fileText = nl2br(file_get_contents($txtFile));
        $headingHTML = str_replace("<HeadingTitle>", "<h1>", $fileText);
        $headingHTML = str_replace("<HeadingStart>", "<br><span>", $headingHTML);
        $headingHTML = str_replace("<HeadingEnd>", "</span></h1>", $headingHTML);
        return $headingHTML;
    }
}

function getSlideImagesHTML(&$slideImages, $imageCount)
{
    $i = 0;
    $result = "";
	  
    foreach($slideImages as $key => $value)
    {
	$result .= "\t\t\t" . "<li><img src='$value'/></li>\n";
		
	$i++;
	
	if($i == $imageCount)
	{
	    break;
	}
    }
    
    return $result;
}

function listSubDirectories($dir)
{
    $subDirectories = array();
    
    foreach(scandir($dir) as $key => $value)
    {
        if($value === "." || $value === "..")
        {
            continue;
        }
        
        if(is_dir("$dir/$value"))
        {
            array_push($subDirectories, $value);
        }		
    }
    
    return $subDirectories;
}

function listFiles($dir, $extList = null)
{
    $files = array();
    $extensions = array();

    if ($extList != null)
    {
	$extensions = explode("|", $extList);
    }
	
    foreach(scandir($dir) as $key => $value)
    {
	if($value === "." || $value === "..")
	{
	    continue;
	} 
		
        if($extList != null)
	{
            foreach($extensions as $index => $ext)
            {
                if(stristr($value, $ext))
                {
                    $files[$value] = "$dir/$value";
                    break;
                }
            }
	}		
	else  
        {
            $files[$value] = "$dir/$value";
        }
    }
	
    return $files;
}

function remove_utf8_bom($text)
{
    $bom = pack('H*','EFBBBF');
    $text = preg_replace("/^$bom/", '', $text);
    return $text;
}

?>							
