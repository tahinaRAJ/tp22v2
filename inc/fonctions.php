<?php
require("../inc/connexion.php");

function afficher_departement(){
    $req = "select * from departments";
    $result = mysqli_query(dbconnect(), $req); 

    $departements = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $departements[] = $row;
    }
    return $departements;
}

function afficher_employes_par_departement($dept_no) {
    $conn = dbconnect();
    $req = "SELECT e.emp_no, e.last_name, e.first_name FROM employees e JOIN dept_emp de ON e.emp_no = de.emp_no WHERE de.dept_no = '$dept_no'";
    $result = mysqli_query($conn, $req);
    $employes = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $employes[] = $row;
    }
    return $employes;
}
function afficher_current_manager($current)
{
    $conn = dbconnect();
    $req = "SELECT e.emp_no, e.last_name, e.first_name FROM employees e JOIN dept_manager dm ON e.emp_no = dm.emp_no WHERE dm.to_date >= NOW() AND dm.from_date <= NOW() AND dm.dept_no = '$current'";
    $result = mysqli_query($conn, $req);
    $managers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $managers[] = $row;
    }
    return $managers;
}
?>