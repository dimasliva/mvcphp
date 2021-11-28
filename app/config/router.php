<?php
return array(
    "news" => "news/index",
    "news/([0-9]+)" => "news/view/$1",
    "news/([a-z]+)/([0-9]+)" => "news/view/$1/$2",
    "products" => "product/list",
);
