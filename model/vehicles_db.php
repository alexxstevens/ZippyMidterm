

<?php
// dropdown display
    function get_makes() {
        global $db;
        $query_ = 'SELECT make FROM vehicles GROUP BY make ORDER BY product_id';
        $statement = $db->prepare($query_);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    //display inventory
    function get_inventory_by_make() {
        global $db;
        global $make;
        global $type_id;
        global $make_id;
        global $class_id;
        global $price_sort;
        global $year_sort;
        if ($type_id == FALSE && $make_id == FALSE && $class_id == FALSE && $price_sort == TRUE) {
            $query = 
            'SELECT 
            V.year
            , V.make
            , V.model
            , V.price 
            ,T.type_name
            ,C.class_name
            FROM vehicles V 
            LEFT JOIN types T ON V.type_code = T.type_code 
            LEFT JOIN classes C ON V.class_code = C.class_code ORDER BY V.price';
            $statement = $db->prepare($query);
            $statement->execute();
            $mvehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $mvehicles; 
        } else if ($type_id == FALSE && $make_id == FALSE && $class_id == FALSE && $year_sort == FALSE) {
            $query = 
            'SELECT 
            V.year
            , V.make
            , V.model
            , V.price 
            ,T.type_name
            ,C.class_name
            FROM vehicles V 
            LEFT JOIN types T ON V.type_code = T.type_code 
            LEFT JOIN classes C ON V.class_code = C.class_code ORDER BY V.year';
            $statement = $db->prepare($query);
            $statement->execute();
            $mvehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $mvehicles; 
        } else if ($type_id == FALSE && $make_id == FALSE && $class_id == FALSE) {
            $query = 
            'SELECT 
            V.year
            , V.make
            , V.model
            , V.price 
            ,T.type_name
            ,C.class_name
            FROM vehicles V 
            LEFT JOIN types T ON V.type_code = T.type_code 
            LEFT JOIN classes C ON V.class_code = C.class_code';
            $statement = $db->prepare($query);
            $statement->execute();
            $mvehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $mvehicles; 
        } else {
            $query = 'SELECT 
            V.year
            , V.make
            , V.model
            , V.price 
            ,T.type_name
            ,C.class_name
            FROM vehicles V 
            LEFT JOIN types T ON V.type_code = T.type_code 
            LEFT JOIN classes C ON V.class_code = C.class_code 
            WHERE V.make = :make_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':make_id', $make_id);
            $statement->execute();
            $mvehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $mvehicles; 
        }
        }
    
       ?>