<?php

function validateEvents($input_method, &$formdata, &$errors) {
    $formdata['Title'] = filter_input($input_method, "Title", FILTER_SANITIZE_STRING);
    $formdata['Description'] = filter_input($input_method, "Description", FILTER_SANITIZE_STRING);
    $formdata['StartDate'] = filter_input($input_method, "StartDate", FILTER_SANITIZE_STRING);
    $formdata['EndDate'] = filter_input($input_method, "EndDate", FILTER_SANITIZE_STRING);
    $formdata['Cost'] = filter_input($input_method, "Cost", FILTER_SANITIZE_NUMBER_INT);
    $formdata['Advance'] = filter_input($input_method, "Advance", FILTER_SANITIZE_NUMBER_INT);
    $formdata['Remaining'] = filter_input($input_method, "Remaining", FILTER_SANITIZE_NUMBER_INT);
    $formdata['LocID'] = filter_input($input_method, "LocID", FILTER_SANITIZE_NUMBER_INT);
    $formdata['cid'] = filter_input($input_method, "cid", FILTER_SANITIZE_NUMBER_INT);
    $formdata['stid'] = filter_input($input_method, "stid", FILTER_SANITIZE_NUMBER_INT);

    if ($formdata['Title'] === NULL ||
                    $formdata['Title'] === FALSE ||
                    $formdata['Title'] === "")
    {
        $errors['Title'] = "Title required";
    }
    
    if ($formdata['Description'] === NULL ||
                    $formdata['Description'] === FALSE ||
                    $formdata['Description'] === "")
    {
        $errors['Description'] = "Description required";
    }   
    
    if ($formdata['StartDate'] === NULL ||
                    $formdata['StartDate'] === FALSE ||
                    $formdata['StartDate'] === "")
    {
        $errors['StartDate'] = "Start Date  required";
    }
    
    if ($formdata['EndDate'] === NULL ||
                    $formdata['EndDate'] === FALSE ||
                    $formdata['EndDate'] === "")
    {
        $errors['EndDate'] = "End Date required";
    }
    
    if ($formdata['Cost'] === ""){
        $capacity = intval($formdata['Cost']);
        if ($capacity < 0 || $capacity > 999999) {
    }
        $errors['Cost'] = "Cost required. Cannot be a negative value";
    }
    
    if ($formdata['Advance'] === ""){
        $capacity = intval($formdata['Advance']);
        if ($capacity < 0 || $capacity <= "cost") {
    }
    
        $errors['Advance'] = "Advance Required and it must be lesser than cost or equal";
    }
    
    if ($formdata['Remaining'] === ""){
        $capacity = intval($formdata['Remaining']);
        if ($capacity < 0 || $capacity <= 999999) {
    }
        $errors['Remaining'] = "";
    }
    
    if ($formdata['LocID'] === ""){
        $locID = intval($formdata['LocID']);
        if ($locID < 0 || $capacity > 999999) {
    }
        $errors['LocID'] = "LocationID required. Cannot be a negative value";
    }
    if ($formdata['cid'] === ""){
        $cid = intval($formdata['cid']);
        if ($cid < 0 || $capacity > 999999) {
    }
        $errors['cid'] = "cid required. Cannot be a negative value";
    }
    if ($formdata['stid'] === ""){
        $stid = intval($formdata['stid']);
        if ($stid < 0 || $capacity > 999999) {
    }
        $errors['stid'] = "studio id required. Cannot be a negative value";
    }
   
    
}
