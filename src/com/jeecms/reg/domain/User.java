package com.jeecms.reg.domain;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

/**
 * 
 * @Title: User.java
 * @Description: TODO(用一句话描述该文件做什么)
 * @author : jinyangyang
 * @date :2016-2-4 上午10:15:19
 * @version V1.0
 */
@Entity
@Table(name = "user")
public class User {

	private Integer ID;

	private String VipUser;

	private String VipPass;

	private String medianame;

	private String qq;

	private String dianhua;

	private String myemail;

	private String weburl;
	/**
	 * 会员类型 1 管理员   ， 2加盟合作用户，      3企业用户
	 */
	private Integer flag;

	private String ip;

	private String regtime;

	private String data;//时间

	private Double yue;//账户余额

	private Double tyue;

	private String headpic;

	@Id
	@Column(name = "ID")
	@GeneratedValue(strategy = GenerationType.AUTO)
	public Integer getID() {
		return ID;
	}

	public void setID(Integer iD) {
		ID = iD;
	}

	@Column(name = "VipUser")
	public String getVipUser() {
		return VipUser;
	}

	public void setVipUser(String vipUser) {
		VipUser = vipUser;
	}

	@Column(name = "VipPass")
	public String getVipPass() {
		return VipPass;
	}

	public void setVipPass(String vipPass) {
		VipPass = vipPass;
	}

	@Column(name = "medianame")
	public String getMedianame() {
		return medianame;
	}

	public void setMedianame(String medianame) {
		this.medianame = medianame;
	}

	@Column(name = "qq")
	public String getQq() {
		return qq;
	}

	public void setQq(String qq) {
		this.qq = qq;
	}

	@Column(name = "dianhua")
	public String getDianhua() {
		return dianhua;
	}

	public void setDianhua(String dianhua) {
		this.dianhua = dianhua;
	}

	@Column(name = "myemail")
	public String getMyemail() {
		return myemail;
	}

	public void setMyemail(String myemail) {
		this.myemail = myemail;
	}

	@Column(name = "weburl")
	public String getWeburl() {
		return weburl;
	}

	public void setWeburl(String weburl) {
		this.weburl = weburl;
	}

	@Column(name = "flag")
	public Integer getFlag() {
		return flag;
	}

	public void setFlag(Integer flag) {
		this.flag = flag;
	}

	@Column(name = "ip")
	public String getIp() {
		return ip;
	}

	public void setIp(String ip) {
		this.ip = ip;
	}

	@Column(name = "regtime")
	public String getRegtime() {
		return regtime;
	}

	public void setRegtime(String regtime) {
		this.regtime = regtime;
	}

	@Column(name = "data")
	public String getData() {
		return data;
	}

	public void setData(String data) {
		this.data = data;
	}

	@Column(name = "yue")
	public Double getYue() {
		return yue;
	}

	public void setYue(Double yue) {
		this.yue = yue;
	}

	@Column(name = "tyue")
	public Double getTyue() {
		return tyue;
	}

	public void setTyue(Double tyue) {
		this.tyue = tyue;
	}

	@Column(name = "headpic")
	public String getHeadpic() {
		return headpic;
	}

	public void setHeadpic(String headpic) {
		this.headpic = headpic;
	}

}
