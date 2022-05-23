<?php

require_once('Db.php');

class Product
{
    // Exact search for products by part of the word
    public function getProductsByPartofWord( string $data ): array {
        $connect = Db::getConnection();
        $query = $connect->query("SELECT name, price, photo_path, description, link FROM products_v2 WHERE quantity != 0 AND quantity != 9999 AND quantity != '' AND name LIKE concat('%', '$data', '%') ORDER BY name LIKE concat('$data', '%') DESC,
        ifnull(nullif(instr(name, concat(' ', '$data')), 0), 99999), ifnull(nullif(instr(name, '$data'), 0), 99999), name ASC LIMIT 7");
        $products = $query->fetchAll();
        return $products;
    }
}

?>
