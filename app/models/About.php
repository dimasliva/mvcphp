<?php
class About
{
    public static function getProducts()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * from news');
        $result->execute();
        $productList = array();
        $i = 1;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['title'] = $row['title'];
            $productList[$i]['date'] = $row['date'];
            $productList[$i]['short_content'] = $row['short_content'];
            $productList[$i]['image'] = $row['image'];
            $i++;
        }
        return $productList;
    }

    public static function getProductById($id)
    {
        $id = intval($id);
        if ($id) {

            $db = Db::getConnection();

            $result = $db->query("SELECT * from news WHERE id=$id");

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $product = $result->fetch();
            return $product;
        }
    }
}
