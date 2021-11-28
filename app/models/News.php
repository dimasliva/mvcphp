<?php
class News
{
    public static function getNews()
    {
        $db = Db::getConnection();

        $sql = 'SELECT * from news ORDER BY date DESC LIMIT 10';
        $result = $db->query($sql);

        $newsList = array();

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['image'] = $row['image'];
            $i++;
        }
        return $newsList;
    }

    public static function getNewsItemById($id)
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $sql = 'SELECT * from news WHERE id=' . $id;
            $result = $db->query($sql);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();
            return $newsItem;
        }
    }
}
