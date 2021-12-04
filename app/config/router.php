<?php
return array(
    // News
    "news" => "news/index",
    "news/([0-9]+)" => "news/view/$1",
    "news/([a-z]+)/([0-9]+)" => "news/view/$1/$2",
    // Products
    "products" => "product/list",
    "products/([0-9]+)" => "product/view/$1",
    // Upload
    "upload" => "upload/index",
    "upload/([0-9]+)" => "upload/pagination",
    "upload/create" => "upload/create",
);
