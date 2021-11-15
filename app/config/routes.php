<?php

return array(
    "main" => 'main/index',
    "portfolio" => 'portfolio/list',
    "news/([a-z]+)/([0-9]+)" => 'news/view/$1/$2',
    'news/([0-9]+)' => 'news/view/$1',
    "news" => 'news/index',
    "products" => 'product/list',
);
