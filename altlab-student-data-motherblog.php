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

	


}

add_action('admin_menu', 'altlab_student_data_motherblog_menu'); 
?>