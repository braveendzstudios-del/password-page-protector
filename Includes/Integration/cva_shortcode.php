<?php

class cva_shortcode {
    public function __construct() {
       add_shortcode('password_protector_form' , array( $this, 'password_protector_form' ));
    }

    public function password_protector_form() {
        $form = new cva_password_form();
        return $form->render();
    }
}