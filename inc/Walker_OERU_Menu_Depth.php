<?php

class Walker_OERU_Menu_Depth extends Walker {

    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );
	
	var $first = false;

    
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	
		if($depth<=0){
	
			$output .= "<ul class='dropdown-menu'>";
		
		}
	
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
	
		if($depth<=0){
	
			$output .= "</ul>";
			
		}
	
	}
	
	function end_el( &$output, $object, $depth = 0, $args = array() ) {
	
		if($depth<=0){
	
			$output .= "</li>";
			
		}
	
	}
	
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	
		if($depth<=1){
	
		$page_class = "";
		
		foreach($item->classes as $index => $class){
		
			if(strpos($class,"-")===FALSE){
			
				$page_class .= $class . " ";
				unset($item->classes[$index]);
			
			}
		
		}
		
		$item->classes[] = str_replace(" ", "-", strtolower(trim($page_class)));
	
		if(in_array("menu-item-has-children",$item->classes)){
			$item->classes[] = "dropdown";
		}
		
		if($item->menu_item_parent!=0){
			$item->classes[] = "sub-menu";
		}else{
			$item->classes[] = "parent-menu";
		}
		
		if($depth !=0){
			if(($key = array_search("menu-item-has-children", $item->classes)) !== false) {
				unset($item->classes[$key]);
			}
		}
	
        $output .= "<li class='" . implode(" ", $item->classes) . "'><a ";
		if ( $item->object_id === get_the_ID() ) {
			$output .= " class='current' ";
		}
		
		if($depth == 0){
			$output .= " href='#' data-toggle='dropdown' class='dropdown dropdown-toggle'>" . $item->title;
		}else{
			$output .= " href='" . $item->url . "'>" . $item->title;
		}
	
		if($depth==0){
		
			if(in_array("menu-item-has-children",$item->classes)){
				$output .= "<span class='dropdown caret'></span>";	
			}
		
		}
		
		$output .=  "</a>";
		
		}
		
    }

}