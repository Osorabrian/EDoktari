<?php

    // Don't display server errors 
    ini_set("display_errors", "off");

    $dbservername="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="edoktari";
    $conn=mysqli_connect($dbservername,$dbuser,$dbpass,$dbname);

    // Destroy if not possible to create a connection
    if(!$conn){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
    }

    // Get data to display on index page
    $sql = "SELECT * FROM blog";
    $query = mysqli_query($conn, $sql);

    // Create a new post
    if(isset($_REQUEST['new_post'])){
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];
        $image = $_REQUEST['image'];

        $sql = "INSERT INTO blog(title, content, img_dir) VALUES('$title', '$content', '$image')";
        mysqli_query($conn, $sql);

        echo $sql;

        header("Location: index.php?info=added");
        exit();
    }

    // Get post data based on id
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM blog WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }

    // Delete a post
    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM blog WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: index.php");
        exit();
    }

    // Update a post
    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];
        $image = $_REQUEST['image'];

        $sql = "UPDATE blog SET title = '$title', content = '$content', img_dir = '$image' WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: index.php");
        exit();
    }

?>