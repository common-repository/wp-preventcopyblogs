<?php
/*
Plugin Name: WP-PreventCopyBlogs [Protect your Wordpress Blogfrom fraudulent copies]
Plugin URI: http://www.techtipsmaster.com/wp-preventcopyblogs.html
Description: This plug-in prevent users copying your content,Track the visitors by recording url and ip,Disable Selection of you text and Right Click for users depending on the option
Version: 1.0
Author: Johnu George
Author URI: http://www.techtipsmaster.com/
*/

/*
Copyright 2008  Johnu George, IN  (http://www.techtipsmaster.com/)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details: http://www.gnu.org/licenses/gpl.txt
*/



$a=0;
function PreventCopyBlogs_no_right_click_msg($PreventCopyBlogs_click_message)
{
if(!$PreventCopyBlogs_click_message){$PreventCopyBlogs_click_message="Please dont copy";}
$file = "data.txt";
$fh = fopen($file, "a+") ;
$ref=$_SERVER['HTTP_REFERER'];
fwrite($fh, $ref);
$ip=$_SERVER['REMOTE_ADDR'];
fwrite($fh, $ip);
$brow=$_SERVER['HTTP_USER_AGENT'];
fwrite($fh, $brow);
fclose($fh);
?>

<script type="text/javascript">
<!--

var message="<?php echo $PreventCopyBlogs_click_message; ?>"+"\n"+"Your ip is recorded as "+"<?php $ip=$_SERVER['REMOTE_ADDR'];echo "$ip";?>"+"\n";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){//Mozila if (!document.all && document.getElementById) type="MOzilla"; 
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")

// --> 
</script>

<?php
}
function PreventCopyBlogs_no_right_click($PreventCopyBlogs_click_message)
{
if(!$PreventCopyBlogs_click_message){$PreventCopyBlogs_click_message="Please dont copy";}
$file = "data.txt";
$fh = fopen($file, "a+") ;
$ref=$_SERVER['HTTP_REFERER'];
fwrite($fh, $ref);
$ip=$_SERVER['REMOTE_ADDR'];
fwrite($fh, $ip);
$brow=$_SERVER['HTTP_USER_AGENT'];
fwrite($fh, $brow);
fclose($fh);
?>

<script type="text/javascript">
<!--

var message="<?php echo $PreventCopyBlogs_click_message; ?>"+"\n"+"Your ip is recorded as "+"<?php $ip=$_SERVER['REMOTE_ADDR'];echo "$ip";?>"+"\n";

///////////////////////////////////
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
// --> 
</script>

<?php
}
function PreventCopyBlogs_no_select()
{
?>
<script type="text/javascript">
function disableSelection(target){
if (typeof target.onselectstart!="undefined") //For IE 
	target.onselectstart=function(){return false}
else if (typeof target.style.MozUserSelect!="undefined") //For Firefox
	target.style.MozUserSelect="none"
else //All other route (For Opera)
	target.onmousedown=function(){return false}
target.style.cursor = "default"
}

</script>

<?php
}

//Please dont remove link.Please give me a backlink for my work
function PreventCopyBlogs_no_select_footer()
// If you are removing this link please consider adding me in your blogroll or write a post about this plugin.
{
?>
<script type="text/javascript">
disableSelection(document.body)
</script>
<small>Copy Protected by <a href="http://www.techtipsmaster.com/" target="_blank">Tech Tips</a>'s <a href="http://www.techtipsmaster.com/wp-preventcopyblogs.html" target="_blank">CopyProtect Wordpress Blogs</a>.</small>
<noscript><small>Copy Protected by <a href="http://www.techtipsmaster.com/" target="_blank">Tech Tips</a> & <a href="http://www.techtipsmaster.com/" target="_blank">Computer Tech Tips</a>'s<a href="http://www.techtipsmaster.com/" target="_blank">Computer Tricks</</noscript>
<?php
}


// Tuning your WP-PreventCopyBlogs
function PreventCopyBlogs_options_page()
{
if($_POST['PreventCopyBlogs_dbsave']){
update_option('PreventCopyBlogs_ser',$_POST['PreventCopyBlogs_ser']);
		update_option('PreventCopyBlogs_usr',$_POST['PreventCopyBlogs_usr']);
                update_option('PreventCopyBlogs_pass',$_POST['PreventCopyBlogs_pass']);
		update_option('PreventCopyBlogs_dbname',$_POST['PreventCopyBlogs_dbname']);
                update_option('PreventCopyBlogs_dbdel',$_POST['PreventCopyBlogs_dbdel']);
                update_option('PreventCopyBlogs_dbno',$_POST['PreventCopyBlogs_dbno']);
		echo '<div class="updated"><p>Database Settings Saved</p></div>';
	}
	if($_POST['PreventCopyBlogs_save']){
		update_option('PreventCopyBlogs_nrc',$_POST['PreventCopyBlogs_nrc']);
		update_option('PreventCopyBlogs_nts',$_POST['PreventCopyBlogs_nts']);
                update_option('PreventCopyBlogs_nrc_t',$_POST['PreventCopyBlogs_nrc_t']);
		update_option('PreventCopyBlogs_nrc_text',$_POST['PreventCopyBlogs_nrc_text']);

		echo '<div class="updated"><p>Settings Saved</p></div>';
	}
	$wp_PreventCopyBlogs_ser = get_option('PreventCopyBlogs_ser');
	$wp_PreventCopyBlogs_usr = get_option('PreventCopyBlogs_usr');
        $wp_PreventCopyBlogs_pass = get_option('PreventCopyBlogs_pass');
        $wp_PreventCopyBlogs_dbname = get_option('PreventCopyBlogs_dbname');
                $wp_PreventCopyBlogs_dbdel = get_option('PreventCopyBlogs_dbdel');
                $wp_PreventCopyBlogs_dbno = get_option('PreventCopyBlogs_dbno');
	$wp_PreventCopyBlogs_nrc = get_option('PreventCopyBlogs_nrc');
	$wp_PreventCopyBlogs_nts = get_option('PreventCopyBlogs_nts');
        $wp_PreventCopyBlogs_nrc_t=get_option('PreventCopyBlogs_nrc_t');
	?>
	<div class="wrap">
	<h1>WP-PreventCopyBlogs</h1>
        <a href="http://www.techtipsmaster.com/wp-preventcopyblogs.html" target="_blank" title="Visit homepage of wordpress plugin WP-PreventCopyBlogs">Visit Plugin page</a> 
	<h2>WP-PreventCopyBlogs Options</h2>
	<form method="post" id="PreventCopyBlogs_options">
		<fieldset class="options">
		<table class="form-table">
		Give details for your database so that you can maintain the list of the users who try to copy your content from the website with their ip and url in the database .
		<tr valign="top">
		<th width="33%" scope="row">Server name</th> 
				<td><input name="PreventCopyBlogs_ser" type="text" id="PreventCopyBlogs_ser" value="<?php echo get_option('PreventCopyBlogs_ser') ;?>" size="30"/>
				eg:localhost
				</td> 
			</tr>
			<tr valign="top">
		<th width="33%" scope="row">User Name</th> 
				<td><input name="PreventCopyBlogs_usr" type="text" id="PreventCopyBlogs_usr" value="<?php echo get_option('PreventCopyBlogs_usr') ;?>" size="30"/>
				
				</td> 
			</tr>
			<tr valign="top">
		<th width="33%" scope="row">Password</th> 
				<td><input name="PreventCopyBlogs_pass" type="text" id="PreventCopyBlogs_pass" value="<?php echo get_option('PreventCopyBlogs_pass') ;?>" size="30"/>
				
				</td> 
			</tr>
			<tr valign="top">
		<th width="33%" scope="row">Database Name</th> 
				<td><input name="PreventCopyBlogs_dbname" type="text" id="PreventCopyBlogs_dbname" value="<?php echo get_option('PreventCopyBlogs_dbname') ;?>" size="30"/>
				
				</td> 
			</tr>
			<tr valign="top"> 
				<th width="33%" scope="row">Delete Database entries:</th> 
				<td>
				<input type="checkbox" id="PreventCopyBlogs_dbdel" name="PreventCopyBlogs_dbdel" value="PreventCopyBlogs_dbdel" <?php if($wp_PreventCopyBlogs_dbdel == true) { echo('checked="checked"'); } ?> />
				check to activate :  (not for inital setup)  use this feature if database is over populated<br /></td></tr>	
		       <tr valign="top">
		<th width="33%" scope="row">Number of Database Entries</th> 
				<td><input name="PreventCopyBlogs_dbno" type="text" id="PreventCopyBlogs_dbno" value="<?php echo get_option('PreventCopyBlogs_dbno') ;?>" size="3"/>
				number of entries (visitor details) to be displayed below from the database
				</td> 
			</tr>
		<tr>
        <th width="33%" scope="row">Save Database settings :</th> 
        <td>
		<input type="submit" name="PreventCopyBlogs_dbsave" value="Save Database Settings" />
        </td>
        </tr>	</table>
				
		<table class="form-table">
			
			<tr valign="top"> 
				<th width="33%" scope="row">Disable right mouse click:</th> 
				<td>
				<input type="checkbox" id="PreventCopyBlogs_nrc" name="PreventCopyBlogs_nrc" value="PreventCopyBlogs_nrc" <?php if($wp_PreventCopyBlogs_nrc == true) { echo('checked="checked"'); } ?> />
				check to activate <br /></td></tr>
                         <tr valign="top"> 
				<th width="33%" scope="row">Enable message to be displayed</th> 
				<td>
<input type="checkbox" id="PreventCopyBlogs_nrc_t" name="PreventCopyBlogs_nrc_t" value="PreventCopyBlogs_nrc_t" <?php if($wp_PreventCopyBlogs_nrc_t == true) { echo('checked="checked"'); } ?> />
				check to activate:If activated,message option below must be enabled. <br />

				<input name="PreventCopyBlogs_nrc_text" type="text" id="PreventCopyBlogs_nrc_text" value="<?php echo get_option('PreventCopyBlogs_nrc_text') ;?>" size="30"/>
				This warning will be given to users who right click .Above option must be checked for this feature.
				</td> 
			</tr>
			<tr valign="top"> 
				<th width="33%" scope="row">Disable text selection:</th> 
				<td>
				<input type="checkbox" id="PreventCopyBlogs_nts" name="PreventCopyBlogs_nts" value="PreventCopyBlogs_nts" <?php if($wp_PreventCopyBlogs_nts == true) { echo('checked="checked"'); } ?> />
				check to activate.
				</td> 
			</tr>
			
		<tr>
        <th width="33%" scope="row">Save settings :</th> 
        <td>
		<input type="submit" name="PreventCopyBlogs_save" value="Save Settings" />
        </td>
        </tr>
			<tr>
        <th scope="row" style="text-align:right; vertical-align:top;">
        <td>
		<h3>Do you have any doubts???</h3>
		<p>Why don't you <a href="/wp-admin/post-new.php">write a post</a> about <a href="http://www.techtipsmaster.com/wp-preventcopyblogs.html" target="_blank">WP-PreventCopyBlogs</a> ?</p>
		<h3>Problems, Questions, Suggestions ?</h3>
		<p>If you find anything difficult or getting some errors,you can get support from <a href="http://www.techtipsmaster.com/wp-preventcopyblogs.html" target="_blank">WP-PreventCopyBlogs Homepage</a></p>
        </td>
        </tr>
        <tr>
        <th width="33%" scope="row">Please Donate :</th>
        <td>
   <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7528585"><img src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" alt="PayPal - The safer, easier way to pay online!"></a>
Whatever be the amount you donate,it will be a great help to me to pay for the server costs.I will list you in my donors section of the plugin.reply to my plugin page or mail to techtipsmaster@gmail.com
Refer <a href="http://www.techtipsmaster.com/wp-preventcopyblogs.html#donate">Donate to my plugin</a> and <a href ="http://www.techtipsmaster.com/wp-preventcopyblogs.html#donors">Donors of my plugin</a></td>
        </tr>
		</table>
		
			
		<table class="form-table">
			
			<?php
			$wp_PreventCopyBlogs_ser1 = get_option('PreventCopyBlogs_ser');
	$wp_PreventCopyBlogs_usr1 = get_option('PreventCopyBlogs_usr');
        $wp_PreventCopyBlogs_pass1=get_option('PreventCopyBlogs_pass');
        $wp_PreventCopyBlogs_dbname1 = get_option('PreventCopyBlogs_dbname');
   if($wp_PreventCopyBlogs_ser1&&$wp_PreventCopyBlogs_usr1)     
        $dbhandle1 = mysql_connect($wp_PreventCopyBlogs_ser1, $wp_PreventCopyBlogs_usr1, $wp_PreventCopyBlogs_pass1)

or die("Couldnt connect to SQL Server on $wp_PreventCopyBlogs_ser");

//select a database to work with
if($wp_PreventCopyBlogs_dbname1&&$dbhandle1){
$selected1 = mysql_select_db($wp_PreventCopyBlogs_dbname1, $dbhandle1)

or die("Could not open database $wp_PreventCopyBlogs_dbname");

$query=mysql_query ("SELECT * from dbnames");
echo "<table border=1 width='100%'> ";
  echo "<tr><td >Ip of the user</td><td >Referral Url</td><td>Relative Path</tr>";
  
   while(($row=mysql_fetch_assoc($query))&& ($a++ < $wp_PreventCopyBlogs_dbno))
   {
   echo "<tr><td align='right'>".$row['ip']."</td><td  
align='left'>".$row['referral_url']."</td><td>".$row['rel_path']."</td></tr>";
   }
   echo "</table>";$a=0;
   mysql_close($dbhandle1);} ?></table>
		
		
		
		
		
		
		
		<h3>Credit</h3>
		Plug in developed by <a href="http://www.techtipsmaster.com/" target="_blank">Johnu George</a>. <br />
		</fieldset>
	</form>
	</table>
		
	</div>
	<?php
}


function PreventCopyBlogs()
{        $ref=$_SERVER['HTTP_REFERER'];
$ip=$_SERVER['REMOTE_ADDR']; 
$rel=$_SERVER['PHP_SELF'];
        $wp_PreventCopyBlogs_ser = get_option('PreventCopyBlogs_ser');
	$wp_PreventCopyBlogs_usr = get_option('PreventCopyBlogs_usr');
        $wp_PreventCopyBlogs_pass=get_option('PreventCopyBlogs_pass');
        $wp_PreventCopyBlogs_dbname = get_option('PreventCopyBlogs_dbname');
        $wp_PreventCopyBlogs_dbdel = get_option('PreventCopyBlogs_dbdel');
        $wp_PreventCopyBlogs_dbno = get_option('PreventCopyBlogs_dbno');
   if($wp_PreventCopyBlogs_ser&&$wp_PreventCopyBlogs_usr)     
        $dbhandle = mysql_connect($wp_PreventCopyBlogs_ser, $wp_PreventCopyBlogs_usr, $wp_PreventCopyBlogs_pass)

or die("Couldnt connect to SQL Server on $wp_PreventCopyBlogs_ser");

//select a database to work with
if($wp_PreventCopyBlogs_dbname&&$dbhandle){
$selected = mysql_select_db($wp_PreventCopyBlogs_dbname, $dbhandle)

or die("Could not open database $wp_PreventCopyBlogs_dbname"); 
$sql ="CREATE TABLE dbnames (
	  ip VARCHAR(55) NOT NULL,
	  referral_url VARCHAR(100) NULL,
	  rel_path VARCHAR(100) NULL
	);";
$result = mysql_query($sql);
mysql_query ("INSERT INTO dbnames (ip,referral_url,rel_path) VALUES('$ip','$ref','$rel')");
//$result = mysql_query($sql);
if($wp_PreventCopyBlogs_dbdel == true){mysql_query ("TRUNCATE TABLE dbnames");}


mysql_close($dbhandle);
}
	$wp_PreventCopyBlogs_nrc = get_option('PreventCopyBlogs_nrc');
	$wp_PreventCopyBlogs_nts = get_option('PreventCopyBlogs_nts');

	$wp_PreventCopyBlogs_nrc_t = get_option('PreventCopyBlogs_nrc_t');
	$wp_PreventCopyBlogs_nrc_text = get_option('PreventCopyBlogs_nrc_text');
	$pos = strpos(strtolower(getenv("REQUEST_URI")), '?preview=true');
	
	if ($pos === false) {
//if($wp_PreventCopyBlogs_nrc_t == true)
{
		if($wp_PreventCopyBlogs_nrc == true) 
		{
			if($wp_PreventCopyBlogs_nrc_t == true)
		{ PreventCopyBlogs_no_right_click_msg($wp_PreventCopyBlogs_nrc_text); }
			else
		{ PreventCopyBlogs_no_right_click($wp_PreventCopyBlogs_nrc_text); }
		}
		if($wp_PreventCopyBlogs_nts == true) { PreventCopyBlogs_no_select(); }
		
	}
}
}

function PreventCopyBlogs_footer()
{
	$wp_PreventCopyBlogs_nts = get_option('PreventCopyBlogs_nts');

	//if($wp_PreventCopyBlogs_nts == true) 
          { PreventCopyBlogs_no_select_footer(); }

}
function PreventCopyBlogs_adminmenu()
{
	if (function_exists('add_options_page')) {	
		add_options_page('WP-PreventCopyBlogs', 'WP-PreventCopyBlogs', 9, basename(__FILE__),'PreventCopyBlogs_options_page');
		//add_menu_page('WP-PreventCopyBlogsdb', 'WP-PreventCopyBlogsdb', 8, basename(__FILE__),'PreventCopyBlogs_options_pagedb');
	         // Add a new top-level menu (ill-advised):
    //add_menu_page('Test Toplevel', 'Test Toplevel', 8, __FILE__, 'mt_toplevel_page');

    // Add a submenu to the custom top-level menu:
  // add_submenu_page(__FILE__, 'Test Sublevel', 'Test Sublevel', 8, 'sub-page', 'mt_sublevel_page');
	}
}

//  Commanding the Wordpress
add_action('wp_head','PreventCopyBlogs');
add_action('wp_footer','PreventCopyBlogs_footer');
add_action('admin_menu','PreventCopyBlogs_adminmenu',1);
?>
