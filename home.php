<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/scp-logo-green.svg" type="image/x-icon">

    <link rel="stylesheet" href="bootstrap-4.1.3/css/bootstrap.min.css">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-landing-page.css" rel="stylesheet"> 

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <title>Home | SigmaCodePro</title>
    <style>
        .navbar-brand-image{
            height: 1.5em;
            padding-right: 0.1em;
            margin: auto;
            padding-bottom: 0.1em;
        }

        h4{
            margin-bottom: 1.3em;
            padding-bottom: 0.5em;
            border-bottom: 1px solid #ccc;
            /* box-shadow: 0 0 2px #ccc,
                        0 0 0px #fff,
                        0 0 0px #fff,
                        0 0 0px #fff; */
        }
        .container-div{
            margin: auto;
            max-width: 80ch;
        }

        .project-buttons{
            margin-top: 5em;
            display: flex;
            flex-direction: row;
            gap: 7em;
            justify-content: center;
        }
        .project-buttons > * > p{
            gap: 0.5em;
            font-size: 1.3em;
            text-align: center;
            font-weight: bold;
        }
        .project-buttons > * > a {
            width: 13em;
            height: 15em;
            background: grey;
            box-shadow: inset 0 0 3em #aaa;
            border-radius: 1.5em;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .project-buttons a > * {
            font-size: 4em;
            color: #333;
        }

        .project-buttons a:hover{
            background: #22b573;
            box-shadow: inset 0 0 2em lightgreen;
        }

        a:hover{
            text-decoration: none;
        }
    </style>
</head>

<body>  
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="home.php" class="navbar-brand"> <img src="images/scp-logo-green.svg" alt="SigmaCodePro" class="navbar-brand-image"> SigmaCodePro</a>
        
        <div class="navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" id="dropDownForLogOut" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1em;">
                        Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropDownForLogOut">
                        <a href="settings.php" class="dropdown-item"> Settings </a>
                        <div class="dropdown-divider"></div>
                        <a href="logoutProcess.php" class="dropdown-item"> Log Out </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar End -->
    
    <div class="container-fluid content">
        <div class="container-div">
            <div class="">
                <h4> Welcome! Open your projects or create a new one. </h4>
            </div>

            <div class="project-buttons">
                <div>
                <a href="" data-toggle="modal" data-target="#myModal" class="create-new">
                    <i class='fas fa-plus-circle'></i>
                </a>
                <p>Create New Project</p>
                </div>
                <div>
                <a href="projects.php" class="recent-projects">
                    <i class='fas fa-folder-open'></i>
                </a>
                <p>Open My Projects</p>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Modal For Updating Preference -->
            
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Create New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="ingredient-id" id="ingredient-id">
                    
                        <div class="form-group" style="margin-bottom: 2rem;">
                            <label for="name" class="col-form-label">Project Name</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Enter project name">
                        </div>

                        <div class="form-group" id="status-div">
                            
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" id="update-stock" class="btn btn-primary" onclick="createProject()">Create</button>
                </div>
            </div>
        </div>
        </div>
        <!-- Modal End -->

    <script src="assets/library/jquery.min.js"></script>
    <script src="bootstrap-4.1.3/js/bootstrap.min.js"></script>

    <script>
        function createProject(){
            let name = document.getElementById('name').value;
            let location_string = 'createProject.php?name=' + name;
            location.assign(location_string);
        }
    </script>
</body>

</html>