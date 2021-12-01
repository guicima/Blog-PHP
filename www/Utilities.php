<?php

function escape(String $string) : String {
    return htmlspecialchars($string, ENT_HTML5, 'UTF-8');
}
