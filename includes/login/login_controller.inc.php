<?php

declare(strict_types=1);



function isEmailWrong(bool|array $result)
{
    if (!$result) {
        return true;
    }
    return false;
}

function isPasswordWrong(string $password)
{
    if (!$password) {
        return true;
    }
    return false;
}

function isInputEmpty(string $email, string $password)
{
    if (empty($email) || empty($password)) {
        return true;
    }
    return false;
}
