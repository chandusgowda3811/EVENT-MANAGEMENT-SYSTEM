<?php

function validatecatering($input_method, &$formdata, &$errors) {
    $formdata['cname'] = filter_input($input_method, "cname", FILTER_SANITIZE_STRING);
    $formdata['contact'] = filter_input($input_method, "contact", FILTER_SANITIZE_STRING);
    $formdata['days'] = filter_input($input_method, "days", FILTER_SANITIZE_STRING);
    


    if ($formdata['cname'] === NULL ||
                    $formdata['cname'] === FALSE ||
                    $formdata['cname'] === "")
    {
        $errors['cname'] = "name required";
    }
    
    if ($formdata['contact'] === NULL ||
                    $formdata['contact'] === FALSE ||
                    $formdata['contact'] === "")
    {
        $errors['contact'] = "contact required";
    }   
    
    if ($formdata['days'] === NULL ||
                    $formdata['days'] === FALSE ||
                    $formdata['days'] === "")
    {
        $errors['days'] = "number of days need to be specified ";
    }
    
    
    
}
    
   
    
    
    

