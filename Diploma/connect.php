<?php
    function getFilms($limit, $active = 1) {
        $films = [];
        $conn = new mysqli ('localhost', 'root', '', 'pagesdb');
        $result = $conn->query("SELECT * FROM `films` WHERE active = ".$active." ORDER BY `id` LIMIT ".$limit);
        while ($row = $result->fetch_array())
        {
            $films[] = $row;
        }
        return $films;
    }

    function getAllFilms($genres = null, $year = null, $countries = null) {
        $films = [];
        $conn = new mysqli ('localhost', 'root', '', 'pagesdb');
        $sql = "SELECT * FROM `films` WHERE `id` > 0 ";
        if ($genres != null){
            $sql .= "AND ( `genre` like '%".$genres[0]."%' ";
            for ($i = 1; $i < count($genres); $i++){
                $sql .= "OR `genre` like '%".$genres[$i]."%' ";
            }
            $sql .= ") ";
        }
        if ($countries != null){
            $sql .= "AND ( `country` like '%".$countries[0]."%' ";
            for ($i = 1; $i < count($countries); $i++){
                $sql .= "OR `country` like '%".$countries[$i]."%' ";
            }
            $sql .= ") ";
        }
        if ($year != null && $year != "усі"){
            $sql .= "AND `year` = '".$year."'";
        }
        $result = $conn->query($sql);
        while ($row = $result->fetch_array())
        {
            $films[] = $row;
        }
        return $films;
    }

    function getFilmInfo ($film_id) {
        $films = [];
        $conn = new mysqli ('localhost', 'root', '', 'pagesdb');
        $result = $conn->query("SELECT * FROM `films` WHERE `id` = $film_id");
        return $result->fetch_array();
    }

    function resultToArray ($result) {
        $array = array ();
        while(($row = $result->fetch_assoc()) != false)
            $array = $row;
        return $array;
    }
?>