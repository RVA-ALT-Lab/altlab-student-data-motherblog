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
		'altlab_student_data_motherblog_options_page'
		); 

}



function altlab_student_data_motherblog_options_page(){

	//require main class 
	if(!current_user_can('manage_options')){
			wp_die( 'You do not have sufficient permissions to access this page' ); 

	}

	require_once(plugin_dir_path(__FILE__) . '/controllers/collect-student-data.php'); 
	require_once(plugin_dir_path(__FILE__) . '/views/student-data.php'); 


}

add_action('admin_menu', 'altlab_student_data_motherblog_menu'); 




function altlab_student_data_motherblog_shortcode($atts = [], $content = null){
		
		ob_start(); 


		require_once(plugin_dir_path(__FILE__) . '/controllers/collect-student-data.php'); 
		require_once(plugin_dir_path(__FILE__) . '/views/student-data.php'); 

		$output = ob_get_clean(); 
		$run_shortcodes = do_shortcode($output); 
		return $run_shortcodes;  
}


// function init_shortcodes(){
// 	add_shortcode('altlabstudentdatamotherblog', 'altlab_student_data_motherblog_shortcode'); 
// }



?>




