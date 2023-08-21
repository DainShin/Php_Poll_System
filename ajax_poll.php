<?php

$vote = $_GET['vote'];

// This file is to save the numbers of the result
$filename = 'data/ajax_poll.txt';

// If the file doesn't exit, set the data(yes, no) to 0
if(!file_exists($filename)) {
    file_put_contents($filename, "0,0");  
}

// If the file exsit, get the value and split the data accroding to comma and store the data in the yes and no varibles separately
$content = file_get_contents($filename);  
list($yes, $no) = explode(',', $content);

// If the the value is 0, it means yes. If not, the value should be 1.
if($vote == 0) {  
    $yes = $yes + 1;
} elseif ($vote ==1 ) {  
    $no = $no + 1;
}

// Store the updated data in the file
file_put_contents($filename, "$yes, $no"); 

// Calculate the percentage of the data
$yes_width = round(($yes / ($yes + $no)) * 100);
$no_width = round(($no / ($yes + $no)) * 100);


?>

<!-- Result(including graph) -->
<h1>Result </h2>

<table>
    <tr>
        <td>Yes</td>
        <td width="100"><img src="https://www.w3schools.com/php/poll.gif" height="20" width="<?=$yes_width?>%"></td>
        <td><?=$yes_width ?>%</td>
    </tr>
    <tr>
        <td>No</td>
        <td><img src="https://www.w3schools.com/php/poll.gif" height="20" width="<?=$no_width?>%"></td>
        <td><?=$no_width ?>%</td>
    </tr>
</table>




