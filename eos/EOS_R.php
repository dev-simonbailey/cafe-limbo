<?php
/*Lets get the input data and split it into an array*/
$dataArray = explode('#',$_POST['sendOrder']);
/*Get the date to use as part of the file name*/
$thisFile = "offline_order_".date("d_m_Y");
/* Send the output to file */
$file_output = fopen($thisFile.".csv","w");
foreach ($dataArray as $line)
        {fputcsv($file_output,explode(',',$line));}
/* Break the reference with the last element */
unset($line);
/* Close the output file */
fclose($file_output);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="http://mobile.insidetrackmedia.co.uk/favicon.ico" />
<title>parcelpet | EOS V1 Server</title>
<style>
body {padding:0; margin:0;}
#rcorners1 {
    margin: auto;
    border-radius: 25px;
    background: #834063;
    padding: 20px;
    width: 98%;
}
#header {
    background: #834063;
    padding: 20px;
    width: 100%;
}
</style>
</head>
<body bgcolor='#935073'>
<table width='100%' cellspacing='0' id='header'>
    <tr>
        <td style='font-family:arial;color:#FFFFFF;font-size:36px;' valign='middle' align='right'>
        <img src='header_logo.png' style='float:left'/>EOS V1.0
        </td>
    </tr>
</table>
<br />
<table width='100%' cellspacing='0' id='rcorners1'>
    <tr>
        <td style='background-color:#834063;height:30px;font-family:arial;color:#FFFFFF;font-size:22px;' valign='middle' align='center'>Download CSV File</td>
    </tr>
    <tr>
        <td style='background-color:#834063;height:30px;' valign='middle' align='center'>
<?php
 echo "<a href='".$thisFile.".csv' download><input type='button' value='Download' style='padding:5px;width:90%;border-radius: 25px;height:45px;color:#834063;font-size:18px;'/></a>";
 ?>
            <br /><br />
        </td>
    </tr>
</table>
<br />
<table width='100%' cellspacing='0' id='header'>
    <tr>
        <td style='font-family:arial;color:#FFFFFF;font-size:16px;' valign='middle' align='left'>
        <center>&copy 2017 parcelpet Ltd</center>
        </td>
    </tr>
</table>
</body>
</html>