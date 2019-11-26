<?php

class permission
{

    // database connection and table name
    private $connection;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // list of permissions
    function permissionList() {
        $connection = mysqli_connect('localhost', 'id11609533_root', 'admin','id11609533_my_db');
        if($connection->connect_error){
        echo 'Connection Faild: '.$connection->connect_error;
        }else{
        //search users permisssions if submitted
        if(!isset($_POST['submit'])){
            $sel_query = "SELECT u.id,u.username, u.email, r.name AS role
            FROM users u 
            INNER JOIN roles r ON u.role_id=r.id 
            ORDER BY u.id DESC";
            $result = $connection->query($sel_query);
                if ($result->num_rows > 0) {
                    echo "<table id='permissions'><tbody><tr><th>Username</th><th>Email</th><th>Role</th><th>Action</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["username"]."</td><td>".$row["email"]." </td><td>".$row["role"]."</td>
                    <td>
                    <button type='button' class='block' onClick=\"document.location.href='/sample_project/dashboard/permissions/editPermissionPage.php?id=".$row["id"]."';\">Allow Permissions</button>
                    </td>
                    </tr>";
                    }
                    echo "</tbody></table>";
                    } else {
                    echo "0 results";
                    }
                }
        // else display list if not submitted
        else {
            $search_value=$_POST["search"];
            $search_value = mysqli_real_escape_string($connection, $_POST['search']);
            $search="SELECT * FROM users u INNER JOIN roles r ON u.role_id=r.id WHERE
            u.username LIKE '%$search_value%'
            OR u.email LIKE '%$search_value%'
            OR r.name LIKE '%$search_value%'
            ORDER BY u.id DESC";
            $search_value = htmlspecialchars(strip_tags($search_value));
            $stmt = $this->connection->prepare($search_value);
            $stmt->bindParam(":search", $search_value);
            $result = $stmt->execute();
            $result=$connection->query($search);
            if ($result->num_rows > 0) {
                echo "<table id='permissions'><tbody><tr><th>Username</th><th>Email</th><th>Role</th><th>Action</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $role=$row["name"];
                echo "<tr><td>".$row["username"]."</td><td>".$row["email"]."</td><td>".$role."</td>
                <td>
                <button type='button' class='block' onClick=\"document.location.href='/sample_project/dashboard/permissions/editPermissionPage.php?id=".$row["id"]."';\">Allow Permissions</button>
                </td>
                </tr>";
                }
                echo "</tbody></table>";
                } else {
                    echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                    echo "<div id=\"text\" style='color:red;'><b>No Records Found</b></div>
                    "; // success message
                    echo "<script type='text/javascript'>";
                    echo "$(function(){";
                    echo "$('#text').fadeOut(50000);";  
                    echo "});";
                    echo "</script>";
                }
            }   
        $connection->close();
        }
    }

    // update permission
    function updatePermission() {
        if(isset($_POST['submit'])){
            $connection = mysqli_connect('localhost', 'id11609533_root', 'admin','id11609533_my_db');
            if(!$connection){
            die("Database connection failed");
            }
            $id=$_GET['id'];
            foreach($_POST['role'] as $key => $value){
            $role=$_POST['role'][$key];
            $date_updated=date('Y-m-d H:i:s');
            if ($role=="Admin"){
            $update="UPDATE users u 
            INNER JOIN roles r ON u.role_id = r.id SET 
            u.role_id = 1,
            u.timestamp = '$date_updated'                       
            WHERE u.id='".$id."';";
            }
            else if ($role=="Manager"){
                $update="UPDATE users u 
                INNER JOIN roles r ON u.role_id = r.id SET 
                u.role_id = 2,
                u.timestamp = '$date_updated'                       
                WHERE u.id='".$id."';";
                }
            else {
                $update="UPDATE users u 
                INNER JOIN roles r ON u.role_id = r.id SET 
                u.role_id = 3,
                u.timestamp = '$date_updated'                       
                WHERE u.id='".$id."';";
                }
            $role = htmlspecialchars(strip_tags($role));
            $date_updated = htmlspecialchars(strip_tags($date_updated));
           
            $stmt = $this->connection->prepare($update);

            $stmt->bindParam(":role", $role);
            $stmt->bindParam(":date_updated", $date_updated);
            
            $result = $stmt->execute();
            $result=$connection->query($update);

            // execute query
            if ($result === true) {
            $msg = 'Updated Successfully';
            header('Location: /sample_project/dashboard/permissions/permissionList.php?msg='.$msg);
            exit;
            } 
            else {
                print_r($stmt->errorInfo());
                return false;
            }
        }
        $connection->close();
        }
    }
}