<?php
class cva_redirector {

    public function __construct() {
        add_action( 'template_redirect', array( $this, 'handle_redirection' ) );
        add_action('wp_ajax_nopriv_cva_check_password', array($this, 'check_password'));
        add_action('wp_ajax_cva_check_password', array($this, 'check_password'));
    }

    public function handle_redirection()
    { 
        // Avoid redirection for admin pages
       if(is_admin()) {
          return;
       }

       $protection_page_id = get_option('cva_protection_page_id', 0);
       $protected_page_id = get_option('cva_page_id', 0);
       $protected_post_id = get_option('cva_post_id', 0);

       //page id cookie check for redirection logic
       if($protected_page_id && is_page($protected_page_id) 
         &&   isset($_COOKIE['cva_page_id'. $protected_page_id]) ) {
          
            return; // User has access, no redirection needed
        }
        
       //post id cookie check for redirection logic
        if($protected_post_id && is_single($protected_post_id) 
         && isset($_COOKIE['cva_post_id'. $protected_post_id]) ) {
          
            return; // User has access, no redirection needed
        }



        // PROTECTED PAGE REDIRECTION LOGIC

        if( $protected_page_id && is_page($protected_page_id )){

            setcookie(

                'cva_target_url',

                get_permalink(
                    $protected_page_id
                ),

                time()+3600,

                '/'

            );

            wp_redirect(

                get_permalink(
                    $protection_page_id
                )

            );

            exit;

        }
        


        
        if(is_single() && $protected_post_id && is_single($protected_post_id)) {
            setcookie( 'cva_target_url', 
            get_permalink($protected_post_id), time() + 3600, '/' ); 
            //set cookie to redirect user to the protected page after successful password entry

            wp_redirect( get_permalink( $protection_page_id ) );
            exit;
        }
        
    }

    public function check_password() {
        
        check_ajax_referer( 'cva_frontend_password_nonce', 'nonce' );

        
       
        $password = isset($_POST['password']) ? sanitize_text_field($_POST['password']) : '';
        $protection_page_id = get_option('cva_protection_page_id', 0);

        if(is_page($protection_page_id)){
             return; // If we're on the protection page, no need to check password again
        }


        if ( empty($password) ) {
            wp_send_json_error( array( 'message' => 'Password is required.' ) );
            return;
        }
        

        $stored_password = get_option('cva_password_id' , '' );

        

        if ( $password === $stored_password ) {

           setcookie( 'cva_access_granted', '1', time() + 3600, '/' ); // Set access granted cookie for 1 hour
            
            $redirect_url = isset($_COOKIE['cva_target_url']) ? esc_url_raw($_COOKIE['cva_target_url']) : home_url();
             
            
            $page_id = get_option('cva_page_id', 0);
            $post_id = get_option('cva_post_id', 0);

            if($page_id && $redirect_url === get_permalink($page_id)) {
                setcookie('cva_page_id' . $page_id, '1', time() + 3600, '/');
            }
            
            if($post_id && $redirect_url === get_permalink($post_id)) {
                setcookie('cva_post_id' . $post_id, '1', time() + 3600, '/');
            }
            wp_send_json_success( array( 'message' => 'Access granted.' , 'redirect_url' => $redirect_url )  );


            

        } else {
            wp_send_json_error( array( 'message' => 'Incorrect password.' ) );
        }

    }

}