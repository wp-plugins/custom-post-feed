<?php
/*
Plugin Name: Custom Post Feed
Description: Allows you to create feed for your custom post
Version:     0.1
Author:      Praveen Kumar
Plugin URI:  http://webdesigingcoding.wordpress.com/2010/09/03/custom-post-feed-plugin/
Author URI:  http://webdesigingcoding.wordpress.com
Please visit the Plugin URI for instructions on usage.

*/


function custom_feed() {
$x=get_bloginfo('url');
$n=get_bloginfo('name');
$post_types=get_post_types('','names'); 
foreach ($post_types as $post_type ) {
if($post_type=='post'||$post_type=='page'||$post_type=='revision'||$post_type=='nav_menu_item'||$post_type=='attachment')
{
}
else
{
query_posts('post_type='.$post_type.'&post_status=publish');
if(have_posts())
{
echo "<link rel=alternate type=application/rss+xml title='".$post_type." RSS Feed' href='".$x."/". $post_type."/feed/'></link>";
}
}
}
}
add_action( 'wp_head', 'custom_feed' );
?>
