<?php
if (!isset($_SESSION)) session_start();

abstract class Role
{
    const Quanr = 0;
    const PROFESSOR = 1;
    const STUDENT = 2;

    public static function setRole($i)
    {
        if ($i == 0)
            return self::ADMIN;
        else if ($i == 1)
            return self::PROFESSOR;
        return self::STUDENT;
    }

    public static function getRole($i)
    {
        if ($i == 0)
            return 'Quản trị viên';
        else if ($i == 1)
            return 'Gia Sư';
        return 'Học Viên';
    }
}