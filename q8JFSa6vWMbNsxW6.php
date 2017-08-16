<?php
/*
Added a comment
What we have to do is query the orders table and get the invoiceId of any orders that have a fulfilment status of PENDING...
We can then check the AmtDue value and see if it's the value of the TRIAL BOX and if it is, then we will add that record to the CSV String
then we can change the fulfilment status from PENDING => COMPLETE
*/
//call in the PHP SDK
require_once ('Infusionsoft/Infusionsoft/infusionsoft.php');
include("../M0nst3R/h2eAccess.php");

/*set the date to the local zone - GMT*/
date_default_timezone_set("Europe/London");

/*declare the variables for the counter*/
$orders_uploaded = 0;
$count_date = date("d/m/Y");
$count_time = date("H:i:s");

//Declare what we are looking for
$findState = "PENDING";

//Go and get all the records that match what we are looking for
$orderItems = Infusionsoft_DataService::query(new Infusionsoft_Job(), array('_fulfilment' => $findState));

//print_r($orderItems);

/*get the time 00-00-00*/
$fileTime = date("H-i-s");

/*get the date YYYY-MM-DD*/
$fileDate = date("Y-m-d");

/*declare the error and report message var*/
$errMsg="";
$errStr="";
$repMsg="<html><head><title>Warehouse Instructions Reports</title></head><body>";

// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

/* change the dir to where we need to upload to*/
ftp_chdir($conn_id,"test");

//loop through all the results
foreach($orderItems as $orderItem)
    {
    $xmlString = "";
    /*go and get the data from the PayPlan table for this invoice*/
    $payments = Infusionsoft_DataService::query(new Infusionsoft_PayPlan(), array('InvoiceId' => $orderItem->Id));
    $payment = array_shift($payments);
//print_r($payment);

    /*go and get the data value from the OrderItem table for this invoice*/
    $orderDetails = Infusionsoft_DataService::query(new Infusionsoft_OrderItem(), array('OrderId' => $orderItem->Id, 'ProductId' => '~<>~0'));
    $orderDetail = array_shift($orderDetails);
//print_r($orderDetail);

    $paymentDetails = Infusionsoft_DataService::query(new Infusionsoft_Invoice(), array('JobId' => $orderitem->Id));
    $paymentDetail = array_shift($paymentDetails);
    
if($orderDetail->ProductId != "0")
	{
    	/*go and get the data value from the Product table for this invoice*/
    	$productDetails = Infusionsoft_DataService::query(new Infusionsoft_Product(), array('Id' => $orderDetail->ProductId));
    	$productDetail = array_shift($productDetails);
    	//print_r($productDetail);
    	}

 /*if the value of AmtDue > value of the Trial Box, then we will add the details of this invoice to the xmlString and push it out to file*/
 /*lets do some checking to make sure we only process invoices that have valid shipping details*/
    //if($payment->AmtDue > 10.00 && $orderItem->ShipFirstName !="" && $orderItem->ShipLastName != "" && $orderItem->ShipStreet1 != "" && $orderItem->ShipCity != "" && $orderItem->ShipZip != "" && $productDetail->Sku != "" && $orderDetail->Qty != "")
    	if($payment->AmtDue > 10 && $paymentDetails->PayStatus == 1)	
    	{
        /*convert the order number into a complete order number*/
        $completeOrderNo = $orderItem->Id + 200000000;

	/*It was decided on the 31/07/2017 that we we not use the date from IS, instead use the date the XML was generated.*/
	/*We will keep this in in case we want to use it in the future*/
        /*Get the date and split it onto components, then we can use PHP to split it apart and also + 1 day to create the orderdue date*/
        //$invoiceDate = $orderItem->DateCreated;
	/*explode $invoiceDate at the "T", then pull [0] apart YYYY MM DD*/
        //$dateBits = explode("T", $invoiceDate);
	/*Pull $dateBits apart for the date*/
        /*First the year as it's the first four characters*/
        //$dataYY = substr($dateBits[0],0, 4);
        /*next get the month*/
        //$dataMM = substr($dateBits[0],4, 2);
	/*finally get the day*/
        //$dataDD = substr($dateBits[0],6, 2);
	/*put the date back together in the format we need*/
        //$dataDate = $dataDD."-".$dataMM."-".$dataYY;

	/* dont use the order date from IS, instead use the date the XML is generated*/
	$dataDate = date('d-m-Y');
        
        /*add one day to the date to use as the due date*/
        $dueDate = date('d-m-Y', strtotime($dataDate . ' +1 day'));

        /*build the XML file as per H2E spec*/
        //$xmlString .= "<orderItem->Id=".$orderItem->Id."/>";
        //$xmlString .= "<orderDetail->ProductId=".$orderDetail->ProductId."/>";
        $xmlString .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlString .= "<OrderEnvelope type=\"WarehouseInstruction\">";
        $xmlString .= "<Header>";
        $xmlString .= "<SenderDetails>";
        $xmlString .= "<CustomerAccount>PPET</CustomerAccount>";
        $xmlString .= "</SenderDetails>";
        $xmlString .= "<OrderDetails>";
        $xmlString .= "<SalesOrder>".$completeOrderNo."</SalesOrder>";
        $xmlString .= "<CustomerReference>".$completeOrderNo."</CustomerReference>";
        $xmlString .= "<OrderDate>".$dataDate."</OrderDate>";
        $xmlString .= "<OrderDue>".$dueDate."</OrderDue>";
        $xmlString .= "<OrderValue>".$payment->AmtDue."</OrderValue>";
        $xmlString .= "<NumLines>1</NumLines>";
        $xmlString .= "<DeliveryMethod>0</DeliveryMethod>";
        $xmlString .= "<Dropship>true</Dropship>";
        $xmlString .= "</OrderDetails>";
        $xmlString .= "<DeliverTo>";
        $xmlString .= "<Contact>";
        $xmlString .= "<Name>".$orderItem->ShipFirstName." ".$orderItem->ShipLastName."</Name>";
        $xmlString .= "</Contact>";
        $xmlString .= "<Address>";
        $xmlString .= "<Organisation/>";
        $xmlString .= "<Address1>".$orderItem->ShipStreet1."</Address1>";
        $xmlString .= "<Address2></Address2>";
        $xmlString .= "<Address3/>";
        $xmlString .= "<Address4/>";
        $xmlString .= "<Address5/>";
        $xmlString .= "<City>".$orderItem->ShipCity."</City>";
        $xmlString .= "<State/>";
        $xmlString .= "<Postcode>".$orderItem->ShipZip."</Postcode>";
        $xmlString .= "<Country>GB</Country>";
        $xmlString .= "</Address>";
        $xmlString .= "</DeliverTo>";
        $xmlString .= "</Header>";
        $xmlString .= "<OrderLines>";
        $xmlString .= "<Line item=\"1\">";
        $xmlString .= "<SupplierRef>".$productDetail->Sku."</SupplierRef>";
        $xmlString .= "<QtyRequested>".$orderDetail->Qty."</QtyRequested>";
        $xmlString .= "<UnitPrice>".$productDetail->ProductPrice."</UnitPrice>";
        $xmlString .= "<LineValue>".$payment->AmtDue."</LineValue>";
        $xmlString .= "<Description>";
        $xmlString .= "<Text1>".$productDetail->Sku."</Text1>";
        $xmlString .= "<Text2>".$orderItem->_DeliveryInstructions."</Text2>";
        $xmlString .= "</Description>";
        $xmlString .= "</Line>";
        $xmlString .= "</OrderLines>";
        $xmlString .= "</OrderEnvelope>";
        $thisFile =  "WI_".$fileDate."-".$fileTime."_PPET_".$completeOrderNo;
        $myfile = fopen("H2E/inbox/".$thisFile.".xml", "w") or die("Unable to open file!");
        fwrite($myfile, $xmlString);
        fclose($myfile);

        /*this is for the report txt file*/
        $repMsg .= "<p>CREATED: ".$thisFile.".xml</p>\n";

        /*echo the same to screen - Not needed for CRON job*/
        //echo "CREATED: ".$thisFile.".xml<br />\n";

        /*pass the current filename into the var*/
        $file = "H2E/inbox/".$thisFile.".xml";

        /*Pass the current filename into the var*/
        $remote_file = $thisFile.".xml";

        // upload the file
        if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII))
            {
            /*this is for the report txt file*/
            $repMsg .= "<p>UPLOADED: ".$file."</p>\n";

            /*If the file was successfully FTPd to H2E, move the file fromtheh inbox to the outbox*/
            rename("H2E/inbox/".$thisFile.".xml","H2E/outbox/".$thisFile.".xml");
            
            $orders_uploaded = $orders_uploaded+1;
            
            /*Set the fulfilment flag to COMPLETE - COMMENTED FOR TESTING*/
            $fulfil = new Infusionsoft_Job($orderItem->Id);
            $fulfil->_fulfilment = "COMPLETE";
            $fulfil->save();

            /*echo the same to the screen - Not needed for CRON job */
            //echo "UPLOADED: ".$file."<br /><br />\n";
            }
        else
            {
            /*this is for the report txt file */
            $repMsg .= "<p>ERROR: ".$file."NOT UPLOADED</p>\n";

            /*echo the same to the screen - Not needed for CRON job*/
            //echo "ERROR: ".$file." NOT UPLOADED<br /><br />\n";
            }
        //reset the output string
        $xmlString = "";


        }
    else
        {
        /*lets do some error checking in cse any invoices need to be looked at because of ommisions*/
        $errMsg .= "ERROR:<br /><br />\n";
        $errStr .= "<p>ERROR:</p>\n";
        $errMsg .= "Order number: ".$orderItem->Id." could not be processed because of the following errors:\n<br/>\n<ul>";
        $errStr .= "<p>Order number: ".$orderItem->Id." could not be processed because of the following errors:</p>\n<ul>\n";

        if($orderItem->ShipFirstName !="")
            {
            $errStr .= "<li>ShipFirstName is not present</li>\n";
            //$errStr .= "<li>ShipFirstName is not present</li>\n";
            }
        if($orderItem->ShipLastName !="")
            {
            $errStr .= "<li>ShipLastName is not present</li>\n";
            //$errStr .= "\tShipLastName is not present\n";
            }
         if($orderItem->ShipStreet1 !="")
            {
            $errStr .= "<li>ShipStreet1 is not present</li>\n";
            //$errStr .= "\tShipStreet1 is not present\n";
            }
         if($orderItem->ShipCity !="")
            {
            $errStr .= "<li>ShipCity is not present</li>\n";
            //$errStr .= "\tShipCity is not present\n";
            }
         if($orderItem->ShipZip !="")
            {
            $errStr .= "<li>ShipZip is not present</li>\n";
            //$errStr .= "\tShipZip is not present\n";
            }
         if($productDetail->Sku !="")
            {
            $errStr .= "<li>Sku not present</li>\n";
            //$errStr .= "\tSku not present\n";
            }
         if($orderDetail->Qty !="")
            {
            $errStr .= "<li>Qty is not present</li></ul></body></html>\n";
            //$errStr .= "\tQty is not present\n";
            }
        }
    }
    /*for the report txt file*/
    $repMsg .= "\n******************* WARNINGS *******************\n";

    /*for the report txt file*/
    $repMsg .= $errStr;

    //Not required for CRON job
    /*create a noticable divider*/
    //echo "<br /><br />******************* WARNINGS *******************<br /><br />";
    //echo any errors
    //echo $errMsg;

    // close the connection
    ftp_close($conn_id);

    /*Save out the count file for this process*/
    $countString = $count_date.",".$count_time.",".$orders_uploaded."\n";
    $oVolFile = fopen("H2E/counts/orderOutVol.txt", "a") or die("Unable to open oVolFile!");
    fwrite($oVolFile, $countString);
    fclose($oVolFile);

    /*Save out the report file for this process*/
    $repFile =  "REPORT-".$fileDate."-".$fileTime."H2E";
    $keepfile = fopen("H2E/reports/".$repFile.".html", "w") or die("Unable to open file!");
    fwrite($keepfile, $repMsg);
    fclose($keepfile);

?>