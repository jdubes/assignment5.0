<!-- Includes top, header, and nav. Top adds the head section which have 
the web pages meta tags along with browser checks. Header adds the title 
and logo for the site. Nav adds the navigation for easy transitions -->
<?php
include ("top.php");

?>


<?php
/* Code to open a data file */

$debug = false;

if (isset($_GET["debug"])) {
    $debug = true;
}

$myFileName = "food";

$fileExt = ".csv";

$filename = $myFileName . $fileExt;

if ($debug) {
    print "\n\n<p>filename is " . $filename;
}

$file = fopen($filename, "r");

/* the variable $file will be empty or false if the file does not open */
if ($file) {
    if ($debug) {
        print "<p>File Opened</p>\n";
    }
}
?>

<?php
/* the variable $file will be empty or false if the file does not open */
if ($file) {

    if ($debug) {
        print "<p>Begin reading data into an array.</p>\n";
    }

    /* This reads the first row, which in our case is the column headers */
    $headers = fgetcsv($file);

    if ($debug) {
        print "<p>Finished reading headers.</p>\n";
        print "<p>My header array<p><pre> ";
        print_r($headers);
        print "</pre></p>";
    }
    /* the while (similar to a for loop) loop keeps executing until we reach 
     * the end of the file at which point it stops. the resulting variable 
     * $records is an array with all our data.
     */
    while (!feof($file)) {
        $records[] = fgetcsv($file);
    }

    //closes the file
    fclose($file);

    if ($debug) {
        print "<p>Finished reading data. File closed.</p>\n";
        print "<p>My data array<p><pre> ";
        print_r($records);
        print "</pre></p>";
    }
} // ends if file was opened
?>

<?php
/* display the data */
print "<ul class=" . "img-list". '>';

foreach ($records as $oneRecord) {
    if ($oneRecord[0] != "") {  //the eof would be a "" 
        
 

        print "\n\t<li>";
        //print out values
        print '<a href="' . $oneRecord[4] . '" target="_blank" ' . '>';
        print "\n\t";
        print '<img src="images/' . $oneRecord[5] .'" alt="' . $oneRecord[2] . '"/>';
        print '</a>';
        print '<span class="text-content">' . $oneRecord[1] . "<br>". $oneRecord[2] ."<br>"."Calories: " .$oneRecord[3]. '</span>';
        print "\n\t</li>";
    }
}
print '</ul>';


if ($debug)
    print "<p>End of processing.</p>\n";

?>


</body>
</html>
