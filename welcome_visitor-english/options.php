<?
	load_plugin_textdomain('welcome_visitor', 'wp-content/plugins/welcome_visitor'); 
	include_once('welcome_visitor.php');
	init_welcome_visitor();
	wp_nonce_field('update-options') ;
	//action url
	//$location = get_option('siteurl') . '/wp-admin/admin.php?page=codecolorer/codecolorer-options.php'; 
	
	
	
	/* Add some default options if they don't exist */
	//add_option('codecolorer_line_numbers', false);
	
	//add_option('codecolorer_lines_to_scroll', $CodeColorer->getDefaultLinesToScroll());
	//add_option('codecolorer_line_height', $CodeColorer->getDefaultLineHeight());
	//add_option('codecolorer_disable_keyword_linking', false);
	//add_option('codecolorer_tab_size', 4);
	
	if ('process' == $_POST['stage']) {
 		 update_option('welcome_visitor_css_style', $_POST['welcome_visitor_css_style']);
 		 update_option('rss_address', $_POST['rss_address']);
 		 
 		// update_option('codecolorer_line_height', intval($_POST['codecolorer_line_height']));
 		// update_option('codecolorer_line_numbers', isset($_POST['codecolorer_line_numbers']));
 		// update_option('codecolorer_disable_keyword_linking', isset($_POST['codecolorer_disable_keyword_linking']));
 		// update_option('codecolorer_tab_site', intval($_POST['codecolorer_tab_size']));
	}
	if($_POST[reset_all]==true){
		reset_all_options();
	}
	/* Get options for form fields */
	$rss_address = get_option('rss_address');
	//echo $rss_address;
	$welcome_visitor_css_style = get_option('welcome_visitor_css_style');
	//$codecolorer_lines_to_scroll = stripslashes(get_option('codecolorer_lines_to_scroll'));
	//$codecolorer_line_height = stripslashes(get_option('codecolorer_line_height'));
	//$codecolorer_disable_keyword_linking = stripslashes(get_option('codecolorer_disable_keyword_linking'));
	//$codecolorer_tab_size = stripslashes(get_option('codecolorer_tab_size'));
	
?>
<div class="wrap"> 
  <h2><?php _e('Welcome Visitor Options', 'welcome_visitor') ?></h2> 
  <form name="form1" method="post" action="<? echo $_SERVER["REQUEST_URI"] ?>&amp;updated=true">
  	<input type="hidden" name="stage" value="process" />
  
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Options', 'welcome_visitor') ?> &raquo;" />
    </p>

    <table width="100%" cellpadding="5" class="optiontable"> 
      <tr valign="top">
        <th scope="row"><label for="welcome_visitor_css_style"><?php _e('CSS Style', 'welcome_visitor') ?>:</label></th>
        <td>
          <input name="welcome_visitor_css_style" type="text"  size="60" id="welcome_visitor_css_style" value="<?php echo get_option('welcome_visitor_css_style'); ?>"/>
        </td>
      </tr>
     <tr valign="top">
        <th scope="row"><label for="rss_address"><?php _e('Your RSS Address', 'welcome_visitor') ?>:</label></th>
        <td>
          <input name="rss_address" type="text"  size="60" id="rss_address" value="<?php echo get_option('rss_address')?>"/><br />
          <?php _e('If you are using feedburner feeds or else, you may change the default rss address.') ?>
  	    </td>
      </tr>
     <tr valign="top">
        <th scope="row"><label for="reset"><?php _e('Reset Default', 'welcome_visitor') ?>:</label></th>
        <td>
          <label for="reset">
       			 <input name="reset_all" type="checkbox" id="reset_all" value="false"> Reset Default          
     			</label>
     		</td>
      </tr>
      
    
    </table>
  	
  
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Options', 'welcome_visitor') ?> &raquo;" />
    </p>
  </form> 
   
</div>


