<?php
   session_start();
   $link = mysqli_connect("localhost","root","","student_portal");
   if (mysqli_connect_error())
     {
       echo "Failed to connect to MySQL: ". mysqli_connect_error();
     }
   if(isset($_POST['submit']))
    {
      $branch= $_POST['branch'];
      $class= $_POST['class'];
      $semester=$_POST['semester'];

      if ($branch=="" || $class==""|| $semester=="")
      {
        echo " <script>alert('Please enter both the details before Proceeding !!');</script>";
      }

      else
       {
         $query = "SELECT * from student where branch='$branch' and class='$class' and semester='$semester';";
         $result = mysqli_query($link, $query);
         if(!$result)
           {
             echo "<script>alert('There has been an error please try again later !!);</script>";
             die();
           }
         if(mysqli_num_rows($result) > 0)
           {
             $_SESSION['branch']=$branch;
             $_SESSION['class']=$class;
             $_SESSION['semester']=$semester;

             header("location:http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/Student%20List/student_list%20_display.php");
             exit();
           }
         else
           {
             echo "<script>alert('Invalid Branch and Class Combo !!');</script>";
           }
       }
     }

 ?>
<html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <link rel="stylesheet" href="bootstrap.min.css">
      <link rel="stylesheet" href="dashboard.css">
    <head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <img src="1200px-BMS_College_of_Engineering.svg.png" height="50" width="3.75%" alt="">
    &nbsp&nbsp&nbsp<h5><a  style="color: White"> BMCSE</a></h5></a>
      <ul class="navbar-nav mr-auto">
      </ul>
        <form class="form-inline my-2 my-lg-0">
          <a href="http://localhost/project/Front_End/Logout/logout.php" class="btn btn-primary my-2"><strong>LOG out</strong></a>
        </form>
  </nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/teachers_dashboard.php">
              <span data-feather="file"></span>
              <h5> <strong>Dashboard</strong> </h5>
            </a>
          </li>
        </ul>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <br>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong>Studet List</strong></h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              </div>
          </div>
      </div>
      <form method="post">
          <div class="form-group">
            <select class="form-control form-control-lg" id="tg1" name="branch" placeholder="Select">
              <option value="">Choose Branch...</option>
              <option value="CSE">Computer Science Engineering</option>
              <option value="ECE">Electronics and Communication Engineering</option>
              <option value="EEE">Electrical engineering</option>
              <option value="ME">Mechanical Engineering</option>
              <option value="CV">Civil Engineering</option>
              <option value="AE">Aeronautical Engineering</option>
              <option value="AGE">Agricultural engineering</option>
            </select>
          </div>
          <div class="form-group">
              <select class="form-control form-control-lg" id="tg1" name="class" placeholder="Select">
                <option value="">Choose Class...</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
              </select>
          </div>
          <div class="form-group">
                <select class="form-control form-control-lg" id="tg1" name="semester" placeholder="Select">
                    <option value="">Choose Semester...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
          <button type="submit" class="btn btn-success btn-lg" name="submit">Show List</button>
      </form>
    </main>
  </div>
</div>
</body>
</html>
