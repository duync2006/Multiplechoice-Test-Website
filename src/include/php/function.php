<?php
    function strongPassword($pass) {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@', $pass);

        if(!$uppercase || !$lowercase || !$number || strlen($pass) < 8) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
?>