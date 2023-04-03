<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.1/index.global.min.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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

    <div class="d-flex justify-content-center align-items-center mx-auto">
        <div class="content-calender w-50  mt-5 ">
            <p>Veuillez choisir une plage horaire disponible : </p>
            <!-- <div class="d-flex justify-contant-between"> -->
            <div class="" id="calendar">  </div>

            
            <!-- </div> -->       
        </div>

        <!-- ///////////////////////////// -->
        <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="date" id="start" class="form-control">
                    </div>
                </div>
              </form>
               
            </div>
          </div>
        </div>
        <!-- ///////////////////////////// -->

        <!-- <div class="border w-25 p-3">
            <form action="post" class=" p-2">
                <div class="col-md-12">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-12">
                    <label class="form-label">day</label>
                    <select name="day" id="day" class="form-control">
                        <option value="" selected>--choice--</option>
                        <option value="lundi">lundi</option>
                        <option value="mardi">mardi</option>
                        <option value="mercredi">mercredi</option>
                        <option value="jeudi">jeudi</option>
                        <option value="vandredi">vandredi</option>
                    </select>
                </div>
                
                <div class="col-md-12">
                    <label class="form-label">time</label>
                    <select name="time" id="time" class="form-control">
                        <option value="" selected>--choice--</option>
                        <option value="9">9:15</option>
                        <option value="10">10:15</option>
                        <option value="11">11:15</option>
                        <option value="14">14:15</option>
                        <option value="15">15:15</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-success " type="submit">Reserve</button>
                </div> 
                
            </form>
        </div>
    </div> -->


    <!-- popup add -->
    <div class="popup-add">

        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header">
                        <div class="close-btn">&times;</div>
                        <h3 class="text-center font-weight-light my-4">Reservation</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" id="formR">
                            <!-- number-task -->

                            <input type="text" name="dateR" id="dateR" class="form-control">
                            <p></p>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" name="btnaddMuTask" class="btn btn-primary">Add</button></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    
    
    <script>

        var token = document.getElementById('token');
        token.innerHTML = sessionStorage.getItem("token");

        var nom = document.getElementById('nom');
        nom.innerHTML = sessionStorage.getItem("nom");

        var prenom = document.getElementById('prenom');
        prenom.innerHTML = sessionStorage.getItem("prenom");

        document.querySelector(".popup-add .close-btn").addEventListener("click", function(){
            document.querySelector(".popup-add").classList.remove("active");
        });

        const myUser =  sessionStorage.getItem("userId");
        console.log(myUser);

    
        fetch('http://mavisa.com/Api/selectRv')
        .then(response => response.json())
        .then(data => {
            // Parse the data into FullCalendar format
            const events = data.map(event => ({
                id: event.idUser,
                start: event.start,
                idUser: event.idUser,
            
            }));
            
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridFourDay',
                weekends: false,

                editable: true,
                
                
                // eventAllow: function(event, draggable) {
                //     // check if the current user is allowed to edit this event
                //     if (isEditable(currentUser)) {
                //         return true; // allow editing
                //     } else {
                //         return false; // disallow editing
                //     }
                // },

                // eventStartEditable: true,
                // eventDurationEditable: true,

                // disabled: true,
                // disableResizing: true,

                
                dateClick: function (info){
                    
                    var date_rsv = info.dateStr
                    console.log(date_rsv);
                    if(confirm("Are you sure you want to proceed?")){
                        // console.log(sessionStorage.getItem("userId"));
                        // console.log(date_rsv);
                        
                        let myObj = {
                            userId : sessionStorage.getItem("userId"),
                            dateAp : date_rsv,
                        }
                        let myJson = JSON.stringify(myObj);
                        // console.log(myJson);
                        
                        fetch('http://mavisa.com/Api/Reservation',{
                            method : 'POST',
                            header : {
                                'Content-Type' : 'application/json'
                            },
                            body : myJson,
                        });

                        window.location.href = "http://mavisa.com/Api/reserv";
                        
                    } 
                },
                eventClick : function(info){
                    var idU = info.event.extendedProps.idUser;
                    console.log(info);

                    if(idU == myUser){
                        if(confirm("Are you sure you want to delete ?")){
                            fetch('http://mavisa.com/Api/deleteRes/', {
                            method : 'DELETE',
                            headers : {
                                'Content-Type' : 'application/json'
                            },
                            body: JSON.stringify({idU})
                            })
                            .then(response => {
                                if (response.ok) {
                                    alert('deleted successfully');
                                } else {
                                    alert('Error deleting');
                                }
                            })
                            .catch(error => {
                                console.error('Error sending DELETE request:', error);
                            });
                        }
                    }
                    

                    console.log(info.event.extendedProps.idUser);
                },
                
                eventDrop: function(info) {
                    console.log('Event drop', info.event);
                    console.log('New event start date/time', info.event.start);
                    // console.log('New event end date/time', info.event.end);

                    let idU = info.event.extendedProps.idUser;
                    console.log(idU);
                    if(idU == myUser){
                        let dateEnd = info.event.start;
                        console.log(typeof(dateEnd));
                        // dateEnd.forEach(function(num) {
                        //     console.log(num);
                        // });

                        let datad = {
                            'idU': idU,
                            'dateEnd': dateEnd,
                            durationEditable: true
                        };

                        fetch('http://mavisa.com/Api/UpdateRes', {
                            method : 'PUT',
                            headers : {
                                'Content-Type' : 'application/json'
                            },
                            body: JSON.stringify(datad)
                        })
                        .catch(error => {
                            console.error('Error sending UPDATE request:', error);
                        });
                    }
                    
                },

                
                views: {
                    timeGridFourDay: {
                        type: 'timeGrid',
                        duration: { days: 7 },
                        defaultView: 'timeGridDay',
                        slotDuration: '01:00:00',
                        slotLabelInterval: '00:30:00',
                        slotMinTime: '09:15:00',
                        slotMaxTime: '16:15:00',
                        
                    }, 
                },
                

                eventRender: function(info) {
                    // Check if the event should be disabled based on some condition
                    info.event.display == '0'
                    // Disable the event by setting its opacity to 0.5
                    // info.el.style.opacity = '0.5';
                    
                },

                // droppable: true,
                
                events: events
            });

            var eventsA = calendar.getEvents();
            console.log(eventsA);
            for (var i = 0; i < eventsA.length; i++) {
                if(eventsA[i].id == myUser){
                    eventsA[i].setProp('editable', true); // prevent users from modifying the events
                    eventsA[i].setProp('backgroundColor', 'green');
                    console.log(eventsA[i].id);
                }else{
                    eventsA[i].setProp('editable', false);
                    eventsA[i].setProp('backgroundColor', 'gray');
                }
                // eventsA[i].setProp('rendering', 'background'); // make events look disabled
                
                // calendar.updateEvent(eventsA[i]);
            }

            // var eventsA = calendar.getEvents();
            // for (var i = 0; i < eventsA.length; i++) {
            //     eventsA[i].setProp('rendering', 'background'); // make events look disabled
            //     eventsA[i].setProp('editable', false); // prevent users from modifying the events
            //     calendar.updateEvent(eventsA[i]);
            // }
            

            calendar.render();
        });

        

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>