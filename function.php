<?php 

function dbconnect()
{
    static $connect = null;

    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'employees');

        if (!$connect) {
            // Arrête le script et affiche une erreur si la connexion échoue
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }

        // Optionnel : définir l'encodage des caractères pour gérer les accents (UTF-8 recommandé)
        mysqli_set_charset($connect, 'utf8mb4');
    }

    return $connect;
}

function get_all_lines($sql){
    $req = mysqli_query(dbconnect(),$sql );
    $result = array();
    while ($line = mysqli_fetch_assoc($req)) {
        $result[] = $line;
    }
    mysqli_free_result($req);
    return $result;
}

function get_one_line($sql){
    $req = mysqli_query(dbconnect(),$sql );
    $result = mysqli_fetch_assoc($req);
    mysqli_free_result($req);
    return $result;
}

function show_dept(){
    $sql = "SELECT dept_no as id , dept_name as nom from departments";
    return get_all_lines($sql);
}

function  show_dept_manager() {
    $sql = "SELECT departments.dept_no as id  , departments.dept_name as nom ,
     employees.last_name , employees.first_name
    from departments 
    join dept_manager on dept_manager.dept_no = departments.dept_no
    join employees on dept_manager.emp_no = employees.emp_no
    where dept_manager.to_date = '9999-01-01'";
    return get_all_lines($sql);
}

function show_dept_manager2($date){
    $sql = "SELECT departments.dept_no as id  , departments.dept_name as nom , employees.last_name
    from departments 
    join dept_manager on dept_manager.dept_no = departments.dept_no
    join employees on dept_manager.emp_no = employees.emp_no 
    where dept_manager.to_date = '%s'";
    $sql = sprintf($sql,$date);
    return get_all_lines($sql);
}
//lien index.php vers employe.php
function lien($id){
    $sql = "SELECT departments.dept_no as id ,
     departments.dept_name as nom,employees.last_name, employees.first_name,
    employees.emp_no as id_emp
    from departments 
    join dept_emp on departments.dept_no = dept_emp.dept_no
    join employees on dept_emp.emp_no = employees.emp_no
    where departments.dept_no = '%s'";
    $sql = sprintf($sql,$id);
    return get_all_lines($sql);
}

function fiche_employee($id){
    $sql = "SELECT employees.emp_no as id, 
    employees.first_name, employees.last_name, employees.hire_date ,
    employees.birth_date,employees.gender,salaries.salary,salaries.from_date,
    salaries.to_date
    
    from employees 
    join salaries on employees.emp_no = salaries.emp_no

    where employees.emp_no = '%s'";
    $sql = sprintf($sql,$id);
    return get_all_lines($sql);
}
function calculer_age($nom){
    $sql = "SELECT TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) as age 
            from employees
            where first_name like  '%s'  or  last_name  like '%s'";
    $search = '%' . $nom . '%';
    $sql = sprintf($sql, $search, $search);
    return get_all_lines($sql);
}

function recherche($dept,$nom,$min_age,$max_age){
    $sql = "SELECT departments.dept_name , employees.first_name, 
    employees.last_name , TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) as age
    from departments 
    join dept_emp on departments.dept_no = dept_emp.dept_no
    join employees on dept_emp.emp_no = employees.emp_no
    where departments.dept_name like '%s' and 
    (employees.first_name like '%s' or employees.last_name like '%s') 
    and TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) >= %s and 
    TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) <= %s limit 20 ";
    $nom_depart = '%' . $dept . '%';
    $nom_emp = '%' . $nom . '%';
    $sql = sprintf($sql,$nom_depart,$nom_emp,$nom_emp,$min_age,$max_age);
    return get_all_lines($sql);
}

function recherche_suivant($dept,$nom,$min_age,$max_age){
    $sql = "SELECT departments.dept_name , employees.first_name, 
    employees.last_name , TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) as age
    from departments 
    join dept_emp on departments.dept_no = dept_emp.dept_no
    join employees on dept_emp.emp_no = employees.emp_no
    where departments.dept_name like '%s' and 
    (employees.first_name like '%s' or employees.last_name like '%s') 
    and TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) >= %s and 
    TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) <= %s limit 20, 10  ";
    $nom_depart = '%' . $dept . '%';
    $nom_emp = '%' . $nom . '%';
    $sql = sprintf($sql,$nom_depart,$nom_emp,$nom_emp,$min_age,$max_age);
    return get_all_lines($sql);
}