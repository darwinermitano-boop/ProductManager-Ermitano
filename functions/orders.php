<?php 

include 'connectdb.php';

function getAllOrders(){

    $conn = Connect();

    $query = "
    SELECT
     customer.cus_code AS id,
     CONCAT(customer.cus_fname, ' ', customer.cus_lname, ' ', customer.cus_initial) AS customer,
     DATE_FORMAT(invoice.inv_date, '%d %M, %Y') AS date,
     invoice.inv_subtotal,
     invoice.inv_tax,
     invoice.inv_total
     FROM invoice
     LEFT JOIN customer
     On invoice.cus_code = customer.cus_code
     ORDER BY customer.cus_code ASC
     ";

    $result= $conn->query($query); //Executes query
    $data = [];

    while($row = $result->fetch_assoc()) {
        $data[]= $row;
    }

    return $data;
}

function deleteOrder($id){
    $conn = Connect();
    $query = "DELETE FROM invoice WHERE inv_number=$id";
    return $conn->query($uqery);
}