<?
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery-latest.js"></script>
<title>Room Assign</title>
<style type="text/css">
body {
	margin:0;
	padding:0;
	background-color: #FFFFFF;
}
table.reference {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	border:1px solid #d4eaf2;
	border-collapse:collapse;
	color:#0d6e91;
}
table.reference th {
	background-color:#eaf7fb;
	border:1px solid #d4eaf2;
	padding:3px;
	vertical-align:middle;
}
table.reference td {
	border:1px solid #d4eaf2;
	vertical-align:middle;
	padding:3px;
}
</style>
<script type="text/javascript">
function date(obj)
{
	alert(obj.value);
	var txtdate = obj.value;
	if(txtdate==""){
		return false;
	}
	window.location.href = "<? echo $_SERVER['PHP_SELF']; ?>?date="+txtdate;
}
function room1(obj)
{
	var txtdate = document.getElementById('txtdate').value;
	var cboroom = document.getElementById('cboroom').value;
	if(txtdate=="" || cboroom=="")
	{
		return false;
	}
	window.location.href = "<? echo $_SERVER['PHP_SELF']; ?>?date="+txtdate+"&room="+cboroom;
}
function validate()
{
	var txtdate = document.getElementById('txtdate').value;
	var cboroom = document.getElementById('cboroom').value;
	var cbodoctor = document.getElementById('cbodoctor').value;
	
	if(txtdate=="" || cboroom=="" || cbodoctor=="" )
	{
		alert("Please fill up all mandaroty fields!!!");
		return false;
	}
	else
	{
		window.location.href = "<? echo $_SERVER['PHP_SELF']; ?>?date="+txtdate+"&room="+cboroom+"&docid="+cbodoctor;
	}
}
</script>
</head>
<body>
<table align="center" border="0" cellspacing="0" cellpadding="0" class="reference">
  <tr>
    <th colspan="2" align="center" valign="top">REPORT FOR ROOM ASSIGN</th>
  </tr>
  <tr>
	  <td align="right" valign="top">SELECT DATE :*</td>
	  <td align="left" valign="top"><input type="text" onChange="date(this)" name="txtdate" id="txtdate" onclick="ds_sh(this)" style="cursor:pointer;" value="<? echo $date;?>"/>&nbsp;[MM-DD-YYYY]</td>
  </tr>
	<tr>
	  <td align="right" valign="top">SELECT ROOM NO :*</td>
	  <td align="left" valign="top">
      <select name="cboroom" id="cboroom" onchange="room(this)">
        <option value="">--Select Room--</option>
        <?
			$sqlroom = "select * from roommaster";
			$rsroom = mysql_query($sqlroom) or die(mysql_error());
			while($dataroom = mysql_fetch_assoc($rsroom)) 
			{
				?>
				<option value="<? echo $dataroom['id'];?>" <? if($room==$dataroom['id']){?> selected="selected"<? }?>><? echo strtoupper($dataroom['roomno']);?></option>
				<?
			}
		
        ?>
        </select>      </td>
  </tr>
  <tr>
	  <td align="right" valign="top">SELECT DOCTOR :*</td>
	  <td align="left" valign="top">
      <select name="cbodoctor" id="cbodoctor">
        <option value="">--Select Doctor--</option>
        <?
			$sqldoc = "select * from doctormaster";
			$rsdoc = mysql_query($sqldoc) or die(mysql_error());
			while($datadoc = mysql_fetch_assoc($rsdoc)) 
			{
				?>
				<option value="<? echo $datadoc['docid'];?>" <? if($docid==$datadoc['docid']){?> selected="selected"<? }?>><? echo strtoupper($datadoc['fname'].' '.$datadoc['mname'].' '.$datadoc['lname']);?></option>
				<?
			}
		
        ?>
        </select>  </td>
  </tr>
	
	
	<tr>
	  <td align="right" valign="top">&nbsp;</td>
	  <td align="left" valign="top"><input type="submit" name='submit' id="submit" value="Submit" onClick="return validate()" /></td>
  </tr>
</table>
<? include('calendarforreports.php');?>
<?
if(isset($dbname) && isset($offcode) && (isset($dt) || (isset($dt1) && isset($dt2))))
{
	
	if($dt1!="" && $dt2!="")
	{
		$tmp1 = explode("-",$dt1);
		$crdate1 = $tmp1[2]."-".$tmp1[0]."-".$tmp1[1];
		
		$tmp2 = explode("-",$dt2);
		$crdate2 = $tmp2[2]."-".$tmp2[0]."-".$tmp2[1];
		
		$flag=1;
	}
	else
	{
		$tmp = explode("-",$dt);
		$crdate = $tmp[2]."-".$tmp[0]."-".$tmp[1];
		
		$flag=0;
	}
	
	if($flag==0)
	{
		$sql = "select E1.*, P1.PRCODE, P1.TOOTH, P1.SURFACE, P1.STDOC from $dbname.eclaim E1, $dbname.procacc P1 where E1.CRDATE='$crdate' AND P1.RENDER='1' AND E1.OFFCODE='$offcode' AND E1.PROCID=P1.PROCID";
		//echo $sql;
	}
	else
	{
		$sql = "select E1.*, P1.PRCODE, P1.TOOTH, P1.SURFACE, P1.STDOC from $dbname.eclaim E1, $dbname.procacc P1 where E1.CRDATE>='$crdate1' and E1.CRDATE<='$crdate2'  AND P1.RENDER='1' AND E1.OFFCODE='$offcode' AND E1.PROCID=P1.PROCID";
		//echo $sql."123";
	}
	//$sql = "select * from $dbname.eclaim E1, $dbname.procacc P1 where P1.RENDER='1' AND E1.OFFCODE='$offcode' AND E1.PROCID=P1.PROCID  LIMIT 20";
	//echo $sql."<br>";
	$result = mysql_query($sql)or die(mysql_error());	
?>
<form name="form1" action="SaveToExcel_Report.php" method="post" target="_blank" onsubmit='$("#datatodisplay").val( $("<div>").append( $("#report").eq(0).clone() ).html() )'>
<input type="hidden" id="datatodisplay" name="datatodisplay" />
<pre title="Export to Excel"><input type="image" src="images/imgexcel.jpg" width="25" height="25" alt="export to xls"></pre>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="report" class="reference" >
  <tr>
    <th>SRNO</th>
    <th>PATID</th>
    <th>DATE</th>
    <th>PRCODE</th>
    <th>TOOTH/SURFACE</th>
    <th>INSCOMP</th>
    <th>BILLING DOCTOR</th>
    <th>BILLING CORP</th>
    <th>CLAIM SEND DOC</th>
    <th>CLAIM SEND USER</th>
  </tr>
  <?
  if(mysql_num_rows($result)>0)
  {
	  $srno=1;
	  while($data = mysql_fetch_assoc($result))
	  {
		  //echo"<pre>";
		  //print_r($data);
		extract($data);
		
		$sqlpatins="select INSCOMP,INSTYPE,PLAN from $dbname.patientdetails where PID='$PATID'";
		$rsins=mysql_query($sqlpatins) or die(mysql_error());
		$datains=mysql_fetch_assoc($rsins);
		
		if($CLAIM_SEND_USER!="")
		{
			$sqlclaim="select OFFCODE from $dbname.claim where OFFCODE='$OFFCODE' AND USERNAME='$CLAIM_SEND_USER'";
			$rsclaim=mysql_query($sqlclaim) or die(mysql_error());
			$dataclaim=mysql_fetch_assoc($rsclaim);
			
			$billing_offcode=$dataclaim['OFFCODE'];
		}
		else
		{
			$billing_offcode=$OFFCODE;
		}
		
		$sqloff="select C1.CNAME from $dbname.office O1,$dbname.corporation C1 where O1.OFFCODE='$billing_offcode' and O1.CID=C1.CID";
		$rsoff=mysql_query($sqloff) or die(mysql_error());
		$dataoff=mysql_fetch_assoc($rsoff);
		
	  ?>
	  <tr>
		<td><? echo $srno; $srno++; ?></td>
		<td><? echo $OFFCODE."-".$PATID."-".$INDEX1; ?></td>
		<td><? echo date('m-d-Y' , strtotime($CRDATE));?></td>
		<td><? echo $PRCODE; ?></td>
		<td><? echo $TOOTH."/".$SURFACE;?></td>
		<td><? echo $datains['INSCOMP']." (".$datains['INSTYPE'].")"; if($datains['PLAN']!=""){echo " [".$datains['PLAN']."]";}?></td>
		<td><? echo $STDOC." [".getDocname($STDOC, $dbname)."]"; ?></td>
		<td><? echo $dataoff['CNAME'];?></td>
		<td><? if($CLAIM_SEND_DOC!=""){echo $CLAIM_SEND_DOC;}else{echo "N/A";} ?></td>
		<td><? echo $CLAIM_SEND_USER; ?></td>
	  </tr>
	  <?
	  }
	}else{
	?>
    	<tr><td colspan="10" align="center">Data Not Found !!!</td></tr>
    <?
	}
  ?>
</table>
<?
}
?>
</form>
</body>
</html>
