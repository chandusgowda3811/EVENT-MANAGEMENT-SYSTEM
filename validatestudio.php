<?php

function validatestudio($input_method, &$formdata, &$errors) {
    $formdata['sname'] = filter_input($input_method, "sname", FILTER_SANITIZE_STRING);
    $formdata['Phone'] = filter_input($input_method, "Phone", FILTER_SANITIZE_STRING);
  

    if ($formdata['sname'] === NULL ||
                    $formdata['sname'] === FALSE ||
                    $formdata['sname'] === "")
    {
        $errors['sname'] = "sname required";
    }
    
    if ($formdata['Phone'] === NULL ||
                    $formdata['Phone'] === FALSE ||
                    $formdata['Phone'] === "")
    {
        $errors['Phone'] = "phone  required";
    }   
    
    
}
