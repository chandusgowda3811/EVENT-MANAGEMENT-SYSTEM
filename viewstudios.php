<?php
require_once 'utils/functions.php';
require_once 'classes/User.php';
require_once 'classes/studio.php';
require_once 'classes/studioTableGateway.php';
require_once 'classes/Connection.php';

$connection = Connection::getInstance();
$gateway = new studioTableGateway($connection);

$statement = $gateway->getstudio();

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
                           
                            <th>studio ID</th>
                            <th>Name</th>
                            <th>Phone</th>                    
                         
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['sid'] . '</td>';
                            echo '<td>' . $row['sname'] . '</td>';
                            echo '<td>' . $row['Phone'] . '</td>';                    
                     
                            echo '<td>'
                            . '<a href="viewstudio.php?id='.$row['sid'].'">View</a> '
                            . '<a href="editstudioForm.php?id='.$row['sid'].'">Edit</a> '
                            . '<a class="delete" href="deletestudio.php?id='.$row['sid'].'">Delete</a> '
                            . '</td>';
                            echo '</tr>';  

                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-default" href="createstudioForm.php">Create studio</a>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
