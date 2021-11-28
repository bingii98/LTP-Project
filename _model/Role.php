<?php

abstract class Role
{
    const ADMIN = 0;
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
            return 'ADMIN';
        else if ($i == 1)
            return 'PROFESSOR';
        return 'STUDENT';
    }
}