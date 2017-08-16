<html>
<head>
<title>H2E Reports</title>
</head>
<!--<body onload="setInterval('window.location.reload()', (1000*60));">-->
<body>
    <font face='arial'>
<?php
/*
for this we will pull the files from outbound on H2E and dump them on our server, then we have to kill the files on H2E
now we have the files on our server, we need to go through each one and extract the order data
once we have done that, we can update IS and change the _fulfilment from PROCESSING to COMPLETE
and we can move the files to an archive dir.
*/

$dir    = 'H2E/reports/';
$files1 = scandir($dir);
foreach($files1 as $item)
    {
    if(strlen($item) > 5)
        {
        echo "<a href='".$dir.$item."'target='_new'>".$item."</a><br />";
        }
    }
?>
    </font>
</body>
</html>