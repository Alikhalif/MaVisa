
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
                        <a class="nav-link" id="res" style="display:none;" href="<?= BURL.'Api/reserv' ?>">Reservation</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="dossier" href="<?= BURL.'Api/dos' ?>">Dossier</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="profile" href="<?= BURL.'Api/profile' ?>">Profile</a>
                    </li>
                    
                </ul>
                <a class="btn btn-primary" style="background-color: rgb(133, 88, 88); display:none;" id="login" href="<?= BURL.'Api/ident' ?>">Login</a>

            </div>
        </div>
    </nav>
    <script>
        const loginElement = document.getElementById('login');
        const reservationElement = document.getElementById('res'); 
        const profileElement = document.getElementById('profile');
        const dossierElement = document.getElementById('dossier');
        

        if (sessionStorage.getItem('token') !== null) {
            loginElement.style.display = 'none'; 
            dossierElement.style.display = 'none';
            reservationElement.style.display = 'block'; 
            profileElement.style.display = 'block';

        } else {
            loginElement.style.display = 'block'; 
            reservationElement.style.display = 'none'; 
            dossierElement.style.display = 'block'; 
            profileElement.style.display = 'none';
        }

    </script>

