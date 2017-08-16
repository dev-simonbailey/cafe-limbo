<?php
/*
What we have to do is query the orders table and get the invoiceId of any orders that have a fulfilment status of PENDING...
We can then check the AmtDue value and see if it's the value of the TRIAL BOX and if it is, then we will add that record to the CSV String
then we can change the fulfilment status from PENDING => COMPLETE
*/
//call in the PHP SDK
require_once ('Infusionsoft/Infusionsoft/infusionsoft.php');
//Declare what we are looking for
$findState = "PENDING";

//set the first line of CSV output string
$csvString = "#Service Reference,Service,Recipient/Tracked Returns,Recipient/Tracked Returns Address line 1,Recipient/Tracked Returns Address line 2,Recipient/Tracked Returns Post Town,Recipient/Tracked Returns Postcode,Recipient/Tracked Returns Country Code,Reference,Items,Weight (g),Service Format";

//Go and get all the records that match what we are looking for
$orderItems = Infusionsoft_DataService::query(new Infusionsoft_Job(), array('_fulfilment' => $findState));
//loop through all the results
foreach($orderItems as $orderItem)
    {
    /*go and get the AmtDue value from the PayPlan table for this invoice*/
    $payments = Infusionsoft_DataService::query(new Infusionsoft_PayPlan(), array('invoiceId' => $orderItem->Id));
    $payment = array_shift($payments);
    /*if the value of AmtDue == value of the Trial Box, then we can add the shipping details from the invoice to the CSVSTRING and change the value of fulfilment from PENDING to COMPLETE*/
    if($payment->AmtDue == 1.00)
        {
        /*build the CSV in the following format
        #Service Reference,Service,Recipient,Recipient Address line 1,Recipient Address line 2,Recipient Post Town,Recipient Postcode,Recipient Country Code,Reference,Items,Weight (g),Service Format

        */
        if($orderItem->ShipStreet2 == "")
        	{	
        	$csvString .= "#SR1,CRL1,".$orderItem->ShipFirstName." ".$orderItem->ShipLastName.",".$orderItem->ShipStreet1.",,".$orderItem->ShipCity.",".$orderItem->ShipZip.",GB,TB-".$orderItem->Id.",1,460,LL";
        	}
        else
        	{
        	$csvString .= "#SR1,CRL1,".$orderItem->ShipFirstName." ".$orderItem->ShipLastName.",".$orderItem->ShipStreet1.",".$orderItem->ShipStreet2.",".$orderItem->ShipCity.",".$orderItem->ShipZip.",GB,TB-".$orderItem->Id.",1,460,LL";
        	}        
        //Change the value of fulfilment to COMPLETE and save it
        //$fulfil = new Infusionsoft_Job($orderItem->Id);
        //$fulfil->_fulfilment = "COMPLETE";
        //$fulfil->save();
        }
    	if($payment->AmtDue > 1.00 && $payment->AmtDue < 10.00)
    	    {
    	    /*build the CSV in the following format
    	    #Service Reference,Service,Recipient,Recipient Address line 1,Recipient Address line 2,Recipient Post Town,Recipient Postcode,Recipient Country Code,Reference,Items,Weight (g),Service Format
	
    	    */
    	    if($orderItem->ShipStreet2 == "")
    	    	{	
    	    	$csvString .= "#SR1,CRL1,".$orderItem->ShipFirstName." ".$orderItem->ShipLastName.",".$orderItem->ShipStreet1.",,".$orderItem->ShipCity.",".$orderItem->ShipZip.",GB,2K-".$orderItem->Id.",1,2460,PP";
    	    	}
    	    else
    	    	{
    	    	$csvString .= "#SR1,CRL1,".$orderItem->ShipFirstName." ".$orderItem->ShipLastName.",".$orderItem->ShipStreet1.",".$orderItem->ShipStreet2.",".$orderItem->ShipCity.",".$orderItem->ShipZip.",GB,2K-".$orderItem->Id.",1,2460,PP";
    	    	}
    	    
        //Change the value of fulfilment to COMPLETE and save it
        //$fulfil = new Infusionsoft_Job($orderItem->Id);
        //$fulfil->_fulfilment = "COMPLETE";
        //$fulfil->save();
        }
    }
/*clean the string*/
$csvString = str_replace('"','',$csvString);
/*now wee have built the CSVSTRING, lets now explode it into an array using the # as the separator, then push each line out to the CSV.*/
/*Lets get the input data and split it into an array*/
$dataArray = explode('#',$csvString);
//print_r($dataArray);

/*Get the date to use as part of the file name*/
$thisFile = "RMDMO/".date("d_m_Y")."_".date("H_i_s");
/* Send the output to file */
$file_output = fopen($thisFile.".csv","w");
foreach ($dataArray as $line)
       	{
       	if($line != "")
       		{
        	fputcsv($file_output,explode(',',$line));
        	}
        }
/* Break the reference with the last element */
unset($line);
/* Close the output file */
fclose($file_output);

//$pieces = explode("#", $csvString);
//print_r($pieces);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="http://mobile.insidetrackmedia.co.uk/favicon.ico" />
<title>parcelpet | RMDMO -> CSV</title>
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
        <img src='images/header_logo.png' style='float:left'/>RMDMO V1.0
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