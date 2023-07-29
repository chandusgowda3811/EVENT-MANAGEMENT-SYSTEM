<?php
require_once 'utils/functions.php';
require_once 'classes/User.php';
require_once 'classes/catering.php';
require_once 'classes/cateringtablegateway.php';
require_once 'classes/Connection.php';

$connection = Connection::getInstance();
$gateway = new cateringtablegateway($connection);

$statement = $gateway->getcatering();

start_session();

if (!is_logged_in()) {
    header("Location: login_form.php");
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class = "content">
            <div class = "container">
                <?php 
                if (isset($message)) {
                    echo '<p>'.$message.'</p>';
                }
                ?>
                <table class ="table table-hover">
                    <thead>
                        <tr>
                           
                            <th>catering ID</th>
                            <th>cname</th>
                            <th>contact</th>                    
                            <th>days</th>
                        
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['cid'] . '</td>';
                            echo '<td>' . $row['cname'] . '</td>';
                            echo '<td>' . $row['contact'] . '</td>';                    
                            echo '<td>' . $row['days'] . '</td>';
                          
                            echo '<td>'
                            . '<a href="viewcatering.php?id='.$row['cid'].'">View</a> '
                            . '<a href="editcateringform.php?id='.$row['cid'].'">Edit</a> '
                            . '<a class="delete" href="deletecatering.php?id='.$row['cid'].'">Delete</a> '
                            . '</td>';
                            echo '</tr>';  

                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-default" href="createcateringform.php">Create catering</a>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
