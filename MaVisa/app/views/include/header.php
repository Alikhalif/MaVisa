<?php if(isset($_SESSION['user'])){ ?>
    <nav class="navbar bg-white navbar-expand-lg bg-body-tertiary fixed-top shadow">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <div class="logo">
                <a href="#" id="logo"><img src="/assets/img/icons-trell.png" alt="logo" width="40px" height="40"></a>
            </div>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> -->
                <!-- <span class="navbar-toggler-icon"></span> -->
                <!-- <img src="/assets/img/7711100.png" alt="" srcset="" style="width: 30px;"> -->
            <!-- </button> -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link c-dark" href="<?= BURL.'Home/index' ?>">Home</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BURL.'Home/project' ?>">Reservation</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BURL.'Home/project' ?>">Reservation</a>
                    </li>
                    
                    
                </ul>
                <a class="btn btn-primary" style="background-color: rgb(133, 88, 88);" href="<?= BURL.'Auth/logout' ?>">Logout</a>
            </div>
        </div>
    </nav>

<?php }else{ ?>
    <nav class="navbar bg-white navbar-expand-lg bg-body-tertiary fixed-top shadow">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <div class="logo">
                <a href="#" id="logo"><img src="/assets/img/logo-mr.png" alt="logo" width="70px" height="70"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
                <!-- <img src="/assets/img/7711100.png" alt="" srcset=""> -->
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BURL.'Home/index' ?>">Home</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BURL.'Api/reserv' ?>">Reservation</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BURL.'Api/dos' ?>">Dossier</a>
                    </li>
                    
                </ul>
                <a class="btn btn-primary" style="background-color: rgb(133, 88, 88);" href="<?= BURL.'Home/logout' ?>">Login</a>
            </div>
        </div>
    </nav>

<?php } ?>