<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../crud/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>

  .navbar-custom {
      background-color: #003366; /* A darker shade of blue */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: Adds a subtle shadow for depth */
    }

  .dropdown-menu {
    background-color: #003366; /* A darker shade of blue for the dropdown */
    border-color: #003366; /* Optional: Match border with background */
  }

  .dropdown-item {
    color: white; /* Text color inside the dropdown */
  }

  .dropdown-item:hover {
    background-color: #1535ee; /* Slightly lighter blue on hover */
  }

  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: calc(100vh - 60px);
  }

  .logo {
    width: 350px;
    height: 300px;
    margin-bottom: 20px;
  }

  .title {
    font-size: 2em;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .slogan {
    font-style: italic;
    color: #efcc00;
    margin-bottom: 20px;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-2">
    <a class="navbar-brand ps-2" href="#">
        <img src="src/Nbsc_logo-removebg-preview.png" style="height: 0.3in;">
        NBSC HOS
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="true">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
                <a class="nav-link" href="nurse/medical_record.php">Health Profile</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="add_medical_info.php">Medical</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="add_dental_info.php">Dental</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Panel</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="add_medical_info.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <img src="src/Nbsc_logo-removebg-preview.png" alt="Logo" class="logo">
    <div class="title">NORTHERN BUKIDNON STATE COLLEGE</div>
    <div class="slogan">Creando Futura, Transformationis Vitae, Ductae a Deo</div>
</div>

</body>
</html>
