<?php

class cva_password_form{
    public function render() {
        ob_start();
        ?>
        <form method="post" class="cva-password-form" id="cva-password-form">
            <label for="cva_password_id">Enter Password:</label>

            <div class="cva-password-wrapper">  
                <input type="password" id="cva_password_id" name="cva_password_id" required autocomplete="current-password">
                <button type="button" id="cva-password-toggle">
                 <span class="dashicons dashicons-visibility" aria-hidden="true"></span>
                </button>
            </div>

            <input id="cva-password-submit" type="submit" value="Submit">
        </form>
        <?php
        return ob_get_clean();
    }
}
