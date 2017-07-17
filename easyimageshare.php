<?php

/*
Plugin Name: Easy Image Share
Plugin URI: http://www.kaitoradesigns.co.uk
Description: A simple plugin that appends a code for the user to share your images on other webpages. This offers HTML and BB code.
Version: 1.4
Author: Kaitora
Author URI: http://www.kaitoradesigns.co.uk
License: GPL2

*/

/*  Copyright 2010  Kaitora  (email : bowerman39@hotmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

function easyimagesharefilter($content){
    
    $checkforallow = strpos($content,'[stop-eis]');
    if($checkforallow !== false){
        
    $content2 = str_replace('[stop-eis]','',$content);
    $content = $content2;
        
    } ELSE {

$simpleimagefind = '|<img.*?src=[\'"](.*?)[\'"].*?>|i';

if(preg_match($simpleimagefind, $content, $foundimage)){

	$imagelocurl = $foundimage[1];

$easyshareimagetextcodehtml = 'HTML Code <BR />

	<textarea rows="3" cols="60" onClick=select()><A href="'.get_bloginfo('url').'"><IMG src="'.$imagelocurl.'"></A></textarea><BR /> ' ;

$easyimagesharetextcodebbcode = 'BB Code<BR />

	<textarea rows="3" cols="60" onClick=select()>[url='.get_bloginfo('url').'][img]'.$imagelocurl.'[/img][/url]</textarea> ' ;

if(get_option('eisallowhtml') == "yes") { 

	$content .= $easyshareimagetextcodehtml ;

}

if(get_option('eisallowbb') == "yes") {

        $content .= $easyimagesharetextcodebbcode ;

}
	}
    
}

return $content;

}

function easyimageshareinstall(){

add_option('eisallowhtml','yes');
add_option('eisallowbb','yes');

}

function easyimageshareuninstall(){

delete_option('eisallowhtml');
delete_option('eisallowbb');

}

function easyimageaddadmin(){

add_options_page('Easy Image Share', 'Easy Image Share', '9', 'eisid', 'easyimageshareoptions');

}

function easyimageshareoptions(){

include('easy_image_share_admin.php');

}

register_activation_hook(__FILE__,'easyimageshareinstall');
add_action('admin_menu','easyimageaddadmin');
add_filter('the_content', 'easyimagesharefilter');
register_deactivation_hook( __FILE__, 'easyimageshareuninstall' );
?>