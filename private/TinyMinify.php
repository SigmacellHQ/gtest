<?php

// TODO: use namespace:
// namespace Minifier;
// use Minifier\TinyHtmlMinifier;

require $_SERVER["DOCUMENT_ROOT"].'/private/TinyHtmlMinifier.php';

class TinyMinify
{
    public static function html(string $html, array $options = []) : string
    {
        $minifier = new TinyHtmlMinifier($options);
        return $minifier->minify($html);
    }
}