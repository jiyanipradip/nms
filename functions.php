<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');
$action  = (isset($_GET['action']) && $_GET['action'] != '1') ? $_GET['action'] : 0;
if($action)
{
	if($action == 'deleteuser')
	{
		$id = $_GET['id'];
		deleteuser($id);
	}
	else if($action == 'adduser')
	{
		adduser();
	}	
	else if($action == 'modifyuser')
	{
		$id = $_GET['id'];
		modifyuser($id);
	}
	else if($action == 'deletecategory')
	{
		$id = $_GET['id'];
		deletecategory($id);
	}
	else if($action == 'addcategory')
	{
		addcategory();
	}	
	else if($action == 'modifycategory')
	{
		$id = $_GET['id'];
		modifycategory($id);
	}
	else if($action == 'deleteincomingsource')
	{
		$id = $_GET['id'];
		deleteincomingsource($id);
	}
	else if($action == 'addincomingsource')
	{
		addincomingsource();
	}	
	else if($action == 'modifyincomingsource')
	{
		$id = $_GET['id'];
		modifyincomingsource($id);
	}
	else if($action == 'deleteparamgroup')
	{
		$id = $_GET['id'];
		deleteparamgroup($id);
	}
	else if($action == 'addparamgroup')
	{
		addparamgroup();
	}	
	else if($action == 'modifyparamgroup')
	{
		$id = $_GET['id'];
		modifyparamgroup($id);
	}
	else if($action == 'deleteparamtype')
	{
		$id = $_GET['id'];
		deleteparamtype($id);
	}
	else if($action == 'addparamtype')
	{
		addparamtype();
	}	
	else if($action == 'modifyparamtype')
	{
		$id = $_GET['id'];
		modifyparamtype($id);
	}
	else if($action == 'deletepatient')
	{
		$pid = $_GET['pid'];
		$iid = $_GET['iid'];
		$txtSearch = $_GET['txtSearch'];
		deletepatient($pid,$iid,$txtSearch);
	}
	else if($action == 'addpatient')
	{
		addpatient();
	}	
	else if($action == 'modifypatient')
	{
		$pid = $_GET['pid'];
		$iid = $_GET['iid'];
		$txtSearch = $_GET['txtSearch'];
		modifypatient($pid,$iid,$txtSearch);
	}
	else if($action == 'deletedoctor')
	{
		$docid = $_GET['docid'];
		deletedoctor($docid);
	}
	else if($action == 'adddoctor')
	{
		adddoctor();
	}	
	else if($action == 'modifydoctor')
	{
		$docid = $_GET['docid'];
		modifydoctor($docid);
	}
	else if($action == 'deleteroom')
	{
		$id = $_GET['id'];
		deleteroom($id);
	}
	else if($action == 'addroom')
	{
		addroom();
	}	
	else if($action == 'modifyroom')
	{
		$id = $_GET['id'];
		modifyroom($id);
	}
	else if($action == 'deleteroomassign')
	{
		$id = $_GET['id'];
		deleteroomassign($id);
	}
	else if($action == 'addroomassign')
	{
		$date1 = $_GET['date1'];
		$cboroom = $_GET['cboroom'];
		addroomassign($date1,$cboroom);
	}
	else if($action == 'addcheckup')
	{
		$pid = $_GET['pid'];
		addcheckup($pid);
	}
	
	
}

function deleteuser($id)
{
	$sqldelete="DELETE FROM userlogin where id = '$id'";
	$sqlresult = mysql_query($sqldelete) or die(mysql_error());
	header('Location:userlist.php');	
	exit;
}

function adduser()
{
	$txtusername = $_POST['txtusername'];
	$txtpassword = $_POST['txtpassword'];
	$txtemail    = $_POST['txtemail'];
	$txtphone    = $_POST['txtphone'];
	$txtusertype = $_POST['txtusertype'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
	/*$sqlcheck = "select * from userlogin where username ='$txtusername'";	
	$rscheck = mysql_query($sqlcheck) or die(mysql_error());
	$numcheck = mysql_num_rows($rscheck);
	
	if($numcheck==0)
	{*/
		$sqlinsert = "insert into userlogin (username,password,userType,emailid,phoneNo,crdate,crtime,userlog,ipadd) values('$txtusername','$txtpassword','$txtusertype','$txtemail','$txtphone',now(),now(),'$txtuserlog','$txtipadd')";
		//echo $sqlinsert."<br>"; die;
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());
	/*}*/
	header("location:userlist.php"); die;
}

function modifyuser($id)
{
	$txtusername = $_POST['txtusername'];
	$txtpassword = $_POST['txtpassword'];
	$txtemail    = $_POST['txtemail'];
	$txtphone    = $_POST['txtphone'];
	$txtusertype = $_POST['txtusertype'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
	/*$sqlcheck = "select * from userlogin where username ='$txtusername'";
	//echo $sqlcheck; die;
	$rscheck = mysql_query($sqlcheck) or die(mysql_error());
	$numcheck = mysql_num_rows($rscheck);
	
	if($numcheck>0)
	{*/
		$sqlupdate = "UPDATE userlogin SET username = '$txtusername',password = '$txtpassword',emailid = '$txtemail',phoneNo = '$txtphone',userType = '$txtusertype',crdate = now(),
				crtime = now(),userlog = '$txtuserlog',ipadd='$txtipadd' where id=$id";
		//echo $sqlupdate."<br>"; die;
		$sqlresult  = mysql_query($sqlupdate) or die(mysql_error());
	/*}*/
		header("location:userlist.php"); die;
}

function deletecategory($id)
{
	$sqldelete="DELETE FROM categorymaster where id = '$id'";
	$sqlresult = mysql_query($sqldelete) or die(mysql_error());
	header('Location:categorylist.php');	
	exit;
}

function addcategory()
{
	$txtcatname = $_POST['txtcatname'];
	$txtcattype = $_POST['txtcattype'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
		$sqlinsert = "insert into categorymaster (categoryname,categorytype,crdate,crtime,userlog,ipadd) values('$txtcatname','$txtcattype',now(),now(),'$txtuserlog','$txtipadd')";
		//echo $sqlinsert."<br>";
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());
		header("location:categorylist.php"); die;
}

function modifycategory($id)
{
	$txtcatname = $_POST['txtcatname'];
	$txtcattype = $_POST['txtcattype'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
		$sqlupdate = "UPDATE categorymaster SET categoryname = '$txtcatname',categorytype = '$txtcattype',crdate = now(),crtime = now(),userlog = '$txtuserlog',ipadd='$txtipadd' where id=$id";
		//echo $sqlupdate."<br>"; die;
		$sqlresult  = mysql_query($sqlupdate) or die(mysql_error());
		header("location:categorylist.php"); die;
}

function deleteincomingsource($id)
{
	$sqldelete="DELETE FROM incomingsourcemaster where id = '$id'";
	$sqlresult = mysql_query($sqldelete) or die(mysql_error());
	header('Location:incomingsourcelist.php');	
	exit;
}

function addincomingsource()
{
	$txtcode = $_POST['txtcode'];
	$txtcodetype = $_POST['txtcodetype'];
	$txtname  = $_POST['txtname'];
	$txtaddress = $_POST['txtaddress'];
	$txtcity = $_POST['txtcity'];
	$txtstate  = $_POST['txtstate'];
	$txtzip = $_POST['txtzip'];
	$txtphone = $_POST['txtphone'];
	$txtmobile  = $_POST['txtmobile'];
	$txtemail = $_POST['txtemail'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
   	$sqlinsert = "insert into incomingsourcemaster (code,codetype,name,address,city,state,zip,phone,mobile,email,crdate,crtime,userlog,ipadd) 
		values('$txtcode','$txtcodetype','$txtname','$txtaddress','$txtcity','$txtstate','$txtzip','$txtphone','$txtmobile','$txtemail',now(),now(),'$txtuserlog','$txtipadd')";
		//echo $sqlinsert."<br>";
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());
		header("location:incomingsourcelist.php"); die;
}

function modifyincomingsource($id)
{
	$txtcode = $_POST['txtcode'];
	$txtcodetype = $_POST['txtcodetype'];
	$txtname  = $_POST['txtname'];
	$txtaddress = $_POST['txtaddress'];
	$txtcity = $_POST['txtcity'];
	$txtstate  = $_POST['txtstate'];
	$txtzip = $_POST['txtzip'];
	$txtphone = $_POST['txtphone'];
	$txtmobile  = $_POST['txtmobile'];
	$txtemail = $_POST['txtemail'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
		$sqlupdate = "UPDATE incomingsourcemaster SET codetype = '$txtcodetype',name = '$txtname',address = '$txtaddress',city = '$txtcity',state = '$txtstate',zip = '$txtzip',phone = '$txtphone',mobile = '$txtmobile',email = '$txtemail',crdate = now(),crtime = now(),userlog = '$txtuserlog',ipadd='$txtipadd' where id=$id";
		//echo $sqlupdate."<br>"; die;
		$sqlresult  = mysql_query($sqlupdate) or die(mysql_error());
		header("location:incomingsourcelist.php"); die;	
}

function deleteparamgroup($id)
{
	$sqldelete="DELETE FROM paramgroup where id = '$id'";
	$sqlresult = mysql_query($sqldelete) or die(mysql_error());
	header('Location:paramgrouplist.php');	
	exit;
}

function addparamgroup()
{
	$txtname = $_POST['txtname'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
	$sqlcheck = "select * from paramgroup where name ='$txtname'";	
	$rscheck = mysql_query($sqlcheck) or die(mysql_error());
	$numcheck = mysql_num_rows($rscheck);
	
	if($numcheck==0)
	{
		$sqlinsert = "insert into paramgroup (name,crdate,crtime,userlog,ipadd) values('$txtname',now(),now(),'$txtuserlog','$txtipadd')";
		//echo $sqlinsert."<br>";
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());	
	}
	header("location:paramgrouplist.php"); die;
	
}

function modifyparamgroup($id)
{
	$txtname = $_POST['txtname'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
	$sqlcheck = "select * from paramgroup where name ='$txtname'";	
	$rscheck = mysql_query($sqlcheck) or die(mysql_error());
	$numcheck = mysql_num_rows($rscheck);
	
	if($numcheck==0)
	{	
		$sqlupdate = "UPDATE paramgroup SET name = '$txtname',crdate = now(),crtime = now(),userlog = '$txtuserlog',ipadd='$txtipadd' where id=$id";
		//echo $sqlupdate."<br>"; die;
		$sqlresult  = mysql_query($sqlupdate) or die(mysql_error());
	}	
		header("location:paramgrouplist.php"); die;
}

function deleteparamtype($id)
{
	$sqldelete="DELETE FROM paramtype where id = '$id'";
	$sqlresult = mysql_query($sqldelete) or die(mysql_error());
	header('Location:paramtypelist.php');	
	exit;
}

function addparamtype()
{
	$txtgroupid = $_POST['txtgroupid'];
	$txtname = $_POST['txtname'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
 	$sqlcheck = "select * from paramtype where name ='$txtname'";	
	$rscheck = mysql_query($sqlcheck) or die(mysql_error());
	$numcheck = mysql_num_rows($rscheck);
	
	if($numcheck==0)
	{
		$sqlinsert = "insert into paramtype (groupid,name,crdate,crtime,userlog,ipadd) values('$txtgroupid','$txtname',now(),now(),'$txtuserlog','$txtipadd')";
		//echo $sqlinsert."<br>";
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());	
	}
	header("location:paramtypelist.php"); die;
	
}

function modifyparamtype($id)
{
	$txtgroupid = $_POST['txtgroupid'];
	$txtname = $_POST['txtname'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
		$sqlupdate = "UPDATE paramtype SET groupid = '$txtgroupid',name = '$txtname',crdate = now(),crtime = now(),userlog = '$txtuserlog',ipadd='$txtipadd' where id=$id";
		//echo $sqlupdate."<br>"; die;
		$sqlresult  = mysql_query($sqlupdate) or die(mysql_error());
		header("location:paramtypelist.php"); die;
}

function deletepatient($pid,$iid,$txtSearch)
{
		$sqldelete="DELETE FROM patientmaster where pid = '$pid'";
		$sqlresult = mysql_query($sqldelete) or die(mysql_error());
		header('Location:checkup.php?pid='.$pid.'&iid='.$iid.'&txtSearch='.$txtSearch);
		die;	
		/*if($backurl=='checkup' && $backurl!='')
		{ 
		header('location:checkup.php?iid='.$iid); die;
		}
		else 
		{
		header('Location:patientlist.php?iid='.$iid); die;
		}*/

}

function addpatient()
{
	$txtgroupid = $_POST['txtgroupid'];
	$txtfname = $_POST['txtfname'];
	$txtlname  = $_POST['txtlname'];
	$txtmname = $_POST['txtmname'];
	$txtage = $_POST['txtage'];
	$txtdob = $_POST['txtdob'];
	$txtdob1 = explode('-',$txtdob);
	$txtdob2 =$txtdob1[2].'-'.$txtdob1[1].'-'.$txtdob1[0];
	$txtsex = $_POST['txtsex'];
	$txtstu = $_POST['txtstu'];
	if($txtstu=='yes'){ $txtstu=1; }
	else { $txtstu=0;}
	$txtstd = $_POST['txtstd'];
	$txtaddress = $_POST['txtaddress'];
	$txtcity = $_POST['txtcity'];
	$txtstate  = $_POST['txtstate'];
	$txtzip = $_POST['txtzip'];
	$txtphone = $_POST['txtphone'];
	$txtmobile  = $_POST['txtmobile'];
	$txtemail = $_POST['txtemail'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];

   	$sqlinsert = "insert into patientmaster (incomingid,fname,lname,mname,age,dob,gender,studentflag,standard,address,city,state,zip,phone,mobile,emailid,crdate,crtime,userlog,ipadd) 
		values('$txtgroupid','$txtfname','$txtlname','$txtmname','$txtage','$txtdob2','$txtsex','$txtstu','$txtstd','$txtaddress','$txtcity','$txtstate','$txtzip','$txtphone','$txtmobile','$txtemail',now(),now(),'$txtuserlog','$txtipadd')";
		//echo $sqlinsert."<br>";
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());
		header('Location:checkup.php?iid='.$txtgroupid.'&txtSearch='.$txtfname);
		die;
		/*if($backurl=='checkup' && $backurl!='')
		{ 
		header("location:checkup.php"); die;
		}
		else 
		{
		header("location:patientlist.php"); die;
		}*/
		
}

function modifypatient($pid,$iid,$txtSearch)
{
	$txtgroupid = $_POST['txtgroupid'];
	$txtfname = $_POST['txtfname'];
	$txtlname  = $_POST['txtlname'];
	$txtmname = $_POST['txtmname'];
	$txtage = $_POST['txtage'];
	$txtdob = $_POST['txtdob'];
	$txtdob1 = explode('-',$txtdob);
	$txtdob2 =$txtdob1[2].'-'.$txtdob1[1].'-'.$txtdob1[0];
	$txtsex = $_POST['txtsex'];
	$txtstu = $_POST['txtstu'];
	if($txtstu=='yes'){ $txtstu=1; }
	else { $txtstu=0;}
	$txtstd = $_POST['txtstd'];
	$txtaddress = $_POST['txtaddress'];
	$txtcity = $_POST['txtcity'];
	$txtstate  = $_POST['txtstate'];
	$txtzip = $_POST['txtzip'];
	$txtphone = $_POST['txtphone'];
	$txtmobile  = $_POST['txtmobile'];
	$txtemail = $_POST['txtemail'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
		$sqlupdate = "UPDATE patientmaster SET incomingid = '$txtgroupid',fname = '$txtfname',lname = '$txtlname',mname = '$txtmname',age = '$txtage',dob = '$txtdob2',gender = '$txtsex',studentflag = '$txtstu',standard = '$txtstd',address = '$txtaddress',city = '$txtcity',state = '$txtstate',zip = '$txtzip',phone = '$txtphone',mobile = '$txtmobile',emailid = '$txtemail',crdate = now(),crtime = now(),userlog = '$txtuserlog',ipadd='$txtipadd' where pid=$pid";
		//echo $sqlupdate."<br>"; die;
		$sqlresult  = mysql_query($sqlupdate) or die(mysql_error());
		header('Location:checkup.php?pid='.$pid.'&iid='.$iid.'&txtSearch='.$txtSearch);
		die;		
		/*if($backurl=='checkup' && $backurl!='')
		{ 
		header("location:checkup.php?iid=".$txtgroupid); die;
		}
		else 
		{
		header("location:patientlist.php?iid=".$txtgroupid); die;
		}*/
		
}


function deletedoctor($docid)
{
	$sqldelete="DELETE FROM doctormaster where docid = '$docid'";
	$sqlresult = mysql_query($sqldelete) or die(mysql_error());
	header('Location:doctorlist.php');	
	exit;
}

function adddoctor()
{
	$txtdoccode = $_POST['txtdoccode'];
	$txttitle = $_POST['txttitle'];
	$txtfname = $_POST['txtfname'];
	$txtlname  = $_POST['txtlname'];
	$txtmname = $_POST['txtmname'];
	$txtdob = $_POST['txtdob'];
	$txtdob1 = explode('-',$txtdob);
	$txtdob2 =$txtdob1[2].'-'.$txtdob1[1].'-'.$txtdob1[0];
	$txtsex = $_POST['txtsex'];
	$txtaddress = $_POST['txtaddress'];
	$txtcity = $_POST['txtcity'];
	$txtstate  = $_POST['txtstate'];
	$txtzip = $_POST['txtzip'];
	$txtphone = $_POST['txtphone'];
	$txtmobile  = $_POST['txtmobile'];
	$txtemail = $_POST['txtemail'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];

   	$sqlinsert = "insert into doctormaster (doccode,title,fname,lname,mname,dob,gender,address,city,state,zip,phone,mobile,emailid,crdate,crtime,userlog,ipadd) 
		values('$txtdoccode','$txttitle','$txtfname','$txtlname','$txtmname','$txtdob2','$txtsex','$txtaddress','$txtcity','$txtstate','$txtzip','$txtphone','$txtmobile','$txtemail',now(),now(),'$txtuserlog','$txtipadd')";
		//echo $sqlinsert."<br>"; die;
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());
		header("location:doctorlist.php"); die;
}

function modifydoctor($docid)
{
	$txtdoccode = $_POST['txtdoccode'];
	$txttitle = $_POST['txttitle'];
	$txtfname = $_POST['txtfname'];
	$txtlname  = $_POST['txtlname'];
	$txtmname = $_POST['txtmname'];
	$txtdob = $_POST['txtdob'];
	$txtdob1 = explode('-',$txtdob);
	$txtdob2 =$txtdob1[2].'-'.$txtdob1[1].'-'.$txtdob1[0];
	$txtsex = $_POST['txtsex'];
	$txtaddress = $_POST['txtaddress'];
	$txtcity = $_POST['txtcity'];
	$txtstate  = $_POST['txtstate'];
	$txtzip = $_POST['txtzip'];
	$txtphone = $_POST['txtphone'];
	$txtmobile  = $_POST['txtmobile'];
	$txtemail = $_POST['txtemail'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
		$sqlupdate = "UPDATE doctormaster SET title = '$txttitle',fname = '$txtfname',lname = '$txtlname',mname = '$txtmname',dob = '$txtdob2',gender = '$txtsex',address = '$txtaddress',city = '$txtcity',state = '$txtstate',zip = '$txtzip',phone = '$txtphone',mobile = '$txtmobile',emailid = '$txtemail',crdate = now(),crtime = now(),userlog = '$txtuserlog',ipadd='$txtipadd' where docid=$docid";
		//echo $sqlupdate."<br>"; die;
		$sqlresult  = mysql_query($sqlupdate) or die(mysql_error());
		header("location:doctorlist.php"); die;	
}

function deleteroom($id)
{
	$sqldelete="DELETE FROM roommaster where id = '$id'";
	$sqlresult = mysql_query($sqldelete) or die(mysql_error());
	header('Location:roomlist.php');	
	exit;
}

function addroom()
{
	$txtroomno = $_POST['txtroomno'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
	$sqlcheck = "select * from roommaster where roomno ='$txtroomno'";	
	$rscheck = mysql_query($sqlcheck) or die(mysql_error());
	$numcheck = mysql_num_rows($rscheck);
	
	if($numcheck==0)
	{
		$sqlinsert = "insert into roommaster (roomno,crdate,crtime,userlog,ipadd) values('$txtroomno',now(),now(),'$txtuserlog','$txtipadd')";
		//echo $sqlinsert."<br>";
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());
	}
		header("location:roomlist.php"); die;
}

function modifyroom($id)
{
	$txtroomno = $_POST['txtroomno'];
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	
	$sqlcheck = "select * from roommaster where roomno ='$txtroomno'";	
	$rscheck = mysql_query($sqlcheck) or die(mysql_error());
	$numcheck = mysql_num_rows($rscheck);
	
	if($numcheck==0)
	{
		$sqlupdate = "UPDATE roommaster SET roomno = '$txtroomno',crdate = now(),crtime = now(),userlog = '$txtuserlog',ipadd='$txtipadd' where id=$id";
		//echo $sqlupdate."<br>"; die;
		$sqlresult  = mysql_query($sqlupdate) or die(mysql_error());
	}
		header("location:roomlist.php"); die;
}

function deleteroomassign($id)
{
	$sqldelete="DELETE FROM roomassign where id = '$id'";
	//echo $sqldelete."<br>"; die;
	$sqlresult = mysql_query($sqldelete) or die(mysql_error());
	header('Location:roomassignlist.php');	
	exit;
}

function addroomassign($date1,$cboroom)
{
	//$date1 = $_GET['date1'];
	//$cboroom = $_GET['cboroom'];
	$txtdate1 = explode('-',$date1);
	$txtdate2 =$txtdate1[2].'-'.$txtdate1[1].'-'.$txtdate1[0];	
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	$checkbox = $_POST['checkbox'];
	$checkbox1 = implode(',',$checkbox);
	//echo $checkbox1."<br>";
	$checkbox2 = explode(',',$checkbox1);
	//print_r($checkbox2); die;
	foreach($checkbox2 as $doctorid){
		//echo $docid."<br>";
		$sqlcheck = "select * from roomassign where assigndate='$txtdate2' and doctorid='$doctorid'";
		$rscheck = mysql_query($sqlcheck) or die(mysql_error());
		$numcheck = mysql_num_rows($rscheck);
		if($numcheck==0)
		{
		$sqlinsert = "insert into roomassign (assigndate,roomno,doctorid,crdate,crtime,userlog,ipadd) values('$txtdate2','$cboroom','$doctorid',now(),now(),'$txtuserlog','$txtipadd')";
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());
		}
	}
	
		header("location:roomassignlist.php"); die;	
}

function addcheckup($pid){
	//echo $pid."<br>";
	$txtuserlog  = $_SESSION['username'];
	$txtipadd    = $_SERVER['REMOTE_ADDR'];
	$txtcase = $_POST['txtcase'];
	$ckdate = date('Y-m-d', strtotime($_POST['ckdate']));
	$cboroom = $_POST['cboroom'];
	$doctorid = $_POST['cbodoctor'];
	$sqlcheck = "select * from checkup where pid='$pid' and checkupdate='$ckdate' and roomno='$cboroom' and doctorid='$doctorid'";
	//echo $sqlcheck; die;
	$rscheck = mysql_query($sqlcheck) or die(mysql_error());
	$numcheck = mysql_num_rows($rscheck);
	if($numcheck==0)
	{
		$sqlinsert = "insert into checkup (pid,caseno,checkupdate,roomno,doctorid,crdate,crtime,userlog,ipadd) values('$pid','$txtcase','$ckdate','$cboroom','$doctorid',now(),now(),'$txtuserlog','$txtipadd')";
		$sqlresult  = mysql_query($sqlinsert) or die(mysql_error());
		//header("location:checkup.php?pid=".$pid); die;	
	}
	?>
	<script type="text/javascript">
		window.close();
		window.opener.document.getElementById("div_<? echo $pid;?>").style.backgroundColor="#99ff99";
		window.opener.document.getElementById("div2_<? echo $pid;?>").style.backgroundColor="#99ff99";
		window.opener.document.getElementById("div1_<? echo $pid;?>").innerHTML= "CHECK UP DONE";
	</script>
	<?	
}
?>