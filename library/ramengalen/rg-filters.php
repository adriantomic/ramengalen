<?php 
/**
 * @Author: Adrian Tomic
 * @Date:   2016-03-22 21:16:10
 * @Last Modified by:   Adrian Tomic
 * @Last Modified time: 2016-03-22 21:25:54
 */

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');