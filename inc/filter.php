<?php

if (!class_exists('rat_filter')) {

	class rat_filter extends bit51_rat {
		
		/**
		 * initialize filter
		 */
		function __construct() {
			add_action('init', array(&$this,'target_scripts'));
			add_filter('the_content', array(&$this,'filter_replace_anchor_target')); //add WordPress filter
		}
		
		/**
		 * Register filter javascript
		 */
		function target_scripts() {
			wp_register_script('replace_anchor_target', RAT_PU . 'js/target.js', array('jquery')); //add script to parse link class and open required links in new window
			wp_enqueue_script('replace_anchor_target');
		}
		
		/**
		 * Filter target="_blank" from content
		 */
		function filter_replace_anchor_target($content) {
			$offSet = 0; //start from the beginning
			
			//While we find links
			while ($startLink = stripos(substr($content,$offSet,strlen($content)),'<a')) {
		
				$linkStart = $startLink + $offSet; 
		
				$endLink = stripos(substr($content,$linkStart,strlen($content)),'>');
					
				$link = substr($content,$linkStart,$endLink); 
				
				//if link contains target="_blank" then replace it
				if (strstr($link,'target="_blank"')) {
					if (strstr($link,'class="')) {
						$link = str_ireplace(' target="_blank"','',$link);
						$link = str_ireplace('class="','class="target_blank ',$link);
					} else {
						$link = str_ireplace('target="_blank"','class="target_blank"',$link);
					}
					$newLinkSize = strlen($link);
					$content = substr_replace($content,$link,$linkStart,$endLink);
				}
				$offSet = $linkStart + $newLinkSize;
			}
			
			return $content; //return new content
		
		}
	}
}