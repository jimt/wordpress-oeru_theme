<?PHP

function oeru_theme_attachment_field_credit( $form_fields, $post ) {
	$form_fields['oeru-attribution-name'] = array(
		'label' => 'Attribution Name',
		'input' => 'textarea',
		'value' => get_post_meta( $post->ID, 'oeru-attribution-name', true ),
		'helps' => 'If provided, name will be displayed',
	);
	
	$form_fields['oeru-url'] = array(
		'label' => 'Attribution URL',
		'input' => 'textarea',
		'value' => get_post_meta( $post->ID, 'oeru-url', true ),
		'helps' => 'If provided, url will link here',
	);
	
	$form_fields['oeru-license'] = array(
		'label' => 'License',
		'input' => 'textarea',
		'value' => get_post_meta( $post->ID, 'oeru-license', true ),
		'helps' => 'If provided, license will be displayed',
	);
	
	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'oeru_theme_attachment_field_credit', 10, 2 );

function oeru_theme_attachment_field_credit_save( $post, $attachment ) {
	if( isset( $attachment['oeru-attribution-name'] ) )
		update_post_meta( $post['ID'], 'oeru-attribution-name', $attachment['oeru-attribution-name'] );
		
	if( isset( $attachment['oeru-url'] ) )
		update_post_meta( $post['ID'], 'oeru-url', $attachment['oeru-url'] );
		
	if( isset( $attachment['oeru-license'] ) )
		update_post_meta( $post['ID'], 'oeru-license', $attachment['oeru-license'] );
	
	return $post;
}
add_filter( 'attachment_fields_to_save', 'oeru_theme_attachment_field_credit_save', 10, 2 );
	
function oeru_add_attribution($in){

	$output .= "<span class='attrib_picture'>" . $in;

	$name = get_post_meta( $_POST['attachment']['id'], 'oeru-attribution-name', true );
	$url = get_post_meta( $_POST['attachment']['id'], 'oeru-url', true );
	$license = get_post_meta( $_POST['attachment']['id'], 'oeru-license', true );
	
	if($name == ""){
		return $in;
	}

	$output .= "<ul><li>Name :" . $name . "</li>";
	$output .= "<li>URL :" . $url . "</li>";
	$output .= "<li>License :" . $license . "</li>";

	$output .= "</ul>";
	
	return $output;
	
}
add_filter('media_send_to_editor',"oeru_add_attribution");