<?php
    require('../model/database.php');
    require('../model/types_db.php');
    require('../model/vehicles_db.php');
    require('../model/classes_db.php');
   
   $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'show_inventory';
        }
    }

  if ($action == 'show_inventory') {
        //pull data for variables
        if(isset($_GET['make_id'])){
        $make_id = $_GET['make_id'];}
        if(isset($_GET['type_id'])){
        $type_id = $_GET['type_id'];}
        if(isset($_GET['class_id'])){
        $class_id = $_GET['class_id'];}
        //get sort variables
        if(isset($_GET['sort'])){
        $sort = $_GET['sort'];};
        // call function to populate dropdowns
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        //no criteria message
        // $message = no_search();
        //call functions to populate inventory table
        $dvehicles = default_list();
        $avehicles = display_all();
        $mvehicles = get_inventory_by_make();
        $tvehicles = get_inventory_by_type();
        $cvehicles = get_inventory_by_class(); 
        include_once('../view/inventory_list.php'); 

        
  }
        ?>
