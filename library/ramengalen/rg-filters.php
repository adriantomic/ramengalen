<?php 
/**
 * @Author: Adrian Tomic
 * @Date:   2016-03-22 21:16:10
 * @Last Modified by:   Adrian Tomic
 * @Last Modified time: 2016-03-24 10:26:51
 */

// Remove p tags from images
function filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// Remove image links
add_filter( 'the_content', 'attachment_image_link_remove_filter' ); 
function attachment_image_link_remove_filter( $content ) { 
	$content = preg_replace( 
		array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}', 
			'{ wp-image-[0-9]*" /></a>}'), array('<img','" />'), 
		$content ); 
	return $content; 
}