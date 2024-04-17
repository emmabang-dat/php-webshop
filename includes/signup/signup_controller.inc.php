<?php

declare(strict_types=1);


// FORM VALIDATION

function isInputEmpty(string $email, string $password)
{
    if (empty($email) || empty($password)) {
        return true;
    }
    return false;
}

function isEmailInvalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function isEmailTaken(object $pdo, string $email)
{
    if (getEmail($pdo, $email)) {
        return true;
    }
    return false;
}

function validName(string $name)
{
    if (preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        return true;
    }
    return false;
}

function validPhone(string $phone)
{
    if (preg_match("/^[0-9]{8}$/", $phone)) {
        return true;
    }
    return false;
}

function validAddress(string $address)
{
    if (preg_match("/^[a-zA-Z0-9-,' ]*$/", $address)) {
        return true;
    }
    return false;
}

function createUser(object $pdo, string $email, string $password, string $name, string $phone, string $address)
{
    setUser($pdo, $email, $password, $name, $phone, $address);
}
