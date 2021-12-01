<?php

function escape(String $string) : String {
    $escaped_string = htmlspecialchars($string, ENT_HTML5, 'UTF-8');
    return $escaped_string;
}
