<?php

class password_form {
    public function render() {
        ob_start();
        ?>
        <form method="post" class="ppp-password-form" id="ppp-password-form">
            <label for="password">Enter Password:</label>

            <div class="ppp-password-wrapper">  
                <input type="password" id="password" name="password" required autocomplete="current-password">
                <button type="button" id="ppp-password-toggle">
                 <span class="dashicons dashicons-visibility" aria-hidden="true"></span>
                </button>
            </div>

            <input id="ppp-password-submit" type="submit" value="Submit">
        </form>
        <?php
        return ob_get_clean();
    }
}
