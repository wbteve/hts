﻿<?php
include ("checkuser.php");
include("../include/config.php");
?>
<HTML>
<HEAD>
<TITLE>后台管理中心</title>   </title> <LINK rel=stylesheet type=text/css href="../css/style2.css">    
<LINK rel=stylesheet type=text/css href="../css/select.css">
<SCRIPT language=javascript type=text/javascript src="../css/j_dialog.js"></SCRIPT>  
<SCRIPT language=javascript type=text/javascript src="../css/jquery.js"></SCRIPT> 
   
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<META content=IE=7 http-equiv=X-UA-Compatible>
<LINK rel=stylesheet type=text/css href="../images/reset.css">
<LINK rel=stylesheet type=text/css href="../images/zh-cn-system.css">
<SCRIPT language=javascript type=text/javascript src="../images/jquery.min.js"></SCRIPT>
<SCRIPT language=javascript type=text/javascript src="../images/styleswitch.js"></SCRIPT>

<META name=GENERATOR content="MSHTML 8.00.6001.19394">
</HEAD>
<BODY>
<STYLE type=text/css>HTML {
	_overflow-y: scroll
}
.wycz_zh {
	LINE-HEIGHT: 32px; MARGIN-TOP: 10px
}
.wycz_zh TABLE {
	TEXT-ALIGN: center; BORDER-COLLAPSE: collapse
}
.wycz_zh TABLE {
	BORDER-BOTTOM: #b0c5ee 1px solid; BORDER-LEFT: #b0c5ee 1px solid; HEIGHT: 45px; BORDER-TOP: #b0c5ee 1px solid; BORDER-RIGHT: #b0c5ee 1px solid
}
.wycz_zh TH {
	BORDER-BOTTOM: #b0c5ee 1px solid; BORDER-LEFT: #b0c5ee 1px solid; HEIGHT: 45px; BORDER-TOP: #b0c5ee 1px solid; BORDER-RIGHT: #b0c5ee 1px solid
}
.wycz_zh TD {
	BORDER-BOTTOM: #b0c5ee 1px solid; BORDER-LEFT: #b0c5ee 1px solid; HEIGHT: 45px; BORDER-TOP: #b0c5ee 1px solid; BORDER-RIGHT: #b0c5ee 1px solid
}
.wycz_zh TH {
	BACKGROUND: #f0f5fb
}
#kaihu_sm {
	MARGIN-TOP: 20px; COLOR: #ff0000; FONT-SIZE: 14px; FONT-WEIGHT: normal
}
</STYLE>

<DIV style="_width: 98.9%; _margin-right: -12px" id=main_frameid class="pad-10 display">
<DIV class="col-2  col-auto">
<H6>提现申请</H6>
<DIV class=content>
<FORM onsubmit="return check()" method=post name=alipayment action="savetixian.php?action=add">
<table class="tablelist" cellSpacing=1 cellPadding=5 width="100%"  style="font-size:13px">
  <TBODY>
  <TR>
    <TD bgColor=#ffffff height=30>
      <DIV align=center>提　　现</DIV></TD>
    <TD bgColor=#ffffff align=left><IMG src="../images/zfb.jpg" width=256 
      height=57></TD></TR>
  <TR>
    <TD bgColor=#ffffff height=30 width="12%">
      <DIV align=center>
      <DIV align=center>提现用户</DIV></DIV></TD>
	  <INPUT id="VipUser" value="<?php echo $_COOKIE["VipUser"];?>" type="hidden" name="VipUser">
    <TD bgColor=#ffffff width="88%" align=left>&nbsp;&nbsp;<?php echo $_COOKIE["VipUser"];?></TD></TR>
  <TR>
    <TD bgColor=#ffffff height=30 width="12%">
      <DIV align=center>
      <DIV align=center>支付宝账号</DIV></DIV></TD>
    <TD bgColor=#ffffff width="88%" align=left>&nbsp;&nbsp;<INPUT style="WIDTH: 180px" id="accnumber" lang=require class=txt size=80 name="accnumber"></TD></TR>
  <TR>
    <TD bgColor=#ffffff height=30>
      <DIV align=center>提现金额</DIV></TD>
    <TD bgColor=#ffffff align=left>&nbsp; <INPUT style="WIDTH: 80px" id="money" lang=require class=txt size=40 name="money"> 元 </TD></TR>
  <TR>
    <TD bgColor=#ffffff height=30>&nbsp;</TD>
    <TD bgColor=#ffffff align=left>　<INPUT style="WIDTH: 60px; HEIGHT: 25px" id=button value=" 提 交 " type=submit name=button></TD></TR></TBODY></TABLE></FORM>
<DIV class="bk20 hr"></DIV>
</DIV></DIV>
<DIV class="bk20 hr"></DIV></DIV><IFRAME id=main height=0 src="about:blank" 
frameBorder=0 width=0 name=main></IFRAME>
<SCRIPT type=text/javascript>
function check()
    {
        var flg = true;
		var flg1= true;
        $("input[lang='require']").each(function(){
			$(this).css("border-color","#ffffff"); 
            if($(this).val() == "") {
                flg = false;   
				$(this).css("border-color","#FF0000");            
            }        
        })
		 
		if(flg==false)
		{
	 	    alert('红色提示为关键信息,请填写完整,不能空!');
			return false;   
			
		}
		
        return true;
    }  

</SCRIPT>
</BODY>
</HTML>