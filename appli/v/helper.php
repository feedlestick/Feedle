<?php

namespace APPLI\V;

class Helper {

    static function messages() {
        $messages = $_SESSION['messages'];
        $modes = array('danger', 'info', 'success');
        foreach ($modes as $mode) {
            if (sizeof($messages[$mode]) > 0) {
                echo'<div class="alert alert-dismissable alert-',$mode,'">';
                foreach ($messages[$mode] as $mess) {
                    echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                    echo $mess;
                }
                echo '</div>';
                $_SESSION['messages'][$mode] = array();
            }
        }
    }

}
