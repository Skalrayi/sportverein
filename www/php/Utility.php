<?php
class Utility {
    static function redirect($location) {
        header('Location: ' . $location);
        exit();
    }

    static function calculateLastPage(int $amountOfDbResults, int $amountPerPage): int {
        return ceil($amountOfDbResults / $amountPerPage);
    }

    public static function buildEditLink(int $id) {
        $params = [];

        // wenn die page gesetzt ist, nehmen wir sie wieder mit in die URL
        if (isset($_GET['page'])) {
            $params['page'] = $_GET['page'];
        }

        // id des users
        $params['edit'] = $id;

        // query wird anhand des param arrays gebaut
        $query = http_build_query($params);

        return '/php/list.php?' . $query;
    }
}