<?php
header('Content-Type: text/html; charset=utf-8');header('Content-Type: text/html; charset=utf-8');
/*
 * PHP PCRE - How to validate complex passwords using regular expressions
 * Script base: https://gist.github.com/danielpereirabp/4b37984360e6dae5ec6a
 * From: danielpereirabp on github
 */

function passwordIsStrong($string) {
    if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $string))
        return false;

    return true;
}

$password = isset($_POST['senha']) ? trim($_POST['senha']) : '';

echo json_encode(passwordIsStrong($password));
/*
    Explaining $\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$
    $ = beginning of string
    \S* = any set of characters
    (?=\S{8,}) = of at least length 8
    (?=\S*[a-z]) = containing at least one lowercase letter
    (?=\S*[A-Z]) = and at least one uppercase letter
    (?=\S*[\d]) = and at least one number
    (?=\S*[\W]) = and at least a special character (non-word characters)
    $ = end of the string
 */
