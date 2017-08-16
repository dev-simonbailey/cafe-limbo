<?php
$inputTags = filter_input(INPUT_GET, 'TL');
$userEmail = filter_input(INPUT_GET, 'UE');
$petType = filter_input(INPUT_GET, 'PT');

$tag_list = explode("@",$inputTags);
?>
<!DOCTYPE html>
<head>
    <title>Weighting</title>
<script type='text/javascript'>
var multiCount = 30;
// This array holds the values and states of the tags
var tagState = [];
<?php

if($inputTags != "")
	{
	for($i=0;$i<30;$i++)
		{
		$thisTag = explode("*",$tag_list[$i]);
		if($thisTag[1] == "true")
			{
			echo "tagState[".$i."] = {value:\"".$thisTag[0]."\",state:true,multi:".$thisTag[2]."};\n";
			}
		else
			{
			echo "tagState[".$i."] = {value:\"".$thisTag[0]."\",state:false,multi:1};\n";
			}
		}
	}
else
	{
	echo "tagState[0] = {value:\"CHICKEN\",state:false,multi:1};";
	echo "tagState[1] = {value:\"SALMON\",state:false,multi:1};";
	echo "tagState[2] = {value:\"PUPPY\",state:false,multi:1};";
	echo "tagState[3] = {value:\"SMALLKIBBLE\",state:false,multi:1};";
	echo "tagState[4] = {value:\"LONGWALKS\",state:false,multi:1};";
	echo "tagState[5] = {value:\"GRAINFREE\",state:false,multi:1};";
	echo "tagState[6] = {value:\"SMALLBAG\",state:false,multi:1};";
	echo "tagState[7] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[8] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[9] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[10] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[11] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[12] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[13] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[14] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[15] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[16] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[17] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[18] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[19] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[20] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[21] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[22] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[23] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[24] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[25] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[26] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[27] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[28] = {value:\"NULL\",state:false,multi:1};";
	echo "tagState[29] = {value:\"NULL\",state:false,multi:1};";
	}

?>

var PL = [];
PL[0] = {ID:"01A",Description:"Chicken & Rice Super Premium Puppy Food",Size:2000,Img:"Product 01A Image"};
PL[1] = {ID:"01B",Description:"Chicken & Rice Super Premium Puppy Food",Size:7500,Img:"Product 01B Image"};
PL[2] = {ID:"01C",Description:"Chicken & Rice Super Premium Puppy Food",Size:12000,Img:"Product 01C Image"};
PL[3] = {ID:"01D",Description:"Chicken & Rice Super Premium Puppy Food",Size:15000,Img:"Product 01D Image"};
PL[4] = {ID:"01E",Description:"Chicken & Rice Super Premium Puppy Food (Working Dog)",Size:15000,Img:"Product 01E Image"};
PL[5] = {ID:"02A",Description:"Salmon & Potato Super Premium Puppy Food",Size:2000,Img:"Product 02A Image"};
PL[6] = {ID:"02B",Description:"Salmon & Potato Super Premium Puppy Food",Size:12000,Img:"Product 02B Image"};
PL[7] = {ID:"02C",Description:"Salmon & Potato Super Premium Puppy Food",Size:15000,Img:"Product 02C Image"};
PL[8] = {ID:"02D",Description:"Salmon & Potato Super Premium Puppy Food (Working Dog)",Size:15000,Img:"Product 02D Image"};
PL[9] = {ID:"03A",Description:"Chicken & Rice Super Premuim Adult Food",Size:2000,Img:"Product 03A Image"};
PL[10] = {ID:"03B",Description:"Chicken & Rice Super Premuim Adult Food",Size:7500,Img:"Product 03B Image"};
PL[11] = {ID:"03C",Description:"Chicken & Rice Super Premuim Adult Food",Size:12000,Img:"Product 03C Image"};
PL[12] = {ID:"03D",Description:"Chicken & Rice Super Premuim Adult Food",Size:15000,Img:"Product 03D Image"};
PL[13] = {ID:"04A",Description:"Chicken & Rice Super Premuim Adult Food",Size:2000,Img:"Product 04A Image"};
PL[14] = {ID:"04B",Description:"Chicken & Rice Super Premuim Adult Food",Size:7500,Img:"Product 04B Image"};
PL[15] = {ID:"04C",Description:"Chicken & Rice Super Premuim Adult Food",Size:12000,Img:"Product 04C Image"};
PL[16] = {ID:"04D",Description:"Chicken & Rice Super Premuim Adult Food",Size:15000,Img:"Product 04D Image"};
PL[17] = {ID:"04E",Description:"Chicken & Rice Super Premuim Adult Food (Working Dog)",Size:15000,Img:"Product 04E Image"};
PL[18] = {ID:"05A",Description:"Chicken & Rice Super Premuim Adult Food",Size:2000,Img:"Product 05A Image"};
PL[19] = {ID:"05B",Description:"Chicken & Rice Super Premuim Adult Food",Size:12000,Img:"Product 05B Image"};
PL[20] = {ID:"05C",Description:"Chicken & Rice Super Premuim Adult Food",Size:15000,Img:"Product 05C Image"};
PL[21] = {ID:"05D",Description:"Chicken & Rice Super Premuim Adult Food (Working Dog)",Size:15000,Img:"Product 05D Image"};
PL[22] = {ID:"06A",Description:"Lamb & Rice Super Premuim Adult Food",Size:2000,Img:"Product 06A Image"};
PL[23] = {ID:"06B",Description:"Lamb & Rice Super Premuim Adult Food",Size:7500,Img:"Product 06B Image"};
PL[24] = {ID:"06C",Description:"Lamb & Rice Super Premuim Adult Food",Size:12000,Img:"Product 06C Image"};
PL[25] = {ID:"06D",Description:"Lamb & Rice Super Premuim Adult Food",Size:15000,Img:"Product 06D Image"};
PL[26] = {ID:"06E",Description:"Lamb & Rice Super Premuim Adult Food (Working Dog)",Size:15000,Img:"Product 06E Image"};
PL[27] = {ID:"07A",Description:"Lamb & Rice Super Premuim Adult Food (Added Verm-X)",Size:12000,Img:"Product 07A Image"};
PL[28] = {ID:"08A",Description:"Turkey & Rice Super Premuim Adult Food",Size:2000,Img:"Product 08A Image"};
PL[29] = {ID:"08B",Description:"Turkey & Rice Super Premuim Adult Food",Size:7500,Img:"Product 08B Image"};
PL[30] = {ID:"08C",Description:"Turkey & Rice Super Premuim Adult Food",Size:12000,Img:"Product 08C Image"};
PL[31] = {ID:"08D",Description:"Turkey & Rice Super Premuim Adult Food",Size:15000,Img:"Product 08D Image"};
PL[32] = {ID:"08E",Description:"Turkey & Rice Super Premuim Adult Food (Working Dog)",Size:15000,Img:"Product 08E Image"};
PL[33] = {ID:"09A",Description:"Salmon & Potato Super Premuim Adult Food",Size:2000,Img:"Product 09A Image"};
PL[34] = {ID:"09B",Description:"Salmon & Potato Super Premuim Adult Food",Size:7500,Img:"Product 09B Image"};
PL[35] = {ID:"09C",Description:"Salmon & Potato Super Premuim Adult Food",Size:12000,Img:"Product 09C Image"};
PL[36] = {ID:"09D",Description:"Salmon & Potato Super Premuim Adult Food",Size:15000,Img:"Product 09D Image"};
PL[37] = {ID:"10A",Description:"Salmon & Potato Super Premuim Adult Food",Size:2000,Img:"Product 10A Image"};
PL[38] = {ID:"10B",Description:"Salmon & Potato Super Premuim Adult Food",Size:7500,Img:"Product 10B Image"};
PL[39] = {ID:"10C",Description:"Salmon & Potato Super Premuim Adult Food",Size:12000,Img:"Product 10C Image"};
PL[40] = {ID:"10D",Description:"Salmon & Potato Super Premuim Adult Food",Size:15000,Img:"Product 10D Image"};
PL[41] = {ID:"10E",Description:"Salmon & Potato Super Premuim Adult Food (Working Dog)",Size:15000,Img:"Product 10E Image"};
PL[42] = {ID:"11A",Description:"Duck & Potato (No Added Grain) Super Premuim Adult Food",Size:2000,Img:"Product 11A Image"};
PL[43] = {ID:"11B",Description:"Duck & Potato (No Added Grain) Super Premuim Adult Food",Size:7500,Img:"Product 11B Image"};
PL[44] = {ID:"11C",Description:"Duck & Potato (No Added Grain) Super Premuim Adult Food",Size:12000,Img:"Product 11B Image"};
PL[45] = {ID:"11D",Description:"Duck & Potato (No Added Grain) Super Premuim Adult Food",Size:15000,Img:"Product 11B Image"};
PL[46] = {ID:"11E",Description:"Duck & Potato (No Added Grain) Super Premuim Adult Food (Working Dog)",Size:15000,Img:"Product 11B Image"};
PL[47] = {ID:"12A",Description:"Chicken & Rice Super Premuim Senior Food",Size:2000,Img:"Product 121A Image"};
PL[48] = {ID:"12B",Description:"Chicken & Rice Super Premuim Senior Food",Size:7500,Img:"Product 12B Image"};
PL[49] = {ID:"12C",Description:"Chicken & Rice Super Premuim Senior Food",Size:12000,Img:"Product 12C Image"};
PL[50] = {ID:"12D",Description:"Chicken & Rice Super Premuim Senior Food",Size:15000,Img:"Product 12D Image"};
PL[51] = {ID:"12E",Description:"Chicken & Rice Super Premuim Senior Food (Working Dog)",Size:15000,Img:"Product 12E Image"};
PL[52] = {ID:"13A",Description:"Chicken, Sweet Potato, Carrots & Peas Grain Free Puppy Food",Size:2000,Img:"Product 13A Image"};
PL[53] = {ID:"13B",Description:"Chicken, Sweet Potato, Carrots & Peas Grain Free Puppy Food",Size:6000,Img:"Product 13B Image"};
PL[54] = {ID:"13C",Description:"Chicken, Sweet Potato, Carrots & Peas Grain Free Puppy Food",Size:12000,Img:"Product 13C Image"};
PL[55] = {ID:"13D",Description:"Chicken, Sweet Potato, Carrots & Peas Grain Free Puppy Food (Working Dog)",Size:15000,Img:"Product 13D Image"};
PL[56] = {ID:"14A",Description:"Salmon, Sweet Potato & Vegtables Grain Free Puppy Food",Size:2000,Img:"Product 14A Image"};
PL[57] = {ID:"14B",Description:"Salmon, Sweet Potato & Vegtables Grain Free Puppy Food",Size:6000,Img:"Product 14B Image"};
PL[58] = {ID:"14C",Description:"Salmon, Sweet Potato & Vegtables Grain Free Puppy Food",Size:12000,Img:"Product 14C Image"};
PL[59] = {ID:"14D",Description:"Salmon, Sweet Potato & Vegtables Grain Free Puppy Food (Working Dog)",Size:15000,Img:"Product 14D Image"};
PL[60] = {ID:"15A",Description:"Salmon, Trout, Sweet Potato & Asparagus Grain Free Adult Food",Size:2000,Img:"Product 15A Image"};
PL[61] = {ID:"15B",Description:"Salmon, Trout, Sweet Potato & Asparagus Grain Free Adult Food",Size:6000,Img:"Product 15B Image"};
PL[62] = {ID:"15C",Description:"Salmon, Trout, Sweet Potato & Asparagus Grain Free Adult Food",Size:12000,Img:"Product 15C Image"};
PL[63] = {ID:"15D",Description:"Salmon, Trout, Sweet Potato & Asparagus Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 15D Image"};
PL[64] = {ID:"16A",Description:"Salmon, Trout, Sweet Potato & Asparagus Grain Free Adult Food",Size:2000,Img:"Product 16A Image"};
PL[65] = {ID:"16B",Description:"Salmon, Trout, Sweet Potato & Asparagus Grain Free Adult Food",Size:6000,Img:"Product 16B Image"};
PL[66] = {ID:"16C",Description:"Salmon, Trout, Sweet Potato & Asparagus Grain Free Adult Food",Size:12000,Img:"Product 16C Image"};
PL[67] = {ID:"16D",Description:"Salmon, Trout, Sweet Potato & Asparagus Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 16D Image"};
PL[68] = {ID:"17A",Description:"Haddock, Sweet Potato & Parsley Grain Free Adult Food",Size:2000,Img:"Product 17A Image"};
PL[69] = {ID:"17B",Description:"Haddock, Sweet Potato & Parsley Grain Free Adult Food",Size:6000,Img:"Product 17B Image"};
PL[70] = {ID:"17C",Description:"Haddock, Sweet Potato & Parsley Grain Free Adult Food",Size:12000,Img:"Product 17C Image"};
PL[71] = {ID:"17D",Description:"Haddock, Sweet Potato & Parsley Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 17D Image"};
PL[72] = {ID:"18A",Description:"Tuna, Salmon, Sweet Potato & Broccoli Grain Free Adult Food",Size:2000,Img:"Product 18A Image"};
PL[73] = {ID:"18B",Description:"Tuna, Salmon, Sweet Potato & Broccoli Grain Free Adult Food",Size:6000,Img:"Product 18B Image"};
PL[74] = {ID:"18C",Description:"Tuna, Salmon, Sweet Potato & Broccoli Grain Free Adult Food",Size:12000,Img:"Product 18C Image"};
PL[75] = {ID:"18D",Description:"Tuna, Salmon, Sweet Potato & Broccoli Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 18D Image"};
PL[76] = {ID:"19A",Description:"Chicken, Sweet Potato & Herbs Grain Free Adult Food",Size:2000,Img:"Product 19A Image"};
PL[77] = {ID:"19B",Description:"Chicken, Sweet Potato & Herbs Grain Free Adult Food",Size:6000,Img:"Product 19B Image"};
PL[78] = {ID:"20A",Description:"Chicken, Sweet Potato & Herbs Grain Free Adult Food",Size:2000,Img:"Product 20A Image"};
PL[79] = {ID:"20B",Description:"Chicken, Sweet Potato & Herbs Grain Free Adult Food",Size:6000,Img:"Product 20B Image"};
PL[80] = {ID:"20C",Description:"Chicken, Sweet Potato & Herbs Grain Free Adult Food",Size:12000,Img:"Product 20C Image"};
PL[81] = {ID:"20D",Description:"Chicken, Sweet Potato & Herbs Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 20D Image"};
PL[82] = {ID:"21A",Description:"Pork, Sweet Potato & Apple Grain Free Adult Food",Size:2000,Img:"Product 21A Image"};
PL[83] = {ID:"21B",Description:"Pork, Sweet Potato & Apple Grain Free Adult Food",Size:6000,Img:"Product 21B Image"};
PL[84] = {ID:"21C",Description:"Pork, Sweet Potato & Apple Grain Free Adult Food",Size:12000,Img:"Product 21C Image"};
PL[85] = {ID:"21D",Description:"Pork, Sweet Potato & Apple Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 21D Image"};
PL[86] = {ID:"22A",Description:"Turkey, Sweet Potato & Cranberry Grain Free Adult Food",Size:2000,Img:"Product 22A Image"};
PL[87] = {ID:"22B",Description:"Turkey, Sweet Potato & Cranberry Grain Free Adult Food",Size:6000,Img:"Product 22B Image"};
PL[88] = {ID:"22C",Description:"Turkey, Sweet Potato & Cranberry Grain Free Adult Food",Size:12000,Img:"Product 22C Image"};
PL[89] = {ID:"22D",Description:"Turkey, Sweet Potato & Cranberry Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 22D Image"};
PL[86] = {ID:"23A",Description:"Lamb, Sweet Potato & Mint Grain Free Adult Food",Size:2000,Img:"Product 23A Image"};
PL[87] = {ID:"23B",Description:"Lamb, Sweet Potato & Mint Grain Free Adult Food",Size:6000,Img:"Product 23B Image"};
PL[88] = {ID:"23C",Description:"Lamb, Sweet Potato & Mint Grain Free Adult Food",Size:12000,Img:"Product 23C Image"};
PL[89] = {ID:"23D",Description:"Lamb, Sweet Potato & Mint Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 23D Image"};
PL[90] = {ID:"24A",Description:"Duck Sweet Potato & Orange Grain Free Adult Food",Size:2000,Img:"Product 24A Image"};
PL[91] = {ID:"24B",Description:"Duck Sweet Potato & Orange Grain Free Adult Food",Size:6000,Img:"Product 24B Image"};
PL[92] = {ID:"24C",Description:"Duck Sweet Potato & Orange Grain Free Adult Food",Size:12000,Img:"Product 24C Image"};
PL[93] = {ID:"24D",Description:"Duck Sweet Potato & Orange Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 24D Image"};
PL[94] = {ID:"25A",Description:"Venison, Sweet Potato & Mulberry Grain Free Adult Food",Size:2000,Img:"Product 25A Image"};
PL[95] = {ID:"25B",Description:"Venison, Sweet Potato & Mulberry Grain Free Adult Food",Size:6000,Img:"Product 25B Image"};
PL[96] = {ID:"25C",Description:"Venison, Sweet Potato & Mulberry Grain Free Adult Food",Size:12000,Img:"Product 25C Image"};
PL[97] = {ID:"25D",Description:"Venison, Sweet Potato & Mulberry Grain Free Adult Food (Working Dog)",Size:15000,Img:"Product 25D Image"};
PL[98] = {ID:"26A",Description:"Trout, Salmon, Sweet Potato & Asparagus Grain Free Adult Light Food",Size:2000,Img:"Product 26A Image"};
PL[99] = {ID:"26B",Description:"Trout, Salmon, Sweet Potato & Asparagus Grain Free Adult Light Food",Size:6000,Img:"Product 26B Image"};
PL[100] = {ID:"26C",Description:"Trout, Salmon, Sweet Potato & Asparagus Grain Free Adult Light Food",Size:12000,Img:"Product 26C Image"};
PL[101] = {ID:"27A",Description:"Salmon, Sweet Potato & Asparagus Grain Free Senior Food",Size:2000,Img:"Product 27A Image"};
PL[102] = {ID:"27B",Description:"Salmon, Sweet Potato & Asparagus Grain Free Senior Food",Size:6000,Img:"Product 27B Image"};
PL[103] = {ID:"27C",Description:"Salmon, Sweet Potato & Asparagus Grain Free Senior Food",Size:12000,Img:"Product 27C Image"};
PL[104] = {ID:"27D",Description:"Salmon, Sweet Potato & Asparagus Grain Free Senior Food (Working Dog)",Size:15000,Img:"Product 27D Image"};
PL[105] = {ID:"28A",Description:"Turkey & Rice Naturals Puppy Food",Size:2000,Img:"Product 28A Image"};
PL[106] = {ID:"28B",Description:"Turkey & Rice Naturals Puppy Food",Size:12000,Img:"Product 28B Image"};
PL[107] = {ID:"29A",Description:"Fish & Rice Naturals Adult Food",Size:2000,Img:"Product 29A Image"};
PL[108] = {ID:"29B",Description:"Fish & Rice Naturals Adult Food",Size:12000,Img:"Product 29B Image"};
PL[109] = {ID:"30A",Description:"Fish & Rice Naturals Adult Food",Size:2000,Img:"Product 30A Image"};
PL[110] = {ID:"30B",Description:"Fish & Rice Naturals Adult Food",Size:12000,Img:"Product 30B Image"};
PL[111] = {ID:"31A",Description:"Turkey & Rice Naturals Adult Food",Size:2000,Img:"Product 31A Image"};
PL[112] = {ID:"31B",Description:"Turkey & Rice Naturals Adult Food",Size:12000,Img:"Product 31B Image"};
PL[113] = {ID:"32A",Description:"Turkey & Rice Naturals Adult Food",Size:2000,Img:"Product 32A Image"};
PL[114] = {ID:"32B",Description:"Turkey & Rice Naturals Adult Food",Size:12000,Img:"Product 32B Image"};
PL[115] = {ID:"33A",Description:"Lamb & Rice Naturals Adult Food",Size:2000,Img:"Product 33A Image"};
PL[116] = {ID:"33B",Description:"Lamb & Rice Naturals Adult Food",Size:12000,Img:"Product 33B Image"};
PL[117] = {ID:"34A",Description:"Lamb & Rice Naturals Adult Food",Size:2000,Img:"Product 34A Image"};
PL[118] = {ID:"34B",Description:"Lamb & Rice Naturals Adult Food",Size:12000,Img:"Product 34B Image"};
PL[119] = {ID:"35A",Description:"Garlic & Herbs Working Dog Premium Adult Food",Size:15000,Img:"Product 35A Image"};
PL[120] = {ID:"36A",Description:"Chicken & Rice Working Dog Rings Adult Food",Size:15000,Img:"Product 36A Image"};
PL[121] = {ID:"37A",Description:"Beef & Vegetables Working Dog Dinner Adult Food",Size:15000,Img:"Product 37A Image"};
PL[122] = {ID:"38A",Description:"Chicken & Vegetables Working Dog Dinner Adult Food",Size:15000,Img:"Product 38A Image"};
PL[123] = {ID:"39A",Description:"Meaty Chunks Working Dog Wonder Adult Food",Size:15000,Img:"Product 39A Image"};
PL[124] = {ID:"40A",Description:"Beef Rings Working Dog Adult Food",Size:15000,Img:"Product 40A Image"};
PL[125] = {ID:"41A",Description:"Gold Nuesli & Garlic Working Dog Adult Food",Size:15000,Img:"Product 41A Image"};
PL[126] = {ID:"42A",Description:"Working Dog Adult Food",Size:15000,Img:"Product 42A Image"};
PL[127] = {ID:"43A",Description:"Value Working Dog Adult Food",Size:15000,Img:"Product 43A Image"};
PL[128] = {ID:"44A",Description:"Economy Working Dog Adult Food",Size:15000,Img:"Product 44A Image"};
PL[129] = {ID:"45A",Description:"Snack Bones",Size:300,Img:"Product 45A Image"};
PL[130] = {ID:"46A",Description:"Semi-Moist Treats",Size:250,Img:"Product 46A Image"};
PL[131] = {ID:"47A",Description:"Grain Free 80% Fish Dog Treat",Size:500,Img:"Product 47A Image"};
PL[132] = {ID:"48A",Description:"Grain Free 80% Poultry Dog Treat",Size:500,Img:"Product 48A Image"};
PL[133] = {ID:"49A",Description:"Meaty Strips",Size:150,Img:"Product 49A Image"};
PL[134] = {ID:"50A",Description:"Dental Stix",Size:140,Img:"Product 50A Image"};
PL[135] = {ID:"51A",Description:"Training Treats",Size:130,Img:"Product 51A Image"};
PL[136] = {ID:"52A",Description:"Spirals",Size:105,Img:"Product 52A Image"};

// This is a temp output array - NOTE, TA.length MUST EQUAL PL.length
var TA = [];
TA[0] = {ID:"01A",weight:0};
TA[1] = {ID:"01B",weight:0};
TA[2] = {ID:"01C",weight:0};
TA[3] = {ID:"01D",weight:0};
TA[4] = {ID:"01E",weight:0};
TA[5] = {ID:"02A",weight:0};
TA[6] = {ID:"02B",weight:0};
TA[7] = {ID:"02C",weight:0};
TA[8] = {ID:"02D",weight:0};
TA[9] = {ID:"03A",weight:0};
TA[10] = {ID:"03B",weight:0};
TA[11] = {ID:"03C",weight:0};
TA[12] = {ID:"03D",weight:0};
TA[13] = {ID:"04A",weight:0};
TA[14] = {ID:"04B",weight:0};
TA[15] = {ID:"04C",weight:0};
TA[16] = {ID:"04D",weight:0};
TA[17] = {ID:"04E",weight:0};
TA[18] = {ID:"05A",weight:0};
TA[19] = {ID:"05B",weight:0};
TA[20] = {ID:"05C",weight:0};
TA[21] = {ID:"05D",weight:0};
TA[22] = {ID:"06A",weight:0};
TA[23] = {ID:"06B",weight:0};
TA[24] = {ID:"06C",weight:0};
TA[25] = {ID:"06D",weight:0};
TA[26] = {ID:"06E",weight:0};
TA[27] = {ID:"07A",weight:0};
TA[28] = {ID:"08A",weight:0};
TA[29] = {ID:"08B",weight:0};
TA[30] = {ID:"08C",weight:0};
TA[31] = {ID:"08D",weight:0};
TA[32] = {ID:"08E",weight:0};
TA[33] = {ID:"09A",weight:0};
TA[34] = {ID:"09B",weight:0};
TA[35] = {ID:"09C",weight:0};
TA[36] = {ID:"09D",weight:0};
TA[37] = {ID:"10A",weight:0};
TA[38] = {ID:"10B",weight:0};
TA[39] = {ID:"10C",weight:0};
TA[40] = {ID:"10D",weight:0};
TA[41] = {ID:"10E",weight:0};
TA[42] = {ID:"11A",weight:0};
TA[43] = {ID:"11B",weight:0};
TA[44] = {ID:"11C",weight:0};
TA[45] = {ID:"12A",weight:0};
TA[46] = {ID:"12B",weight:0};
TA[47] = {ID:"12C",weight:0};
TA[48] = {ID:"13A",weight:0};
TA[49] = {ID:"13B",weight:0};
TA[50] = {ID:"13C",weight:0};
TA[51] = {ID:"13D",weight:0};
TA[52] = {ID:"14A",weight:0};
TA[53] = {ID:"14B",weight:0};
TA[54] = {ID:"14C",weight:0};
TA[55] = {ID:"14D",weight:0};
TA[56] = {ID:"15A",weight:0};
TA[57] = {ID:"15B",weight:0};
TA[58] = {ID:"15C",weight:0};
TA[59] = {ID:"15D",weight:0};
TA[60] = {ID:"16A",weight:0};
TA[61] = {ID:"16B",weight:0};
TA[62] = {ID:"16C",weight:0};
TA[63] = {ID:"16D",weight:0};
TA[64] = {ID:"17A",weight:0};
TA[65] = {ID:"17B",weight:0};
TA[66] = {ID:"17C",weight:0};
TA[67] = {ID:"17D",weight:0};
TA[68] = {ID:"18A",weight:0};
TA[69] = {ID:"18B",weight:0};
TA[70] = {ID:"18C",weight:0};
TA[71] = {ID:"18D",weight:0};
TA[72] = {ID:"19A",weight:0};
TA[73] = {ID:"19B",weight:0};
TA[74] = {ID:"20A",weight:0};
TA[75] = {ID:"20B",weight:0};
TA[76] = {ID:"20C",weight:0};
TA[77] = {ID:"20D",weight:0};
TA[78] = {ID:"21A",weight:0};
TA[79] = {ID:"21B",weight:0};
TA[80] = {ID:"21C",weight:0};
TA[81] = {ID:"21D",weight:0};
TA[82] = {ID:"22A",weight:0};
TA[83] = {ID:"22B",weight:0};
TA[84] = {ID:"22C",weight:0};
TA[85] = {ID:"22D",weight:0};
TA[86] = {ID:"23A",weight:0};
TA[87] = {ID:"23B",weight:0};
TA[88] = {ID:"23C",weight:0};
TA[89] = {ID:"23D",weight:0};
TA[90] = {ID:"24A",weight:0};
TA[91] = {ID:"24B",weight:0};
TA[92] = {ID:"24C",weight:0};
TA[93] = {ID:"24D",weight:0};
TA[94] = {ID:"25A",weight:0};
TA[95] = {ID:"25B",weight:0};
TA[96] = {ID:"25C",weight:0};
TA[97] = {ID:"25D",weight:0};
TA[98] = {ID:"26A",weight:0};
TA[99] = {ID:"26B",weight:0};
TA[100] = {ID:"26C",weight:0};
TA[101] = {ID:"27A",weight:0};
TA[102] = {ID:"27B",weight:0};
TA[103] = {ID:"27C",weight:0};
TA[104] = {ID:"27D",weight:0};
TA[105] = {ID:"28A",weight:0};
TA[106] = {ID:"28B",weight:0};
TA[107] = {ID:"29A",weight:0};
TA[108] = {ID:"29B",weight:0};
TA[109] = {ID:"30A",weight:0};
TA[110] = {ID:"30B",weight:0};
TA[111] = {ID:"31A",weight:0};
TA[112] = {ID:"31B",weight:0};
TA[113] = {ID:"32A",weight:0};
TA[114] = {ID:"32B",weight:0};
TA[115] = {ID:"33A",weight:0};
TA[116] = {ID:"33B",weight:0};
TA[117] = {ID:"34A",weight:0};
TA[118] = {ID:"34B",weight:0};
TA[119] = {ID:"35A",weight:0};
TA[120] = {ID:"36A",weight:0};
TA[121] = {ID:"37A",weight:0};
TA[122] = {ID:"38A",weight:0};
TA[123] = {ID:"39A",weight:0};
TA[124] = {ID:"40A",weight:0};
TA[125] = {ID:"41A",weight:0};
TA[126] = {ID:"42A",weight:0};
TA[127] = {ID:"43A",weight:0};
TA[128] = {ID:"44A",weight:0};
TA[129] = {ID:"45A",weight:0};
TA[130] = {ID:"46A",weight:0};
TA[131] = {ID:"47A",weight:0};
TA[132] = {ID:"48A",weight:0};
TA[133] = {ID:"49A",weight:0};
TA[134] = {ID:"50A",weight:0};
TA[135] = {ID:"51A",weight:0};
TA[136] = {ID:"52A",weight:0};

// This array holds the metadata for the PL array
var MD = [];
MD[0] = {ID:"01A",value:"CHICKEN",weight:100};
MD[1] = {ID:"01B",value:"CHICKEN",weight:100};
MD[2] = {ID:"01C",value:"CHICKEN",weight:100};
MD[3] = {ID:"01D",value:"CHICKEN",weight:100};
MD[4] = {ID:"01E",value:"CHICKEN",weight:100};
MD[5] = {ID:"02A",value:"SALMON",weight:100};
MD[6] = {ID:"02B",value:"SALMON",weight:100};
MD[7] = {ID:"02C",value:"SALMON",weight:100};
MD[8] = {ID:"02D",value:"SALMON",weight:100};
MD[9] = {ID:"02E",value:"SALMON",weight:100};
MD[10] = {ID:"02B",value:"PUPPY",weight:100};
MD[11] = {ID:"01E",value:"PUPPY",weight:100};
MD[8] = {ID:"02D",value:"SMALLKIBBLE",weight:100};

// This is the function that loops through the arrays, and returns the temp array in a sorted by weight order
function getScore()
	{
	for(a=0;a<PL.length;a++)
		{
		TA[a]["ID"] = a+1;
		TA[a]["weight"] = 0;
		for(b=0;b<MD.length;b++)
			{
			for(c=0;c<tagState.length;c++)
				{
				if(tagState[c]["value"] !== "NULL")
					{
					if(MD[b]["ID"] === PL[a]["ID"] && tagState[c]["state"] === true && tagState[c]["value"] === MD[b]["value"])
						{
						TA[a]["ID"] = PL[a]["ID"];
						TA[a]["weight"] = +TA[a]["weight"] + +MD[b]["weight"] * +tagState[c]["multi"];
						}
					}
				}
			}
		}
	TA.sort(function(a, b){return b.weight - a.weight;});
	showOutput();
	}
// This function just sets the state of the selected tag
function setState(item,thisON,thisOFF)
	{
	console.log(thisON);
	console.log(thisOFF);
	if(tagState[item]["state"] === false)
		{
		tagState[item]["state"] = true;
		tagState[item]["multi"] = multiCount;
		multiCount --;
		console.log(tagState[item]["value"]+"="+tagState[item]["state"]);
		document.getElementById(thisON).style.visibility = "visible";
		document.getElementById(thisOFF).style.visibility = "hidden";
		}
	else
		{
		tagState[item]["state"] = false;
		tagState[item]["multi"] = 1;
		multiCount ++;
		console.log(tagState[item]["value"]+"="+tagState[item]["state"]);
		document.getElementById(thisON).style.visibility = "visible";
		document.getElementById(thisOFF).style.visibility = "hidden";
		}
	getScore();
	}
// This function just dumps the contents of TA to screen
function showOutput()
	{
	var rStr = "<ul>";
	for(i=0;i<TA.length;i++)
		{
		for(x=0;x<PL.length;x++)
			{
			if(TA[i]["ID"] === PL[x]["ID"])
				{
				if(TA[i]["weight"] > 0)
					{
					rStr = rStr + "<li>Product ID: "+TA[i]["ID"]+ "<ul><li>Description: " + PL[x]["Description"]+"</li><li>Weight:"+TA[i]["weight"]+"</li><li>Image: "+PL[x]["Img"]+"</li><li>Bag Size: "+PL[x]["Size"]+"</li></ul></li>";
					}
				}
			}
		}
	rStr = rStr + "</ul>";
	document.getElementById('showProducts').innerHTML = rStr;
	}
</script>
<style>
body
	{
	background-color:#F4F4F4;
	}
.tagON
	{
	background-color:#834063;
	border-radius: 5px 10px;
	border: 1px solid #834063;
	font-family:arial;
	color:#FFF;
	height:40px;
	margin:5px;
	}
.tagOFF
	{
	background-color:#834063;
	border-radius: 5px 10px;
	border: 1px solid #834063;
	font-family:arial;
	color:#FFF;
	visibility:hidden;
	height:40px;
	margin:5px;
	}
fieldset 
	{
	border: 1px solid #834963;
	background-color:#F4F4F4;
	width:400px;
	border-radius:20px
	}

legend 
	{
	padding: 0.2em 0.5em;
	border: 1px solid #834963;
  	color:#834063;
  	font-size:90%;
  	text-align:left;
  	font-family:arial;
  	border-radius: 5px;
  	background-color:#F4F4F4;
  	color:#834063;
  	font-weight:bold;
  	height:40px;
  	width:96%
  	}
</style>
</head>
<body onload='getScore();'>
<div id='buttonOn'>
	<fieldset>
		<legend style='margin:auto;'>Choose all the things<br /> you and your pet really love</legend>
		<input class='tagON' type='button' value='Chicken&nbsp;&nbsp;&nbsp;&nbsp;+' id='chickenON' onclick='setState(0,"chickenOFF","chickenON");'>
		<input class='tagON' type='button' value='Salmon&nbsp;&nbsp;&nbsp;&nbsp;+' id='salmonON' onclick='setState(1,"salmonOFF","salmonON");'>
		<input class='tagON' type='button' value='Puppy&nbsp;&nbsp;&nbsp;&nbsp;+' id='puppyON' onclick='setState(2,"puppyOFF","puppyON");'>
		<input class='tagON' type='button' value='Small Kibble&nbsp;&nbsp;&nbsp;&nbsp;+' id='smallkibbleON' onclick='setState(3,"smallkibbleOFF","smallkibbleON");'>
		<input class='tagON' type='button' value='Orange&nbsp;&nbsp;&nbsp;&nbsp;+' id='orangeON' onclick='setState(4,"orangeOFF","orangeON");'>
		<input class='tagON' type='button' value='Grain Free&nbsp;&nbsp;&nbsp;&nbsp;+' id='grainFreeON' onclick='setState(5,"grainFreeOFF","grainFreeON");'>
		<input class='tagON' type='button' value='2Kg bag&nbsp;&nbsp;&nbsp;&nbsp;+' id='2kgON' onclick='setState(6,"2kgOFF","2kgON");'>
		<input class='tagON' type='button' value='Long Walks&nbsp;&nbsp;&nbsp;&nbsp;+' id='tag8ON' onclick='setState(4,"tag8OFF","tag8ON");'>
		<input class='tagON' type='button' value='Cuddles&nbsp;&nbsp;&nbsp;&nbsp;+' id='grainFreeON' onclick='setState(5,"grainFreeOFF","grainFreeON");'>
		<input class='tagON' type='button' value='Lazy Days&nbsp;&nbsp;&nbsp;&nbsp;+' id='2kgON' onclick='setState(6,"2kgOFF","2kgON");'>
	</fieldset>
</div>
<br /><br />
<div id='buttonOff'>
	<fieldset>
		<legend style='margin: auto;'>We will find the food your<br />pet will love using these things</legend>
		<input class='tagOFF' type='button' value='Chicken&nbsp;&nbsp;&nbsp;&nbsp;x' id='chickenOFF' onclick='setState(0,"chickenON","chickenOFF");'>
		<input class='tagOFF' type='button' value='Salmon&nbsp;&nbsp;&nbsp;&nbsp;x' id='salmonOFF' onclick='setState(1,"salmonON","salmonOFF");'>
		<input class='tagOFF' type='button' value='Puppy&nbsp;&nbsp;&nbsp;&nbsp;x' id='puppyOFF' onclick='setState(2,"puppyON","puppyOFF");'>
		<input class='tagOFF' type='button' value='Small Kibble&nbsp;&nbsp;&nbsp;&nbsp;x' id='smallkibbleOFF' onclick='setState(3,"smallkibbleON","smallkibbleOFF");'>
		<input class='tagOFF' type='button' value='Orange&nbsp;&nbsp;&nbsp;&nbsp;x' id='orangeOFF' onclick='setState(4,"orangeON","orangeOFF");'>
		<input class='tagOFF' type='button' value='Grain Free&nbsp;&nbsp;&nbsp;&nbsp;x' id='grainFreeOFF' onclick='setState(5,"grainFreeON","grainFreeOFF");'>
		<input class='tagOFF' type='button' value='2Kg bag&nbsp;&nbsp;&nbsp;&nbsp;x' id='2kgOFF' onclick='setState(6,"2kgON","2kgOFF");'>
		<input class='tagOFF' type='button' value='We Love Long Walks Too&nbsp;&nbsp;&nbsp;&nbsp;x' id='tag8OFF' onclick='setState(4,"tag8ON","tag8OFF");'>
		<input class='tagOFF' type='button' value='Cuddles&nbsp;&nbsp;&nbsp;&nbsp;+' id='grainFreeON' onclick='setState(5,"grainFreeOFF","grainFreeON");'>
		<input class='tagOFF' type='button' value='Lazy Days&nbsp;&nbsp;&nbsp;&nbsp;+' id='2kgON' onclick='setState(6,"2kgOFF","2kgON");'>
	</fieldset>
</div>

<div id='showProducts'></div>
</body>
</html>