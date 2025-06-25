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
function Formulaire($departements , $current , $ageMin , $ageMax)
{
    $conn = dbconnect();
    $req = "SELECT e.emp_no, e.last_name, e.first_name, d.dept_name FROM employees e JOIN dept_emp de ON e.emp_no = de.emp_no JOIN departments d ON de.dept_no = d.dept_no WHERE de.dept_no = '" . $departements . "' AND e.birth_date BETWEEN DATE_SUB(NOW(), INTERVAL " . (int)$ageMax . " YEAR) AND DATE_SUB(NOW(), INTERVAL " . (int)$ageMin . " YEAR)";
    if ($current !== '') {
        $req .= " AND e.first_name LIKE '%" . $current . "%'";
    }
    $result = mysqli_query($conn, $req);
    $employes = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $employes[] = $row;
    }
    return $employes;

}
function fiche_employe($emp_no) {
    $conn = dbconnect();
    $req = "SELECT e.emp_no, e.last_name, e.first_name, e.birth_date, e.hire_date, d.dept_name FROM employees e JOIN dept_emp de ON e.emp_no = de.emp_no JOIN departments d ON de.dept_no = d.dept_no WHERE e.emp_no = '$emp_no'";
    $result = mysqli_query($conn, $req);
    $formulaire = [];
    if ($row = mysqli_fetch_assoc($result)) {
        $formulaire = $row;
    }
    return $formulaire;
}
function salary_history($emp_no) {
    $conn = dbconnect();
    $req = "SELECT s.salary, s.from_date, s.to_date FROM salaries s WHERE s.emp_no = '$emp_no' ORDER BY s.from_date DESC";
    $result = mysqli_query($conn, $req);
    $salaries = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $salaries[] = $row;
    }
    return $salaries;
}

?>