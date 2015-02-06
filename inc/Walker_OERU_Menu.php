<?php

class Walker_OERU_Menu extends Walker {

    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );
	
	var $first = false;

    
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	
		$output .= "<ul class='dropdown-menu'>";
	
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
	
		$output .= "</ul>";
	
	}
	
	function end_el( &$output, $object, $depth = 0, $args = array() ) {
	
		$output .= "</li>";
	
	}
	
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	
		if(in_array("menu-item-has-children",$item->classes)){
			$item->classes[] = "dropdown";
		}
		
		if($item->menu_item_parent!=0){
			$item->classes[] = "sub-menu";
		}else{
			$item->classes[] = "parent-menu";
		}
	
        $output .= "<li class='" . implode(" ", $item->classes) . "'><a ";
		if ( $item->object_id === get_the_ID() ) {
			$output .= " class='current' ";
		}
		
		if(in_array("menu-item-has-children",$item->classes)){
			$output .= " href='#' class='dropdown-toggle'>" . $item->title;
		}else{
			$output .= " href='" . $item->url . "'>" . $item->title;
		}
	
		if(in_array("menu-item-has-children",$item->classes)){
			$output .= "<span class='caret'></span>";	
		}
		
		$output .=  "</a>";
		
    }

}