<?php
/*
    This file is part of the Basic Meeting List Toolbox (BMLT).

    Find out more at: https://bmlt.app

    BMLT is free software: you can redistribute it and/or modify
    it under the terms of the MIT License.

    BMLT is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    MIT License for more details.

    You should have received a copy of the MIT License along with this code.
    If not, see <https://opensource.org/licenses/MIT>.
*/
defined('BMLT_EXEC') or die('Cannot Execute Directly');    // Makes sure that this file is in the correct context.

// If the single_meeting_id argument is supplied, then we switch to the browser.
if (isset($http_vars['single_meeting_id']) && intval($http_vars['single_meeting_id'])) {
    require_once(dirname(dirname(__FILE__)).'/server/shared/classes/comdef_utilityclasses.inc.php');
    $url_path = GetURLToMainServerDirectory();
    $new_location = $url_path.'client_interface/html/index.php?single_meeting_id='.intval($http_vars['single_meeting_id']);
    
    header("Location: $new_location");
} else {
    require_once(dirname(__FILE__).'/c_comdef_admin_main_console.class.php');

    $console_object = new c_comdef_admin_main_console($http_vars);

    $ret = 'ERROR';

    if ($console_object instanceof c_comdef_admin_main_console) {
        $ret = $console_object->return_main_console_html();
    }

    echo $ret;
}
