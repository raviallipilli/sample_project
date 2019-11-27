<?php

class manufacturer
{

    // database connection and table name
    private $connection;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // list of manufacturer's
    function manufacturerList(){
        $connection = mysqli_connect('localhost', 'root', '','my_db');
        // Check connection
        if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
        }
        else {
            // list of manufacturer before search
            if (!isset($_POST['submit'])){
                $sql = "SELECT id, name, image
                FROM manufacturer ORDER BY id DESC";
                $result = $connection->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table class='table table-hover' id='manufacturer'><tbody><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Image</th><th scope='col'>Action</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td><a href=\"/sample_project/dashboard/manufacturer/viewManufacturer.php?id=".$row["id"]."\" target='_blank'>".$row["id"]."</a></td><td>".$row["name"]." </td><td>".$row["image"]."</td>
                        <td>
                        <button style='width:-webkit-fill-available;' type='button' class='btn btn-primary' onClick=\"document.location.href='/sample_project/dashboard/manufacturer/editManufacturerPage.php?id=".$row["id"]."';\">Edit</button>
                        <button style='width:-webkit-fill-available;' type='button' class='btn btn-danger' onClick=\"document.location.href='/sample_project/dashboard/manufacturer/deleteManufacturer.php?id=".$row["id"]."';\">Delete</button>
                        </td>
                        </tr>";
                    }
                    echo "</tbody></table>";
                } 
                else {
                        echo "0 results";
                    }
                }
            // list of manufacturer's on search
            else{
                $search_value = mysqli_real_escape_string($connection, $_POST['search']);
                $search="SELECT * FROM manufacturer where id LIKE '%$search_value%'
                OR name LIKE '%$search_value%'
                ORDER BY id DESC";
                $search_value = htmlspecialchars(strip_tags($search_value));
                $stmt = $this->connection->prepare($search_value);
                $stmt->bindParam(":search", $search_value);
                $result = $stmt->execute();
                $result=$connection->query($search);
                if ($result->num_rows > 0) {
                    echo "<table class='table table-hover' id='manufacturer'><tbody><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Image</th><th scope='col'>Action</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td><a href=\"/sample_project/dashboard/manufacturer/viewManufacturer.php?id=".$row["id"]."\" target='_blank'>".$row["id"]."</a></td><td>".$row["name"]." </td><td>".$row["image"]."</td>
                        <td>
                        <button style='width:-webkit-fill-available;' type='button' class='btn btn-primary' onClick=\"document.location.href='/sample_project/dashboard/manufacturer/editManufacturerPage.php?id=".$row["id"]."';\">Edit</button>
                        <button style='width:-webkit-fill-available;' type='button' class='btn btn-danger' onClick=\"document.location.href='/sample_project/dashboard/manufacturer/deleteManufacturer.php?id=".$row["id"]."';\">Delete</button>
                        </td>
                        </tr>";
                    }
                    echo "</tbody></table>";
                } 
                else {
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

    // add manufacturer
    function addManufacturer()
    {
        if (!empty($_POST['name']) 
            && !empty($_FILES["image"]["name"])) {
            if(isset($_POST['submit'])){
            $connection = mysqli_connect('localhost', 'root', '','my_db');
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $image = $_FILES["image"]["name"];
            $temp_image =  $_FILES["image"]["tmp_name"];
            $date_created=date('Y-m-d H:i:s');

            if(!$connection){
            die("Database connection failed");
            }
            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] ."/tmp/" . $_FILES["image"]["name"]);
           
            $query = "INSERT INTO manufacturer (name,image,date_created)
            VALUES ('".$name."', '".$image."','$date_created')";
            $name = htmlspecialchars(strip_tags($name));
            $image = htmlspecialchars(strip_tags($image));
            $date_created = htmlspecialchars(strip_tags($date_created));

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":image", $image);
            $stmt->bindParam(":date_created", $date_created);

            $result = $stmt->execute();
          
            // execute query
            if ($result === true) {
                // set response code - 201 created
            // http_response_code(200);
            $msg = 'Created Successfully';
            header('Location: /sample_project/dashboard/manufacturer/manufacturerList.php?msg='.$msg);
            exit;
            } 
            else {
            return false;
            }
        $connection->close();
        }
        }else {
            if(isset($_POST['submit'])){

            echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
            echo "<div id=\"text\"style='color:red;'><b>Name or image field is empty</b></div>
            "; // success message
            echo "<script type='text/javascript'>";
            echo "$(function(){";
            echo "$('#text').fadeOut(5000);";  
            echo "});";
            echo "</script>";
            }
        }
    }
    
    // update manufacturer
    function updateManufacturer(){
        if(isset($_POST['name'])
            && isset($_FILES["image"]["name"])){
            $id=$_GET['id'];
            $name=$_POST['name'];
            $image = $_FILES["image"]["name"];
            $temp_image =  $_FILES["image"]["tmp_name"];
            $date_updated=date('Y-m-d H:i:s');

            move_uploaded_file($temp_image, $_SERVER['DOCUMENT_ROOT'] ."/tmp/" . $image);
            $connection = mysqli_connect('localhost', 'root', '','my_db');
            if ((!($_FILES['image']['name']))) {
            $update="UPDATE manufacturer SET 
            `name`='".$name."',
            `date_updated`='$date_updated'
            WHERE `id`='".$id."';";
            }
            else {
            $update="UPDATE manufacturer SET 
            `name`='".$name."',
            `image`='".$image."',
            `date_updated`='$date_updated'
            WHERE `id`='".$id."';";
            }
            $name = htmlspecialchars(strip_tags($name));
            $image = htmlspecialchars(strip_tags($image));
            $date_updated = htmlspecialchars(strip_tags($date_updated));

            $stmt = $this->connection->prepare($update);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":image", $image);
            $stmt->bindParam(":date_updated", $date_updated);

            $result = $stmt->execute();

            if ($result===true) 
            {
            $msg = 'Updated Successfully';
            header('Location: /sample_project/dashboard/manufacturer/manufacturerList.php?msg='.$msg);
            exit;
            }
            else {
            return false;
            }
        $connection->close();
        }
    }
    
    // delete manufacturer
    function deleteManufacturer(){
        $id=$_GET['id'];
        $connection = mysqli_connect('localhost', 'root', '','my_db');
        $sql = "DELETE FROM manufacturer WHERE id=".$_GET['id'];
        if(mysqli_query($connection, $sql)){
        $msg = 'Deleted Successfully';
        header('Location: /sample_project/dashboard/manufacturer/manufacturerList.php?msg='.$msg);
        exit;
        }
        mysqli_close($connection);
    }

    // search manufacturer
    function searchManufacturer(){
        if(isset($_POST['submit'])){
            $search_value=$_POST["search"];
            $connection = mysqli_connect('localhost', 'root', '','my_db');
            if($connection->connect_error){
            echo 'Connection Faild: '.$connection->connect_error;
            }else{
            $search_value = mysqli_real_escape_string($connection, $_POST['search']);
            $search="SELECT * FROM manufacturer where id LIKE '%$search_value%'
            OR name LIKE '%$search_value%'
            ORDER BY id DESC";
            $search_value = htmlspecialchars(strip_tags($search_value));
            $stmt = $this->connection->prepare($search_value);
            $stmt->bindParam(":search", $search_value);
            $result = $stmt->execute();
            $result=$connection->query($search);
            if ($result->num_rows > 0) {
                echo "<table id='manufacturer'><tbody><tr><th>ID</th><th>Name</th><th>Image</th><th>Action</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<tr><td><a href=\"/sample_project/dashboard/manufacturer/viewManufacturer.php?id=".$row["id"]."\" target='_blank'>".$row["id"]."</a></td><td>".$row["name"]." </td><td>".$row["image"]."</td>
                <td>
                <button type='button' class='block' onClick=\"document.location.href='/sample_project/dashboard/manufacturer/editManufacturerPage.php?id=".$row["id"]."';\">Edit</button>
                <button type='button' class='block' onClick=\"document.location.href='/sample_project/dashboard/manufacturer/deleteManufacturer.php?id=".$row["id"]."';\">Delete</button>
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
                $connection->close();    
            }
        }   
    }
}