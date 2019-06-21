<?php
$host ="localhost";
$dbusername ="root";
$dbpassword ="";
$databasename ="votesafe";
$mysqlconnect = mysql_connect($host,$dbusername,$dbpassword);
$dbselect = mysql_select_db($databasename,$mysqlconnect);
if($mysqlconnect){
	if($dbselect){
		$dbsucess = 1;
	}
	else{
		$dbsucess =0;
	}
}
else{
	$dbsucess = 0;
}
if($dbsucess==1){
$year = '2019';
$query = "SELECT * FROM complains where year ='".$year."';";
$t1n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'impersonation';";
$t2n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'impersonation';";
$t3n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'impersonation';";
$t4n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'impersonation';";
$t5n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'impersonation';";
$tq1n = mysql_query($t1n);
$tq2n = mysql_query($t2n);
$tq3n = mysql_query($t3n);
$tq4n = mysql_query($t4n);
$tq5n = mysql_query($t5n);
$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
while($row= @mysql_fetch_array($tq1n,MYSQL_ASSOC)){
	$c1= $row['c'];
	//echo ('hi');
	}
while($row= @mysql_fetch_array($tq2n,MYSQL_ASSOC)){
	$c2= $row['c'];
	}
while($row= @mysql_fetch_array($tq3n,MYSQL_ASSOC)){
	$c3= $row['c'];
	}
while($row= @mysql_fetch_array($tq4n,MYSQL_ASSOC)){
	$c4= $row['c'];
	}
while($row= @mysql_fetch_array($tq5n,MYSQL_ASSOC)){
	$c5= $row['c'];
	}
}
echo('
<!DOCTYPE HTML>
<html>
<head>
<script>
function genChart(){
let data=[{ y: '.$c1.', label: "Bribe" },
{ y: '.$c2.', label: "Loot" },
{ y: '.$c3.', label: "Murder" },
{ y: '.$c4.', label: "Manslaughter" },
{ y: '.$c5.', label: "Killing" },
];
let datapoints=[];
let datapoints2=[];
datapoints2=data;
let total=0;
for(let i=0;i<data.length;i++){
  total+=data[i].y
}
for(let i=0;i<data.length;i++){
  datapoints.push({y:data[i].y/total*100,label:data[i].label})
}

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Heading"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: datapoints
	}]
});
chart.render();
var barchart = new CanvasJS.Chart("barchartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Electoral crimes"
	},
	axisY: {
		title: "Number of crimes"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Number of crimes",
		dataPoints: datapoints2
	}]
});
barchart.render();

}
</script>
</head>
<body>
<button id="generate_chart" onclick="genChart();return;">Get charts</button>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<div id="barchartContainer" style="height: 300px; width: 100%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
');
?>