<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dossie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <?php include(VIEWS.'include/header.php') ?>

    <div class="p-4"></div>
    <!-- <main class="m-5 p-3 border rounded shadow"> -->
        <div class="mx-auto mt-5 p-3 w-50 border rounded shadow">
            <div class="row p-3">
                <label for="">nom : <span id="nom">null</span></label>
                <label for="">prénom : <span id="prénom">null</span></label>
                <label for="">date de naissance : <span id="dn">null</span></label>
                <label for="">nationalite : <span id="nationalite">null</span></label>
                <label for="">situation familiale : <span id="situation">null</span></label>
                <label for="">adresse : <span id="adresse">null</span></label>
                <label for="">type de visa : <span id="typeV">null</span></label>
                <label for="">date de départ : <span id="dateD">null</span></label>
                <label for="">date d'arriver : <span id="dateF">null</span></label>
                <label for="">type document de voyage : <span id="typeDv">null</span></label>
                <label for="">numéro document de voyage : <span id="numéroDv">null</span></label>
                <label for="">token : <span id="tok">null</span></label>
            </div>
            <form action="" class="p-3">
                <button type="submit" class="btn btn-success" id="edit">edit</button>
                <button type="submit" class="btn btn-danger" id="del">delete</button>
            </form>


        </div>
    <!-- </main> -->

    <script>

                const token =  sessionStorage.getItem("token");


                fetch('http://mavisa.com/Api/token',{
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(token)
                })
                .then(res => res.json())
                .then(data => {
                
                    document.getElementById('nom').innerHTML = data[0].nom;
                    document.getElementById('prénom').innerHTML = data[0].prenom;
                    document.getElementById('dn').innerHTML = data[0].dateNaiss;
                    document.getElementById('nationalite').innerHTML = data[0].nationalite;
                    document.getElementById('situation').innerHTML = data[0].situation_famil;
                    document.getElementById('adresse').innerHTML = data[0].adresse;

                    document.getElementById('typeV').innerHTML = data[0].typevisa;
                    document.getElementById('dateD').innerHTML = data[0].dateD;
                    document.getElementById('dateF').innerHTML = data[0].dateF;
                    document.getElementById('typeDv').innerHTML = data[0].typeDocVoyage;
                    document.getElementById('numéroDv').innerHTML = data[0].numDocVoyage;
                    document.getElementById('tok').innerHTML = data[0].token;
                    const idU = data[0].id;
                                            
                    // console.log(data);
                    console.log(idU);
                    document.getElementById('del').addEventListener('click',function(){
                        // if(confirm("Are you sure you want to delete ?")){
                            fetch('http://mavisa.com/Api/delete/', {
                            method : 'DELETE',
                            headers : {
                                'Content-Type' : 'application/json'
                            },
                            body: JSON.stringify({idU})
                            })
                            .catch(error => {
                                console.error('Error sending DELETE request:', error);
                            });
                            sessionStorage.clear();
                            window.location.href = "http://mavisa.com/Api/reserv";
                        // }
                        

                    })
                });
                

                document.getElementById('edit').addEventListener('click',function(){
                    console.log('oo');
                    window.open("http://mavisa.com/Api/updateInfo");
                    // window.location.href = "http://mavisa.com/Api/reserv";

                })

            




           

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>