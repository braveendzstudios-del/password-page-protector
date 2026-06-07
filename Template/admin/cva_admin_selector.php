<?php

class cva_admin_selector{
    
    public function render() {
       ob_start();

       // Ge saved options
        $saved_password = get_option('cva_password_id', '');
        $saved_protection_page_id = get_option('cva_protection_page_id', 0);
        $saved_page_id = get_option('cva_page_id', 0);
        $saved_post_id = get_option('cva_post_id', 0);
        
       ?>
         <div class="wrap">
           
         <h1>Content Vault Accessor Configuration</h1>
         <p>Use Shortcode [password_protector_form] to display the password 
          protection form on any page or post.</p>
           
         <div class="cva-content-wrapper">

              <form method="post" action="cva_save_settings" id="cva-settings-form">
                <input type="hidden" name="cva_action" value="save_settings">
                <?php wp_nonce_field( 'cva_save_settings', 'cva_nonce' ); ?>

                <!--#Password Field-->
                 <div class="cva-password-field">
                  <label for='cva_password'>Your Password</label>
                  <p>Add a password to protect your content.</p>
                  <input type='password'name='cva_password' id='cva_password_id' 
                   value='<?php echo esc_attr($saved_password); ?>' required>
                  <button type="button" id="cva-show-password" class="button">Show Password</button>
                 </div>
                <!--#Password Field End-->
                 
                <!--#Password Page Selector-->
                 <div class="cva-password-page-selector">
                  <label for="cva_protection_page">Select Protection Page</label>
                  <p>If You don't have a password-protected page yet, 
                    create one using the [password_protector_form] shortcode.</p>
                  
                    <select name="cva_protection_page" id="cva_protection_page_id">
                       <!-- Default option -->
                      <option value="">--No Protection Page--</option>
                      <?php
                          $pages = get_pages(array('numberpages'=>-1));
                            foreach ( $pages as $page ) {

                            if (has_shortcode($page->post_content, 'password_protector_form')) {
                                  echo "<option value='" . esc_attr($page->ID) . "' " 
                                  . selected($saved_protection_page_id, $page->ID, false) . ">
                                  " . esc_html($page->post_title) . "</option>";
                            }

                        }
                      ?>
                    </select>
                 </div>
                <!--#Password Page Selector End-->

                <!--#Password Protected Page Selector-->

                 <div class="cva-protection-page-to-protect-selector">

                     <label for="cva_page_id">Select Page You Want To Protect  </label>
                      <p>Select a page from the list below to apply password protection.</p>
                      <select name="cva_page_id" id="cva_page_id">
                      
                        <!-- Default option -->
                        <option value="" >--No Page--</option>
                      
                        <?php
                        $pages = get_pages(array('numberpages'=>-1));
                          foreach ( $pages as $page ) {
                            if (!has_shortcode($page->post_content, 'password_protector_form')) {
                                

                                 echo "<option value='" . esc_attr($page->ID) . "' " 
                                 . selected($saved_page_id, $page->ID, false) . ">" . esc_html($page->post_title) . "</option>";

                            }
                        }

                      ?>

                      </select>

                 </div>
                <!--#Password Protected Page Selector End-->

                <!-- #Password Protected Post Selector -->
                  
                  <div class="cva-protection-post-to-protect-selector">

                    <label for="cva_post_id">Select Post You Want to Protect:</label>
                     <p>select a post from the list below to apply password protection.</p>
                    <select name="cva_post_id" id="cva_post_id">
                      
                       <!-- Default option -->
                       <option value="">-- No Post --</option>
                      
                      <?php
                      $posts = get_posts( array( 'numberposts' => -1 ) );
                      foreach ( $posts as $post ) {
                          if ( ! has_shortcode( $post->post_content, 'password_protector_form' ) ) {
                              echo "<option value='" . esc_attr($post->ID) . "' " 
                              . selected( $saved_post_id, $post->ID, false ) . "
                              >" . esc_html($post->post_title) ."</option>";
                          }
                      }
                      ?>
                    </select>

                  </div>

                <!-- #Password Protected Post Selector End -->
                 
                  
                <button type="submit"  id="cva-save-btn" class="button button-primary">Save Settings</button>
              </form>


         </div>
             
       <?php

       return ob_get_clean();
    } 

}


