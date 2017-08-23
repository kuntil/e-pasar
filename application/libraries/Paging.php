<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paging  {

	function paginate_function($item_per_page, $current_page, $total_records, $total_pages){
	
		$pagination = '';
		if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
			$pagination .= '<div class="box-footer clearfix">';
			$pagination .= '<ul class="pagination pagination-sm no-margin pull-right">';
					
			$right_links    = $current_page + 3; 
			$previous       = $current_page - 3; //previous link 
			$next           = $current_page + 1; //next link
			$first_link     = true; //boolean var to decide our first link
			
			if($current_page > 1){
				//$previous_link = ($previous==0)? 1: $previous;
				$previous_link = $current_page - 1 ;
				$pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
				$pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
					for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
						if($i > 0){
							$pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
						}
					}   
				$first_link = false; //set first link to false
			}
			
			 if($first_link){ //if current active page is first link
				$pagination .= '<li "><span>'.$current_page.'</span></li>';
			}elseif($current_page == $total_pages){ //if it's the last active link
				$pagination .= '<li "><span>'.$current_page.'</span></li>';
			}else{ //regular current link
				$pagination .= '<li "><span>'.$current_page.'</span></li>';
			}
					
			for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
				if($i<=$total_pages){
					$pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
				}
			}
			if($current_page < $total_pages){ 
					//$next_link = ($i > $total_pages) ? $total_pages : $i;
					$next_link = $current_page + 1 ;
					$pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
					$pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
			}
			
			$pagination .= '</ul>'; 
			$pagination .= '</div>'; 
		}
		return $pagination; //return pagination links
	}

    
}
