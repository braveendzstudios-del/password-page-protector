<?php

class content_vault_accessor_shortcode {
    public function __construct() {
       add_shortcode('password_protector_form' , array( $this, 'password_protector_form' ));
    }

    public function password_protector_form() {
        $form = new password_form();
        return $form->render();
    }
}