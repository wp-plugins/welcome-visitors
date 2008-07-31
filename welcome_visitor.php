<?php
/*
Plugin Name: Welcome Visitor
Plugin URI: http://www.kylogs.com/blog/welcomevisitor
Description: welcome the new visitor, and ask him/her to subscribe your feeds :). Go to settings/Welcome Visitor to change the default settings.
Version: 0.9beta
Author: Chen Ju
Author URI: http://www.kylogs.com/blog

Copyright 2008  Chen Ju  (email : sammy105@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
	$h_g="";
	$h_css="";
	$h_welcome1="";
	$h_welcome2="";
	$h_welcome3="";
	$defalut=0;
	
	
	add_action('get_header','say_it');
	add_action('admin_menu','add_setting_options');
	
function setDefault($s){
	$defalut=$s;
}
function init_welcome_visitor(){
	add_option('welcome_visitor_css_style',DefaultStyle());
	add_option('rss_address',get_option('siteurl').'/wp-feed.php');
}
function DefaultStyle(){
	$v_style='background-color: white;border-color: purple;	border-style: dashed;	border-width: 0.5pt;bottom: 5pt;left: 5pt;margin-bottom: 15pt;padding: 10pt;right: 5pt;	top: 5pt;';
	return $v_style;
}
function reset_all_options(){
		update_option('welcome_visitor_css_style', DefaultStyle());
		update_option('default',0);
		update_option('rss_address',get_option('siteurl').'/wp-feed.php');
}
function anay(){
	$h_url=$_SERVER['HTTP_REFERER'];
        if($h_url=='') return;

	$h_hostname=getHostname();
        $h_realurl='http://';
	$h_urls=parse_url($h_url);
        $h_realurl.=$h_urls[host];
        $h_sitename=$h_urls[host];
        if($h_sitename=='www.baidu.com') $h_sitename='Baidu';
        if($h_sitename=='www.google.com') $h_sitename='Google';
        if($h_sitename=='www.sina.com.cn') $h_sitename='Sina';
        if($h_sitename=='www.google.cn') $h_sitename='Google';
        if($h_sitename=='www.sohu.com') $h_sitename='Sohu';
        
   	if(strpos($h_realurl,$h_hostname)<=0){
			/* if user is from outside world */
			
	 		 		$h_g='<div style="';
	 		 		$h_g.=get_option('welcome_visitor_css_style'); 
	 		 		$h_g.=' ">';
          $h_g.='Welcome friends from';
          $h_g.='<a href=';
          $h_g.="$h_realurl";
          $h_g.='>';         
          $h_g.="$h_sitename";
          $h_g.='</a>';
          $h_g.=', if you are new here, ';
          $h_g.='you may want to <a href="';
          $h_g.=get_option('rss_address');
          $h_g.='">subscribe</a> this site.</div>';     
            
	}
	return $h_g;
}
/* return the current site's hostname*/
function getHostname(){
	$temp=parse_url(get_option('siteurl'));
        return $temp[host];
}
function say_it(){    
	echo anay();
      //  echo get_option('siteurl');
        return ;
	}
	
function add_setting_options(){
		add_options_page('Welcome Visitor', 'Welcome Visitor', 5, 'welcome_visitor/options.php');
}		
function options_page(){
		// do nothing
}
		//remove_filter('filter_hook','filter_function')
?>