<?php
 
/*
 
Plugin Name: Search users in WP DB
 
Plugin URI: 
 
Description: Search users in WP DB
 
Version: 1.0
 
Author: Pranav Thorat
 
Author URI: 
 
License: GPLv2 or later
 
Text Domain: -
 
*/
// Changes made remotely on GIT rep
// Hook the 'wp_footer' action hook, add the function named 'mfp_Add_Text' to it
//add_action("admin_init", "my_app_adduser");
add_action('admin_menu', 'a_qoute_admin_action');


 
// Define 'mfp_Add_Text'
global $ans;
global $example;

//add_menu_page('My Custom Page', 'My Custom Page', 'manage_options', 'my-top-level-slug');


function my_app_adduser()
{
    //$user_search = new WP_User_Query();
    //return (array) $user_search->get_results();
    $ans = get_users( array( 'fields' => array( 'display_name', 'user_email' ) ) );
    //$ans = get_users();
    //var_dump($ans);exit;
    echo '<table>
    <tr><th>Name</th><th>Email</th></tr>
    </table>';
    for($i=0; $i<count($ans); $i++){
        //echo $ans[$i]->display_name;
        //echo $ans[$i]->user_email;
        echo '<br>';
        echo '<table>
        <tr><td>'.$ans[$i]->display_name.'</td><td>'.$ans[$i]->user_email.'</td></tr>
        </table>';
    }

    echo ' <br></br>
    <form action="" method="post">
        Enter User to be searched: <input name="example" type="text" />
        <input name="submit" type="submit" />
    </form>
    <br></br>
    ';
    $flag = 1;
  if (isset($_POST['submit'])) { // nonce parameter, sanitize form data.
      
    $example = $_POST['example'];
    for($i=0; $i<count($ans); $i++){

        if($ans[$i]->display_name==$example)
        {
            echo 'User Found';
            echo '<table>
            <tr><th>Name</th><th>Email</th></tr>
            </table>';
            echo '<table>
            <tr><td>'.$ans[$i]->display_name.'</td><td>'.$ans[$i]->user_email.'</td></tr>
            </table>';
            $flag = 0;
        }
    }
    if($flag==1)
    {
        echo $example.'  - User not found';
    }
  }
  /*
  for($i=0; $i<count($ans); $i++){
    //echo $ans[$i]->display_name;
    //echo $ans[$i]->user_email;
    if($ans[$i]->display_name==$example)
    {
        echo 'User Found';
        echo '<table>
        <tr><td>'.$ans[$i]->display_name.'</td><td>'.$ans[$i]->user_email.'</td></tr>
        </table>';
        $flag = 0;
    }
}
if($flag==1)
{
    echo 'User Not found';
}
*/
}

function testfn()
{
    echo 'hrydsfffffffffffffffffffffffffffuurdggfdrtescxxfffffffffffffffffffffffffffffffff';
}

function a_qoute_admin_action(){
    add_menu_page(
        __('Reservations Pages'),// the page title
        __('Search User'),//menu title
        'edit_themes',//capability 
        'a-qoute',//menu slug/handle this is what you need!!!
        'my_app_adduser',//callback function
        '',//icon_url,
        '100'//position
    );
}
/*
function admin_menu() {

    $page = add_menu_page( 'MO OAuth Settings ' . __( 'Configure OAuth', 'mo_oauth_settings' ), "MO_TEST", 'administrator', 'mo_oauth_settings', array( $this, 'menu_options' ) ,plugin_dir_url(__FILE__) . 'images/miniorange.png');

    global $submenu;
    if(is_array($submenu) && isset($submenu['mo_oauth_settings'])){
        $submenu['mo_oauth_settings'][0][0] = __( 'Configure OAuth', 'mo_oauth_login' );
    }	
}
*/
// $users=get_users();
// var_dump($users);exit;

//$ans = my_app_adduser();

//admin_menu();


//var_dump($ans[0]->display_name);
//echo $ans[0]->display_name;
//var_dump($ans);

//add_action( 'init', 'tutsplus_register_post_type' );

?>
