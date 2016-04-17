package com.jeecms.login.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.jeecms.cms.dao.LoginDao;
import com.jeecms.cms.dao.Pager;
import com.jeecms.cms.domain.CmsRole;
import com.jeecms.core.Page;
import com.jeecms.reg.domain.AdminUser;
import com.jeecms.reg.domain.User;

@Service
/**
 * 
 * @author Administrator
 * @date 2015-10-26
 *
 */
public class LoginService {
	@Autowired
	LoginDao loginDao;

	/**
	 * 
	 * @author jinyy
	 * @return
	 */
	public String getStr() {
		if (loginDao == null) {
			System.out.println("dao is null");
		}
		return loginDao.getStr();
	}  

	public Pager getCmsRoles(int pageSize, int pageNum) {
		Pager cmsRoles = loginDao.getCmsRoles(pageSize, pageNum);
		return cmsRoles;
	}

	public void add(CmsRole cmsRole) {
		loginDao.addBean(cmsRole);
	}

	public LoginDao getLoginDao() {
		return loginDao;
	}

	public User getUserByName(String userName) {
		return loginDao.getUserByName(userName);		
	}

	public AdminUser getAdminUserByName(String userName) {
		// TODO Auto-generated method stub
		return loginDao.getAdminUserByName(userName);	
				}
	
	
	public User getUserByUserNameAndPass(String username,String userpass) {
		User user=loginDao.getUserByUserNameAndPass(username, userpass);
		return user;
		
	}
	

	public AdminUser getAdminUserByUserNameAndPass(String username,String userpass) {
		AdminUser user=loginDao.getAdminUserByUserNameAndPass(username, userpass);
		return user;
		
	}

	public AdminUser findAdminUsers() {
		AdminUser user=loginDao.findAdminUsers();
		return user;
				
	}

	public <T> List<T> getList(Class<T> class1) {
		List<T> list=loginDao.getHibernateTemplate().loadAll(class1);
		return list;
		
	}
	
	public <T> Page getPageList(Class<T> class1,int pageSize,int pageNo,Boolean istrue,String str) {
		Page page= loginDao.getPageList( class1,pageSize,pageNo, istrue,str);
		return page;
		
	}
	
	public <T> Object getBeanById(Class<T> class1,int id) {
		Object object = loginDao.getBeanById(class1, id);
		return object;
	}
	
	public <T> void delete(Class<T> t,String id) {
		loginDao.delete(t,id);
	}

}
