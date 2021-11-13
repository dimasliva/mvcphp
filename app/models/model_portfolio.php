<?php

class Model_Portfolio
{
    function get_data()
    {
        return array(
            array(
                "year" => '2019',
                "Site" => 'localhost/main',
                "Description" => "Super description number one"
            ),
            array(
                "year" => '2020',
                "Site" => 'localhost/portfolio',
                "Description" => "Super description number two"
            ),
        );
    }
}
