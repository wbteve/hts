﻿<?php
include ("checkuser.php");
include ("../include/config.php");
include ("../include/function.php");
$VipUser=$_COOKIE["VipUser"];

/*-----------------接收相关数据值---------------------*/
//$Page=@$_REQUEST["Page"];
$skey=@$_REQUEST["skey"];
$key=@$_REQUEST["key"];
$fbkey=@$_REQUEST["fbkey"];
switch($fbkey)
	{
	case "1":
		$fbsql="flag=1";
		break;
	case "2":
		$fbsql="flag=2";
		break;
	case "3":
		$fbsql="flag=3";
		break;
	case "4":
		$fbsql="dyn=1";
		break;
	default:
		$fbsql="flag=0 and dyn<>1";
	}
/*-----------------设置每页显示数目-------------------*/
$List_Num=30;
/*-----------------计算共有记录数--------------------*/
if($key=="")
{
	if($fbkey==""){
		$sqlN="select Count(*) from wyx_info";
	}
	else{
		$sqlN="select Count(*) from wyx_info where ".$fbsql."";
	}
}
else{
	if($fbkey==""){
		$sqlN="select Count(*) from wyx_info where ".$skey." like '%".$key."%'";
	}
	else{
		$sqlN="select Count(*) from wyx_info where ".$skey." like '%".$key."%' and ".$fbsql."";
	}
}

//$sqlN="select Count(*) from wyx_info";
$resultN=mysql_db_query($dbname,$sqlN);
$rsN=mysql_fetch_array($resultN);
$Num=$rsN[0];

/*------------------计算共有页数--------------------*/
$CountPage=ceil($Num/$List_Num);
/*-------------------设置当前页--------------------*/
if(empty($_REQUEST["Page"])){
	$Page=1;
}else{
	$Page=$_REQUEST["Page"];
	if($Page<1){$Page=1;}
	if($Page>$CountPage){$Page=$CountPage;}
}
$Cpage=$Page+1;
/*--------------------------------------------------*/

if($key=="")
{
	if($fbkey==""){
		$sql="select * from wyx_info order by ID desc limit ".($List_Num*($Page-1)).",".$List_Num."";
	}
	else{
		$sql="select * from wyx_info where ".$fbsql." order by ID desc limit ".($List_Num*($Page-1)).",".$List_Num."";
	}
}
else{
	if($fbkey==""){
		$sql="select * from wyx_info where ".$skey." like '%".$key."%' order by ID desc limit ".($List_Num*($Page-1)).",".$List_Num."";
	}
	else{
		$sql="select * from wyx_info where ".$skey." like '%".$key."%' and ".$fbsql." order by ID desc limit ".($List_Num*($Page-1)).",".$List_Num."";
	}
}

//$sql="select * from wyx_info order by ID desc limit ".($List_Num*($Page-1)).",".$List_Num."";
$result=mysql_db_query($dbname,$sql);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<TITLE>后台管理中心</title>   </title> <LINK rel=stylesheet type=text/css href="../css/style2.css">    
<LINK rel=stylesheet type=text/css href="../css/select.css">
<SCRIPT language=javascript type=text/javascript src="../css/j_dialog.js"></SCRIPT>  
<SCRIPT language=javascript type=text/javascript src="../css/jquery.js"></SCRIPT> 
   
<link href="../images/reset.css" rel="stylesheet" type="text/css" />
<link href="../images/zh-cn-system.css" rel="stylesheet" type="text/css" />
</head>
<body>
<style>
.alink{
line-height:32px;}
.alink a{
border:#999999 1px solid;
padding-left:6px; padding-right:6px; padding-bottom:2px; padding-top:2px;
margin-lef:2px; margin-right:2px; color:#999999 color:#3399FF}
.alink a:hover{
background:#FFFFCC; border:#999999 1px solid; text-decoration:none; color:#3399FF}
.ok{
border:#999999 1px solid;
padding-left:6px; padding-right:6px; padding-bottom:2px; padding-top:2px;
margin-lef:2px; margin-right:2px; color:#3399FF; font-weight:bold;
}
.pager{
background:#ffffff; line-height:32px; padding-left:6px;}
.pager a{
border:#999999 1px solid;
padding-left:6px; padding-right:6px; padding-bottom:2px; padding-top:2px;
margin-lef:2px; margin-right:2px; color:#999999 color:#3399FF}
.pager a:hover{
background:#FFFFCC; border:#999999 1px solid; text-decoration:none; color:#3399FF}
</style>
<div id="main_frameid" class="pad-10 display" style="_margin-right:-12px;_width:98.9%;">
<div class="col-2  col-auto" >
	<h6>微营销发布列表</h6>
	<div class="content">
	  <FORM id="myform2" name="myform1" method="post" action="wyx.php" onsubmit="return checkSo();">
      <table class="tablelist" style="MARGIN-TOP: 5px; BORDER-COLLAPSE: collapse; MARGIN-BOTTOM: 5px; HEIGHT: 30px" border=1 cellSpacing=1 borderColor=#c9d3e9 cellPadding=0 width="100%" align=center>
        <TBODY>
        <TR>
          <TD style="PADDING-BOTTOM: 10px; PADDING-LEFT: 10px; PADDING-RIGHT: 10px; PADDING-TOP: 10px">
      <table class="tablelist" class="tableBorder" width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF" style="font-size:12px">
        <tr align="center" >
          <td width="100%" bgcolor="#FFFFFF"><table class="tablelist" width="730" border='0' cellpadding='0' cellspacing='0' style="font-size:12px">
            <tr>
              <td width='89' align='center'>搜索条件：</td>
              <td width='143'><select name='skey' id="skey" style='width:150'>
                <option value=''>选择类型...</option>
                <option value="order_id">订单ID</option>
                <option value="title">文章标题</option>
				<option value="medianame">媒体名称</option>
				<option value="data">订单时间</option>
				<option value="fbtime">发布时间</option>
              </select>
              </td>
              <td width='90'>搜索关键字： </td>
              <td width='210'><input name='key' type='text' id="key" style='width:150px' value='' />
              </td>
			  <td width='143'><select name='fbkey' id="fbkey" style='width:150'>
                <option value=''>选择状态...</option>
                <option value="0">未处理</option>
                <option value="1">处理中</option>
				<option value="2">已发布</option>
                <option value="3">已拒稿</option>
				<option value="4">已删单</option>
              </select>
              </td>
              <td width='66' align="left"><input style="WIDTH: 60px; CURSOR: pointer" type="submit" name="Submit2" value="查询"/></td>
            </tr>
          </table></td>
        </tr>
        <tr align="center" >
          <td bgcolor="#FFFFFF"><span class="red">*搜索相关数据时，如果搜索条件未选择，将搜索所有的数据!</span></td>
        </tr>
      </table>
          </TD></TR></TBODY></TABLE></FORM>
	  <table class="tablelist" width="100%" cellpadding="0" cellspacing="1" bgcolor="#e2e2e2" style="font-size:12px">
	  <?php
		 if (mysql_num_rows($result)==NULL)
		 {
		   echo "<br><table class="tablelist" width=750 border=0 align=center cellpadding=0 cellspacing=0><tr>
                 <td align=center><span class=rd rd></span></td></tr></table>";
		 }
       
		 else
		 {
		?>
	    <tr>
	      <td height="30" bgcolor="#FFFFFF" align="center">订单ID</td>
	      <td bgcolor="#FFFFFF" align="center">会员名称</td>
		  <td bgcolor="#FFFFFF" align="center">文章标题</td>
	      <td bgcolor="#FFFFFF" align="center">网址</td>
	      <td bgcolor="#FFFFFF" align="center">发布网站</td>
	      <td bgcolor="#FFFFFF" align="center">费用(元)</td>
	      <td bgcolor="#FFFFFF" align="center">状态</td>
		  <td bgcolor="#FFFFFF" align="center">编辑处理进程</td>
		  <td bgcolor="#FFFFFF" align="center">提交时间</td>
	      <td bgcolor="#FFFFFF" align="center">发布时间</td>
	      <td bgcolor="#FFFFFF" align="center" width="210">管理操作</td>
        </tr>
        <?php
		$i=1;
		while($rs=mysql_fetch_array($result))
		{
		?>
		<TR>
		<TD bgColor=#ffffff height=30>
		  <DIV align=center><?php echo $rs["order_id"];?></DIV></TD>
		<TD bgColor=#ffffff>
		  <DIV align=center><?php echo $rs["VipUser"];?></DIV></TD>
		<TD bgColor=#ffffff>
		  <DIV align=left style="padding-left:5px"><a href="../wyxinfo.php?ID=<?php echo $rs["ID"];?>" target="_blank"><?php echo $rs["title"];?></a></DIV></TD>
		<TD bgColor=#ffffff>
		  <DIV align=center><?php
	if($rs['flag']==2){?>
		<a href="<?php echo $rs["weburl"];?>" target="_blank" style="color: rgb(255, 0, 0);">查看发布链接</a>
	<?php
	}elseif($rs['flag']==3){?>
		<?php echo $rs["reason"];?>
	<?php }?></DIV></TD>
		<TD bgColor=#ffffff>
		  <DIV align=center><?php echo $rs["medianame"];?></DIV></TD>
		<TD style="PADDING-BOTTOM: 0px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; PADDING-TOP: 0px" 
		bgColor=#ffffff>
		  <DIV align=center><?php echo $rs["price"];?>元</DIV></TD>
		<TD bgColor=#ffffff>
		  <DIV align=center><?php
	if($rs['flag']==2 and $rs['yn']==1){
		echo "<b style='color:#0000FF'>已确认发布</b>";
	}elseif($rs['flag']==3 and $rs['yn']==1){
		echo "<b style='color:#0000FF'>已确认拒稿</b>";
	}else{
		if($rs['dyn']==1){
				echo "<b style='color:#000000'>已删单（已退款）</b>";
		}
		else{
			if($rs['flag']==0){
				echo "<b style='color:#2a8104'>未处理</b>";
			}
			elseif($rs['flag']==1){
				echo "<b style='color:#FF0000'>处理中</b>";
			}
			elseif($rs['flag']==2 and $rs['yn']!=1){
				echo "<b style='color:#0000FF'>未确认发布</b>";
			}
			elseif($rs['flag']==3 and $rs['yn']!=1){
				echo "<b style='color:#0000FF'>未确认拒稿</b>";
			}
		}
	}?></DIV></TD>
		<TD bgColor=#ffffff>
		  <DIV align=center><?php
	if($rs['VipUser']<>""){
		if($rs['dyn']==1){
			echo "<b style='color:#000000'>已删单</b>";
		}
		else{
			if($rs['flag']==0){
				echo "<b style='color:#2a8104'>未处理</b>";
			}elseif($rs['flag']==1){
				echo "<b style='color:#FF0000'>处理中</b>";
			}elseif($rs['flag']==2){
				echo "<b style='color:#0000FF'>已发布</b>";
			}elseif($rs['flag']==3){
				echo "<b style='color:#0000FF'>已拒稿</b>";
			}else{
				echo "<b style='color:#0000FF'>处理完毕</b>";
			}
		}
	}
	else{
		echo "<b style='color:#2a8104'>官方资源</b>";
	}
	?></DIV></TD>
		<TD bgColor=#ffffff>
		  <DIV align=center><?php echo $rs["data"];?></DIV></TD>
		<TD bgColor=#ffffff>
		  <DIV align=center><?php echo $rs["fbtime"];?></DIV></TD>
		<TD style="PADDING-BOTTOM: 0px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; PADDING-TOP: 0px" 
    bgColor=#ffffff>
      <DIV class="alink" align=center><?php
	if($rs['flag']==0 and $rs['dyn']==1){?>
			<A href="../wyxinfo.php?ID=<?php echo $rs["ID"];?>" target="_blank">预览</A> <A href="wyx_add.php?ID=<?php echo $rs["ID"];?>">再发布</A>
	<?php
	}
	elseif(($rs['flag']==2 or $rs['flag']==3) and $rs['yn']==1){?>
		<A href="../wyxinfo.php?ID=<?php echo $rs["ID"];?>" target="_blank">预览</A> <A href="wyx_edit.php?ID=<?php echo $rs["ID"];?>">编辑</A> <A href="wyx_add.php?ID=<?php echo $rs["ID"];?>">再发布</A>
	<?php
	}
	else { ?>
		<A href="wyx_rec.php?ID=<?php echo $rs["ID"];?>">收稿</A> <A href="wyx_pub.php?ID=<?php echo $rs["ID"];?>">发布</A> <A href="wyx_ref.php?ID=<?php echo $rs["ID"];?>">拒稿</A> <A href="wyx_edit.php?ID=<?php echo $rs["ID"];?>">确认</A>
	<?php
	}
	?></DIV></TD></TR>
	<?php
		$i=$i+1;
		}
	  }?>
      </table><br />
	<table class="tablelist" width="100%" border="0" cellspacing="0" cellpadding="2" style="font-size:12px">
            <tr>
                <td width="87%" height="35" align="center"><DIV class=pager><?php
					  if($Page!=1)
					  {
					  $Prv=$Page-1;
					  echo "<a href=wyx.php?skey=".$skey."&key=".$key."&fbkey=".$fbkey.">首页</a>&nbsp;&nbsp;";
					  echo "<a href=wyx.php?Page=".$Prv."&skey=".$skey."&key=".$key."&fbkey=".$fbkey.">上一页</a>&nbsp;&nbsp;";
					  }
					  else
					  {
					   echo "首页&nbsp;&nbsp;";
					   echo "上一页&nbsp;&nbsp;";
					  }
					  
					if($Page+3<$CountPage+1){
						$ep=$Page+3;
					}else{
						$ep=$CountPage;
					}
					if($Page-3>0){
						$sp=$Page-3;
					}else{
						$sp=1;
					}
					if($Page>=$CountPage-3){
						$sp=$CountPage-5;
					}
					if($Page>4){
						for($i=$sp;$i<=$ep;$i++)
						{
						if($Page==$i){
							$str.="<span class=\"ok\">".$i."</span>&nbsp;&nbsp;";
						}else{
							$str.="<a href=\"?Page=".$i."&skey=".$skey."&key=".$key."&nav_id=".$nav_id."\">".$i."</a>&nbsp;&nbsp;";}
						}
					}else{
						for($j=1;$j<=$ep;$j++)
						{
						if($Page==$j){
							$str.="<span class=\"ok\">".$j."</span>&nbsp;&nbsp;";
						}else{
							$str.="<a href=\"?Page=".$j."&skey=".$skey."&key=".$key."&nav_id=".$nav_id."\">".$j."</a>&nbsp;&nbsp;";}
						}
					}
					echo $str;
					  
					  if($Page!=$CountPage)
					  {
					  $NtPage=$Page+1;
					  $EdPage=$CountPage;
					  echo "<a href=wyx.php?Page=".$NtPage."&skey=".$skey."&key=".$key."&fbkey=".$fbkey.">下一页</a>&nbsp;&nbsp;";
					  echo "<a href=wyx.php?Page=".$EdPage."&skey=".$skey."&key=".$key."&fbkey=".$fbkey.">尾页</a>&nbsp;&nbsp;";
					  }
					  else
					  {
					   echo "下一页&nbsp;&nbsp;";
					   echo "尾页&nbsp;&nbsp;";
					  }
					  echo "当前为".$Page."/".$CountPage."页 每页显示".$List_Num."条记录 共有记录数".$Num."条记录";
					  ?></DIV></td>
            </tr>
      </table>
	</div>
</div>
	<div class="bk20 hr"></div>	
</div>
<div id='closed' class="closed"><div id="model" class="model"></div><a href="#" onclick="$('#closed').slideUp()" style="float:right;padding:20px;">[关闭]</a></div>
<iframe name="main" width="0" height="0" id="main"  frameborder="0"></iframe> 
<script language="javascript">
 function letDivCenter(divName,str){    
        var top = ($(window).height() - $("#closed").height())/2;    
        var left = ($(window).width() - $("#closed").width())/2;    
        var scrollTop = $(document).scrollTop();    
        var scrollLeft = $(document).scrollLeft();    
		$(divName).html(str);
        $("#closed").css( { position : 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } ).slideDown(100);   
    }  
</script>
</body>
</html>
