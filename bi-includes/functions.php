<?php
if (!isset($_SESSION)) session_start();

/** CHECK USER IS ADMIN */
if (!function_exists('is_current_user_admin')) {
    function is_current_user_admin()
    {
        if (isset($_SESSION["user_role"]) && base64_decode($_SESSION["user_role"]) / 1368546448245512 == 0)
            return true;
        return false;
    }
}

/** CHECK USER IS PROFESSOR */
if (!function_exists('is_current_user_professor')) {
    function is_current_user_professor()
    {
        if (isset($_SESSION["user_role"]) && base64_decode($_SESSION["user_role"]) / 1368546448245512 == 1)
            return true;
        return false;
    }
}

/** CHECK USER IS STUDENT */
if (!function_exists('is_current_user_student')) {
    function is_current_user_student()
    {
        if (isset($_SESSION["user_role"]) && base64_decode($_SESSION["user_role"]) / 1368546448245512 == 2)
            return true;
        return false;
    }
}

/** CHECK USER IS STUDENT */
if (!function_exists('is_user_logged_in')) {
    function is_user_logged_in()
    {
        if (isset($_SESSION["user_role"]) && !empty($_SESSION["user_role"])) {
            $role = base64_decode($_SESSION["user_role"]) / 1368546448245512;
            if ($role == 0 || $role == 1 || $role == 2)
                return true;
        }
        return false;
    }
}

/** GET CURRENT USER DISPLAY NAME */
if (!function_exists('current_user_display')) {
    function current_user_display()
    {
        if (isset($_SESSION["user_role"]) && !empty($_SESSION["user_role"])) {
            return $_SESSION["user_display_name"];
        }
        return false;
    }
}

/** FORMAT PRICE */
if (!function_exists('price_format')) {
    function price_format($number)
    {
        return number_format($number, 0, '', '.') . " <span class='smaller'>vnđ</span>";
    }
}