<?php 
/* Plugin Name: ALT Lab Student Data Motherblog 
 *
 *
 *
 *
 * 
 *
*/
function altlab_student_data_motherblog_menu(){
	add_menu_page(
		'Mother Blog Student Data', 
		'Student Data', 
		'manage_options', 
		'altlab_student_data_motherblog', 
		'altlab_student_data_motherblog_options_page', 
		'dashicons-chart-bar'
		); 

}
function altlab_student_data_motherblog_options_page(){

	//require main class 
	if(!current_user_can('manage_options')){
			wp_die( 'You do not have sufficient permissions to access this page' ); 

	}

	require_once(plugin_dir_path(__FILE__) . '/controllers/collect-all-student-data.php'); 
	require_once(plugin_dir_path(__FILE__) . '/views/student-data.php'); 
}

add_action('admin_menu', 'altlab_student_data_motherblog_menu'); 

function altlab_student_data_motherblog_load_scripts($hook){
	if($hook !== 'toplevel_page_altlab_student_data_motherblog'){
		return; 
	}
	
	wp_enqueue_style('bootstrap-css', plugins_url('/css/bootstrap.css', __FILE__) ); 


}

add_action('admin_enqueue_scripts', 'altlab_student_data_motherblog_load_scripts');


function altlab_student_data_motherblog_shortcode($atts = [], $content = null){
		
		ob_start(); 


		require_once(plugin_dir_path(__FILE__) . '/controllers/collect-all-student-data.php'); 
		require_once(plugin_dir_path(__FILE__) . '/views/student-data.php'); 

		$output = ob_get_clean(); 
		$run_shortcodes = do_shortcode($output); 
		return $run_shortcodes;  
}


function init_shortcodes_altlab_student_data_motherblog(){
	add_shortcode('altlabstudentdatamotherblog', 'altlab_student_data_motherblog_shortcode'); 
}

add_action('init', 'init_shortcodes_altlab_student_data_motherblog');

?>