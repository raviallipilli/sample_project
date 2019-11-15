<?php

class company
{

    // database connection and table name
    private $connection;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // list of companies
    function companyList() {
        $connection = mysqli_connect('localhost', 'root', '','my_db');
        if($connection->connect_error){
        echo 'Connection Faild: '.$connection->connect_error;
        }else{
        //search companies if submitted
        if(!isset($_POST['submit'])){
            $sel_query = "SELECT id, name, CONCAT(address1, ',', address2, ',', address3, ',' ,city , ',' , postcode , ',', country) AS address
            FROM companies ORDER BY id DESC";
            $result = $connection->query($sel_query);
                if ($result->num_rows > 0) {
                    echo "<table id='companies'><tbody><tr><th>ID</th><th>Name</th><th>Address</th><th>Action</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<tr><td><a href=\"/sample_project/dashboard/companies/viewCompany.php?id=".$row["id"]."\" target='_blank'>".$row["id"]."</a></td><td>".$row["name"]." </td><td>".$row["address"]."</td>
                    <td>
                    <button type='button' class='block' onClick=\"document.location.href='/sample_project/dashboard/companies/editCompanyPage.php?id=".$row["id"]."';\">Edit</button>
                    <button type='button' class='block' onClick=\"document.location.href='/sample_project/dashboard/companies/deleteCompany.php?id=".$row["id"]."';\">Delete</button>
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
            $search="SELECT * FROM companies where id LIKE '%$search_value%'
            OR name LIKE '%$search_value%'
            OR address1 LIKE '%$search_value%'
            OR address2 LIKE '%$search_value%'
            OR address3 LIKE '%$search_value%'
            OR city LIKE '%$search_value%'
            OR postcode LIKE '%$search_value%'
            OR country LIKE '%$search_value%'
            ORDER BY id DESC";
            $search_value = htmlspecialchars(strip_tags($search_value));
            $stmt = $this->connection->prepare($search_value);
            $stmt->bindParam(":search", $search_value);
            $result = $stmt->execute();
            $result=$connection->query($search);
            if ($result->num_rows > 0) {
                echo "<table id='companies'><tbody><tr><th>ID</th><th>Name</th><th>Address</th><th>Action</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $address=$row["address1"].",". $address=$row["address2"].",".$row["address3"].",". $address=$row["city"].",".$row["postcode"].",". $row["country"];
    
                echo "<tr><td><a href=\"/sample_project/dashboard/companies/viewCompany.php?id=".$row["id"]."\" target='_blank'>".$row["id"]."</a></td><td>".$row["name"]." </td><td>".$address."</td>
                <td>
                <button type='button' class='block' onClick=\"document.location.href='/sample_project/dashboard/companies/editCompanyPage.php?id=".$row["id"]."';\">Edit</button>
                <button type='button' class='block' onClick=\"document.location.href='/sample_project/dashboard/companies/deleteCompany.php?id=".$row["id"]."';\">Delete</button>
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

     // add company
     function addCompany()
     {
         if (!empty($_POST['name']) 
             && !empty($_POST['address1'])
             && !empty($_POST['address2'])
             && !empty($_POST['address3'])
             && !empty($_POST['city'])
             && !empty($_POST['postcode'])
             && !empty($_POST['country'])) {
             if(isset($_POST['submit'])){
                 $connection = mysqli_connect('localhost', 'root', '','my_db');
                 $name = mysqli_real_escape_string($connection, $_POST['name']);
                 $address1 = mysqli_real_escape_string($connection, $_POST['address1']);
                 $address2 = mysqli_real_escape_string($connection, $_POST['address2']);
                 $address3 = mysqli_real_escape_string($connection, $_POST['address3']);
                 $city = mysqli_real_escape_string($connection, $_POST['city']);
                 $postcode = mysqli_real_escape_string($connection, $_POST['postcode']);
                 $country = mysqli_real_escape_string($connection, $_POST['country']);
                 $date_created=date('Y-m-d H:i:s');
 
                 if(!$connection){
                 die("Database connection failed");
                 }
                 $query = "INSERT INTO companies (name,address1,address2,address3,city,postcode,country,date_created)
                 VALUES ('".$name."', '".$address1."','".$address2."','".$address3."','".$city."','".$postcode."','".$country."','$date_created')";
                 $name = htmlspecialchars(strip_tags($name));
                 $address1 = htmlspecialchars(strip_tags($address1));
                 $address2 = htmlspecialchars(strip_tags($address2));
                 $address3 = htmlspecialchars(strip_tags($address3));
                 $city = htmlspecialchars(strip_tags($city));
                 $postcode = htmlspecialchars(strip_tags($postcode));
                 $country = htmlspecialchars(strip_tags($country));
                 $date_created = htmlspecialchars(strip_tags($date_created));
                 $stmt = $this->connection->prepare($query);
 
                 $stmt->bindParam(":name", $name);
                 $stmt->bindParam(":address1", $address1);
                 $stmt->bindParam(":address2", $address2);
                 $stmt->bindParam(":address3", $address3);
                 $stmt->bindParam(":city", $city);
                 $stmt->bindParam(":postcode", $postcode);
                 $stmt->bindParam(":country", $country);
                 $stmt->bindParam(":date_created", $date_created);
 
                 $result = $stmt->execute();
 
                 // execute query
                 if ($result === true) {
                 // set response code - 201 created
                 //http_response_code(200);
                 $msg = 'Created Successfully';
                 header('Location: /sample_project/dashboard/companies/companyList.php?msg='.$msg);
                 exit;
                 } 
                 else {
                 return false;
                 }
             $connection->close();
             } 
         }
         else {
             if(isset($_POST['submit'])){
             echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
             echo "<div id=\"text\" style='color:red;'><b>All the fields are empty</b></div>
             "; // success message
             echo "<script type='text/javascript'>";
             echo "$(function(){";
             echo "$('#text').fadeOut(5000);";  
             echo "});";
             echo "</script>";
             }
         }
     }

    // update company
    function updateCompany() {
        if(isset($_POST['submit'])){
            $connection = mysqli_connect('localhost', 'root', '','my_db');
            if(!$connection){
            die("Database connection failed");
            }
            $id=$_GET['id'];
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $address1 = mysqli_real_escape_string($connection, $_POST['address1']);
            $address2 = mysqli_real_escape_string($connection, $_POST['address2']);
            $address3 = mysqli_real_escape_string($connection, $_POST['address3']);
            $city = mysqli_real_escape_string($connection, $_POST['city']);
            $postcode = mysqli_real_escape_string($connection, $_POST['postcode']);
            $country = mysqli_real_escape_string($connection, $_POST['country']);
            $date_updated=date('Y-m-d H:i:s');
            
            $update="UPDATE companies SET 
            `name`='".$name."',
            `address1`='".$address1."',
            `address2`='".$address2."',
            `address3`='".$address3."',
            `city`='".$city."',
            `postcode`='".$postcode."',
            `country`='".$country."',
            `date_updated`='$date_updated'                       
            WHERE `id`='".$id."';";
            
            $name = htmlspecialchars(strip_tags($name));
            $address1 = htmlspecialchars(strip_tags($address1));
            $address2 = htmlspecialchars(strip_tags($address2));
            $address3 = htmlspecialchars(strip_tags($address3));
            $city = htmlspecialchars(strip_tags($city));
            $postcode = htmlspecialchars(strip_tags($postcode));
            $country = htmlspecialchars(strip_tags($country));
            $date_updated = htmlspecialchars(strip_tags($date_updated));
           
            $stmt = $this->connection->prepare($update);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":address1", $address1);
            $stmt->bindParam(":address2", $address2);
            $stmt->bindParam(":address3", $address3);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":postcode", $postcode);
            $stmt->bindParam(":country", $country);
            $stmt->bindParam(":date_updated", $date_updated);
            
            $result = $stmt->execute();
            // execute query
            if ($result === true) {
            $msg = 'Updated Successfully';
            header('Location: /sample_project/dashboard/companies/companyList.php?msg='.$msg);
            exit;
            } 
            else {
            return false;
            }
        $connection->close();
        }
    }

    // delete company
    function deleteCompany(){
        $id=$_GET['id'];
        $connection = mysqli_connect('localhost', 'root', '','my_db');
        $sql = "DELETE FROM companies WHERE id=".$_GET['id'];
        if(mysqli_query($connection, $sql))
        {
        $msg = 'Deleted Successfully';
        header('Location: /sample_project/dashboard/companies/companyList.php?msg='.$msg);
        exit;
        }
        $connection->close();
    } 
}