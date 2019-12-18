<?php
function the100_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}
function the100_sanitize_radio_webpagelayout($input) {
	$valid_keys = array(
		'fullwidth' => __('Full Width', 'the100'),
		'boxed' => __('Boxed Layout', 'the100'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function the100_sanitize_radio_templatelayout($input) {
	$valid_keys = array(
		'template1' => __('Template 1', 'the100'),
		'template2' => __('Template 2', 'the100'),
		'template3' => __('Template 3', 'the100'),
		'template4' => __('Template 4', 'the100'),
		'template5' => __('Template 5', 'the100'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function the100_sanitize_transition_type($input) {
	$valid_keys = array(
		'fadeOut' => __('Fade', 'the100'),
		'slideOutLeft' => __('Slide', 'the100'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function the100_sanitize_radio_alignment_logo($input) {
	$valid_keys = array(
		'left'=>__('Logo and Menu at Left with ads', 'the100'),
		'center'=>__('Logo and Menu at Center', 'the100'),
		'right'=>__('Logo and Menu at Right with ads', 'the100')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}


function the100_sanitize_radio_sidebar($input) {
	$valid_keys = array(
		'left-sidebar' =>  __('Left Sidebar','the100'),
		'right-sidebar' =>  __('Right Sidebar','the100'),
		'no-sidebar' =>  __('No Sidebar','the100'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

   //integer sanitize
function the100_sanitize_integer($input){
	return intval( $input );
}

function the100_sanitize_list_grid($input){
	$layout = array(
		'list' => __('List View', 'the100'),
		'grid' => __('Grid View', 'the100'),                    
		);

	if(array_key_exists($input,$layout)){
		return $input;
	}else{
		return '';
	}
}

function the100_sanitize_yes_no($input){
	$layout = array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),                    
		);
	
	if(array_key_exists($input,$layout)){
		return $input;
	}else{
		return '';
	}
}
function the100_sanitize_caption($input){
	$layout = array(
		'caption-no' => __('No caption', 'the100'),
		'caption-left' => __('Left Aligned', 'the100'),
		'caption-center' => __('Center Aligned', 'the100'),                   
		);
	
	if(array_key_exists($input,$layout)){
		return $input;
	}else{
		return '';
	}
}


function the100_sanitize_lay($input){
	$layout = array(
		'lay-one' => __('Layout One', 'the100'),
		'lay-two' => __('Layout Two', 'the100'),
		'lay-three' => __('Layout Three', 'the100'),
		'lay-four' => __('Layout Four', 'the100'),
		'lay-five' => __('Layout Five', 'the100'),
		);
	
	if(array_key_exists($input,$layout)){
		return $input;
	}else{
		return '';
	}
}
function flag_header_lay_one(){
	$the100_lay = get_theme_mod( 'the100_header_layout_setting','lay-one');
	if( $the100_lay == 'lay-one') {
		return true;
	}
	return false;
}
function flag_header_lay_two(){
	$the100_lay = get_theme_mod( 'the100_header_layout_setting','lay-one');
	if( $the100_lay == 'lay-two') {
		return true;
	}
	return false;
}
function the100_autoplay_on() {
	$the100_auto = get_theme_mod( 'the100_home_slider_transition_auto','yes');
	if( $the100_auto == 'yes') {
		return true;
	}
	return false;
}
function the100_counter_layone() {
	$the100_lay = get_theme_mod( 'the100_home_counter_layout','lay-one');
	if( $the100_lay == 'lay-one') {
		return true;
	}
	return false;
}
function the100_sanitize_radio_image($input){
	$layout = array(
		'large-image' => __('Above Content', 'the100'),
		'medium-image' => __('Beside Content', 'the100'),
		);
	
	if(array_key_exists($input,$layout)){
		return $input;
	}else{
		return '';
	}
}
function the100_archive_type_list(){
	$the100_list = get_theme_mod( 'the100_archive_type_layout','list');
	if( $the100_list == 'list') {
		return true;
	}
	return false;
}