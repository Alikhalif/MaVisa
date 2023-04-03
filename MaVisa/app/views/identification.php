<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <div class="content-info border shadow p-3 mt-5 w-50 mx-auto bg-light">
        <div class="d-flex align-items-center flex-column ">
            <h1 class="">Identification</h1>
            <form class="row g-2 p-3" id="form" method="POST">
                <label class="form-label">Entre votre numero :</label>
                <input type="text" class="form-control" id="token" name="token" placeholder="votre numero">
                <button type="submit" name="submit" class="btn btn-success d-block">search</button>

            </form>
        </div>
        
    </div>

    <script>
        // var regName = /^[a-zA-Z]+$/;
        var form = document.getElementById("form");

        function validateForm() {
            let token = document.forms["form"]["token"].value;

            if (token == "") {
                alert("le champ obligatoire");
            }else{
                return true;
            }
        }

        var selectInput = document.querySelector('#token');

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const token = selectInput.value;

            // validate = validateForm();

            fetch('http://mavisa.com/Api/token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(token)
            })
            .then(response => response.json())
            .then(data1 => {
            // store the token in a variable or in local storage
                console.log(data1[0].id);
                sessionStorage.setItem("userId", data1[0].id);
                sessionStorage.setItem("token", data1[0].token);
                sessionStorage.setItem("nom", data1[0].nom);
                sessionStorage.setItem("prenom", data1[0].prenom)
                console.log(data1);
                window.location.href = "http://mavisa.com/Api/reserv";
            })
            .catch(error => {
                console.error(error);
            });
            // .then(data => {
            // // store the token in a variable or in local storage
            //     sessionStorage.setItem('userId', data.id)
            // })
            // .catch(error => console.error(error));

            // if(validateForm() == true){
             
            //     const response = fetch(`http://mavisa.com/Api/token/${id}`)

            //     console.log(response);
            //     const data = response.json();
            //     const userId = data.id;
            //     sessionStorage.setItem('userId', userId);

                // fetch("http://mavisa.com/Api/token/"+id)
                // .then((response) => response.json())
                // .then((ok) => )
                // .then((mydata) => {
                    
                //     console.log(mydata)
                //     const kok = sessionStorage.setItem("idUser", mydata.id)
                //     console.log(sessionStorage.getItem("idUser"))
                
                // })
                //     // var d = Object.fromEntries(mydata)
                //     // console.log(d)

                // // })
                // .then((kok) => sessionStorage.setItem("idUser", mydata.id))


                // console.log(u);
                // var d = Object.fromEntries(u)
                // console.log(d);
                    
                
                
            // }

            
            
           
            
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>