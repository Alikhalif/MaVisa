<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.1/index.global.min.js'></script>
    <link rel="stylesheet" href="/assets/css/main.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            /* font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px; */
        }

        
    </style>
</head>
<body>
    <?php include(VIEWS.'include/header.php') ?>

    <div class="p-4"></div>
    <div class="content-info border shadow p-3 mt-5 w-75 mx-auto bg-light d-flex align-items-center flex-column">
        <div class="d-flex align-items-start flex-column ">
            <p>Bonjour: <span class="font-weight-bold" id="nom"></span> <span class="font-weight-bold" id="prenom"></span></p>
            <p>votre numero de referonce de center mavisa: <span class="font-weight-bold" id="token"></span></p>
            <p>Etat de votre demande: <span class="font-weight-bold" id="validation">valide</span></p>
        </div>
        
    </div>

    <div class="content-calender w-75 mx-auto mt-5 d-flex align-items-start flex-column">
        <p>Veuillez choisir une plage horaire disponible : </p>
        <div class="w-100" id="calendar">
            

        </div>
    </div>
    
    
    <script>

        var token = document.getElementById('token');
        token.innerHTML = sessionStorage.getItem("token");

        var nom = document.getElementById('nom');
        nom.innerHTML = sessionStorage.getItem("nom");

        var prenom = document.getElementById('prenom');
        prenom.innerHTML = sessionStorage.getItem("prenom");

        
        document.addEventListener('DOMContentLoaded', function() {
            
            // console.log(fetchall()); 

            // let data =  fetch('http://mavisa.com/Api/selectRv');
            // let respense =  data.json();
            // console.log(respense) ;
            
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                initialView: 'dayGridMonth',
                    headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridYear,dayGridWeek,dayGridDay'
                    },
                navLinks : true,
                editable : true,
                selectable : true,
                // events: 'https://fullcalendar.io/api/demo-feeds/events.json'
                events: async function fetchall(){
                        let data = await fetch('http://mavisa.com/Api/selectRv');
                        let respense = await data.json();
                        return respense;
            }
            });
 
            calendar.render();
        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>