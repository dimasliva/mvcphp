<?php
return array(
    // Home
    "" => "home/index",
    // News
    "news" => "news/index",
    "news/([0-9]+)" => "news/view/$1",
    "news/([a-z]+)/([0-9]+)" => "news/view/$1/$2",
    // Products
    "about" => "about/list",
    "about/([0-9]+)" => "about/view/$1",
    // Upload
    "upload/([0-9]+)" => "upload/index",
    "upload/create" => "upload/create",
    "upload/([a-zA-Z]+)" => "upload/error",
);
