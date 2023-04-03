<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update dossie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <?php include(VIEWS.'include/header.php') ?>

    <div class="p-3"></div>
    <main class="dos m-5 p-3 border rounded shadow">
        <form class="row g-3 p-3" id="form" method="POST">
            <div class="col-md-6">
                <label class="form-label">nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="votre nom">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="votre prenom">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">date de naissance</label>
                <input type="date" class="form-control" id="dn" name="dn">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">nationalite</label>
                <select id="nationalite" name="nationalite" class="form-select">
                    <option value="" selected>Choose...</option>
                    <option value="AFG">Afghane (Afghanistan)</option>
                    <option value="ALB">Albanaise (Albanie)</option>
                    <option value="DZA">Algérienne (Algérie)</option>
                    <option value="DEU">Allemande (Allemagne)</option>
                    <option value="USA">Americaine (États-Unis)</option>
                    <option value="AND">Andorrane (Andorre)</option>
                    <option value="AGO">Angolaise (Angola)</option>
                    <option value="ARG">Argentine (Argentine)</option>
                    <option value="ARM">Armenienne (Arménie)</option>
                    <option value="AUS">Australienne (Australie)</option>
                    <option value="AUT">Autrichienne (Autriche)</option>
                    <option value="AZE">Azerbaïdjanaise (Azerbaïdjan)</option>
                    <option value="BHS">Bahamienne (Bahamas)</option>
                    <option value="BHR">Bahreinienne (Bahreïn)</option>
                    <option value="BGD">Bangladaise (Bangladesh)</option>
                    <option value="BRB">Barbadienne (Barbade)</option>
                    <option value="BEL">Belge (Belgique)</option>
                    <option value="BLZ">Belizienne (Belize)</option>
                    <option value="BEN">Béninoise (Bénin)</option>
                    <option value="BTN">Bhoutanaise (Bhoutan)</option>
                    <option value="BLR">Biélorusse (Biélorussie)</option>
                    <option value="MMR">Birmane (Birmanie)</option>
                    <option value="GNB">Bissau-Guinéenne (Guinée-Bissau)</option>
                    <option value="BOL">Bolivienne (Bolivie)</option>
                    <option value="BIH">Bosnienne (Bosnie-Herzégovine)</option>
                    <option value="BWA">Botswanaise (Botswana)</option>
                    <option value="BRA">Brésilienne (Brésil)</option>
                    <option value="GBR">Britannique (Royaume-Uni)</option>
                    <option value="BRN">Brunéienne (Brunéi)</option>
                    <option value="BGR">Bulgare (Bulgarie)</option>
                    <option value="BFA">Burkinabée (Burkina)</option>
                    <option value="BDI">Burundaise (Burundi)</option>
                    <option value="KHM">Cambodgienne (Cambodge)</option>
                    <option value="CMR">Camerounaise (Cameroun)</option>
                    <option value="CAN">Canadienne (Canada)</option>
                    <option value="CPV">Cap-verdienne (Cap-Vert)</option>
                    <option value="CAF">Centrafricaine (Centrafrique)</option>
                    <option value="CHL">Chilienne (Chili)</option>
                    <option value="CHN">Chinoise (Chine)</option>
                    <option value="CYP">Chypriote (Chypre)</option>
                    <option value="COL">Colombienne (Colombie)</option>
                    <option value="COM">Comorienne (Comores)</option>
                    <option value="COG">Congolaise (Congo-Brazzaville)</option>
                    <option value="COD">Congolaise (Congo-Kinshasa)</option>
                    <option value="COK">Cookienne (Îles Cook)</option>
                    <option value="CRI">Costaricaine (Costa Rica)</option>
                    <option value="HRV">Croate (Croatie)</option>
                    <option value="CUB">Cubaine (Cuba)</option>
                    <option value="DNK">Danoise (Danemark)</option>
                    <option value="DJI">Djiboutienne (Djibouti)</option>
                    <option value="DOM">Dominicaine (République dominicaine)</option>
                    <option value="DMA">Dominiquaise (Dominique)</option>
                    <option value="EGY">Égyptienne (Égypte)</option>
                    <option value="ARE">Émirienne (Émirats arabes unis)</option>
                    <option value="GNQ">Équato-guineenne (Guinée équatoriale)</option>
                    <option value="ECU">Équatorienne (Équateur)</option>
                    <option value="ERI">Érythréenne (Érythrée)</option>
                    <option value="ESP">Espagnole (Espagne)</option>
                    <option value="TLS">Est-timoraise (Timor-Leste)</option>
                    <option value="EST">Estonienne (Estonie)</option>
                    <option value="ETH">Éthiopienne (Éthiopie)</option>
                    <option value="FJI">Fidjienne (Fidji)</option>
                    <option value="FIN">Finlandaise (Finlande)</option>
                    <option value="FRA">Française (France)</option>
                    <option value="GAB">Gabonaise (Gabon)</option>
                    <option value="GMB">Gambienne (Gambie)</option>
                    <option value="GEO">Georgienne (Géorgie)</option>
                    <option value="GHA">Ghanéenne (Ghana)</option>
                    <option value="GRD">Grenadienne (Grenade)</option>
                    <option value="GTM">Guatémaltèque (Guatemala)</option>
                    <option value="GIN">Guinéenne (Guinée)</option>
                    <option value="GUY">Guyanienne (Guyana)</option>
                    <option value="HTI">Haïtienne (Haïti)</option>
                    <option value="GRC">Hellénique (Grèce)</option>
                    <option value="HND">Hondurienne (Honduras)</option>
                    <option value="HUN">Hongroise (Hongrie)</option>
                    <option value="IND">Indienne (Inde)</option>
                    <option value="IDN">Indonésienne (Indonésie)</option>
                    <option value="IRQ">Irakienne (Iraq)</option>
                    <option value="IRN">Iranienne (Iran)</option>
                    <option value="IRL">Irlandaise (Irlande)</option>
                    <option value="ISL">Islandaise (Islande)</option>
                    <option value="ISR">Israélienne (Israël)</option>
                    <option value="ITA">Italienne (Italie)</option>
                    <option value="CIV">Ivoirienne (Côte d'Ivoire)</option>
                    <option value="JAM">Jamaïcaine (Jamaïque)</option>
                    <option value="JPN">Japonaise (Japon)</option>
                    <option value="JOR">Jordanienne (Jordanie)</option>
                    <option value="KAZ">Kazakhstanaise (Kazakhstan)</option>
                    <option value="KEN">Kenyane (Kenya)</option>
                    <option value="KGZ">Kirghize (Kirghizistan)</option>
                    <option value="KIR">Kiribatienne (Kiribati)</option>
                    <option value="KNA">Kittitienne et Névicienne (Saint-Christophe-et-Niévès)</option>
                    <option value="KWT">Koweïtienne (Koweït)</option>
                    <option value="LAO">Laotienne (Laos)</option>
                    <option value="LSO">Lesothane (Lesotho)</option>
                    <option value="LVA">Lettone (Lettonie)</option>
                    <option value="LBN">Libanaise (Liban)</option>
                    <option value="LBR">Libérienne (Libéria)</option>
                    <option value="LBY">Libyenne (Libye)</option>
                    <option value="LIE">Liechtensteinoise (Liechtenstein)</option>
                    <option value="LTU">Lituanienne (Lituanie)</option>
                    <option value="LUX">Luxembourgeoise (Luxembourg)</option>
                    <option value="MKD">Macédonienne (Macédoine)</option>
                    <option value="MYS">Malaisienne (Malaisie)</option>
                    <option value="MWI">Malawienne (Malawi)</option>
                    <option value="MDV">Maldivienne (Maldives)</option>
                    <option value="MDG">Malgache (Madagascar)</option>
                    <option value="MLI">Maliennes (Mali)</option>
                    <option value="MLT">Maltaise (Malte)</option>
                    <option value="MAR">Marocaine (Maroc)</option>
                    <option value="MHL">Marshallaise (Îles Marshall)</option>
                    <option value="MUS">Mauricienne (Maurice)</option>
                    <option value="MRT">Mauritanienne (Mauritanie)</option>
                    <option value="MEX">Mexicaine (Mexique)</option>
                    <option value="FSM">Micronésienne (Micronésie)</option>
                    <option value="MDA">Moldave (Moldovie)</option>
                    <option value="MCO">Monegasque (Monaco)</option>
                    <option value="MNG">Mongole (Mongolie)</option>
                    <option value="MNE">Monténégrine (Monténégro)</option>
                    <option value="MOZ">Mozambicaine (Mozambique)</option>
                    <option value="NAM">Namibienne (Namibie)</option>
                    <option value="NRU">Nauruane (Nauru)</option>
                    <option value="NLD">Néerlandaise (Pays-Bas)</option>
                    <option value="NZL">Néo-Zélandaise (Nouvelle-Zélande)</option>
                    <option value="NPL">Népalaise (Népal)</option>
                    <option value="NIC">Nicaraguayenne (Nicaragua)</option>
                    <option value="NGA">Nigériane (Nigéria)</option>
                    <option value="NER">Nigérienne (Niger)</option>
                    <option value="NIU">Niuéenne (Niue)</option>
                    <option value="PRK">Nord-coréenne (Corée du Nord)</option>
                    <option value="NOR">Norvégienne (Norvège)</option>
                    <option value="OMN">Omanaise (Oman)</option>
                    <option value="UGA">Ougandaise (Ouganda)</option>
                    <option value="UZB">Ouzbéke (Ouzbékistan)</option>
                    <option value="PAK">Pakistanaise (Pakistan)</option>
                    <option value="PLW">Palaosienne (Palaos)</option>
                    <option value="PSE">Palestinienne (Palestine)</option>
                    <option value="PAN">Panaméenne (Panama)</option>
                    <option value="PNG">Papouane-Néo-Guinéenne (Papouasie-Nouvelle-Guinée)</option>
                    <option value="PRY">Paraguayenne (Paraguay)</option>
                    <option value="PER">Péruvienne (Pérou)</option>
                    <option value="PHL">Philippine (Philippines)</option>
                    <option value="POL">Polonaise (Pologne)</option>
                    <option value="PRT">Portugaise (Portugal)</option>
                    <option value="QAT">Qatarienne (Qatar)</option>
                    <option value="ROU">Roumaine (Roumanie)</option>
                    <option value="RUS">Russe (Russie)</option>
                    <option value="RWA">Rwandaise (Rwanda)</option>
                    <option value="LCA">Saint-Lucienne (Sainte-Lucie)</option>
                    <option value="SMR">Saint-Marinaise (Saint-Marin)</option>
                    <option value="VCT">Saint-Vincentaise et Grenadine (Saint-Vincent-et-les Grenadines)</option>
                    <option value="SLB">Salomonaise (Îles Salomon)</option>
                    <option value="SLV">Salvadorienne (Salvador)</option>
                    <option value="WSM">Samoane (Samoa)</option>
                    <option value="STP">Santoméenne (Sao Tomé-et-Principe)</option>
                    <option value="SAU">Saoudienne (Arabie saoudite)</option>
                    <option value="SEN">Sénégalaise (Sénégal)</option>
                    <option value="SRB">Serbe (Serbie)</option>
                    <option value="SYC">Seychelloise (Seychelles)</option>
                    <option value="SLE">Sierra-Léonaise (Sierra Leone)</option>
                    <option value="SGP">Singapourienne (Singapour)</option>
                    <option value="SVK">Slovaque (Slovaquie)</option>
                    <option value="SVN">Slovène (Slovénie)</option>
                    <option value="SOM">Somalienne (Somalie)</option>
                    <option value="SDN">Soudanaise (Soudan)</option>
                    <option value="LKA">Sri-Lankaise (Sri Lanka)</option>
                    <option value="ZAF">Sud-Africaine (Afrique du Sud)</option>
                    <option value="KOR">Sud-Coréenne (Corée du Sud)</option>
                    <option value="SSD">Sud-Soudanaise (Soudan du Sud)</option>
                    <option value="SWE">Suédoise (Suède)</option>
                    <option value="CHE">Suisse (Suisse)</option>
                    <option value="SUR">Surinamaise (Suriname)</option>
                    <option value="SWZ">Swazie (Swaziland)</option>
                    <option value="SYR">Syrienne (Syrie)</option>
                    <option value="TJK">Tadjike (Tadjikistan)</option>
                    <option value="TZA">Tanzanienne (Tanzanie)</option>
                    <option value="TCD">Tchadienne (Tchad)</option>
                    <option value="CZE">Tchèque (Tchéquie)</option>
                    <option value="THA">Thaïlandaise (Thaïlande)</option>
                    <option value="TGO">Togolaise (Togo)</option>
                    <option value="TON">Tonguienne (Tonga)</option>
                    <option value="TTO">Trinidadienne (Trinité-et-Tobago)</option>
                    <option value="TUN">Tunisienne (Tunisie)</option>
                    <option value="TKM">Turkmène (Turkménistan)</option>
                    <option value="TUR">Turque (Turquie)</option>
                    <option value="TUV">Tuvaluane (Tuvalu)</option>
                    <option value="UKR">Ukrainienne (Ukraine)</option>
                    <option value="URY">Uruguayenne (Uruguay)</option>
                    <option value="VUT">Vanuatuane (Vanuatu)</option>
                    <option value="VAT">Vaticane (Vatican)</option>
                    <option value="VEN">Vénézuélienne (Venezuela)</option>
                    <option value="VNM">Vietnamienne (Viêt Nam)</option>
                    <option value="YEM">Yéménite (Yémen)</option>
                    <option value="ZMB">Zambienne (Zambie)</option>
                    <option value="ZWE">Zimbabwéenne (Zimbabwe)</option>
                </select>
            </div>
            
            <div class="col-md-4">
                <label for="inputState" class="form-label">situation familiale</label>
                <select id="situation" name="situation" class="form-select">
                    <option value="" selected>Choose...</option>
                    <option value="célibataire">célibataire</option>
                    <option value="en couple">en couple</option>
                    <option value="veuf">veuf</option>
                </select>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="1234 Main St">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">type de visa</label>
                <select id="typevisa" name="typevisa" class="form-select">
                    <option value="" selected>Choose...</option>
                    <option value="Visa de tourisme">visa de tourisme</option>
                    <option value="Visa d'affaires">visa d'affaires</option>
                    <option value="Visa d'études">visa d'études</option>
                    <option value="Visa de travail">visa de travail</option>
                    <option value="Visa de résidence">visa de résidence</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">date de départ</label>
                <input type="date" name="dateD" class="form-control" id="dateD">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">date d'arriver</label>
                <input type="date" name="dateF" class="form-control" id="dateF">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">type document de voyage</label>
                <select id="typeV" name="typeV" class="form-select">
                    <option value="" selected>Choose...</option>
                    <option value="passeport">passeport</option>
                    <option value="carte d'identité nationale">carte d'identité nationale</option>
                    <option value="visa">visa</option>
                    <option value="certificat de naissance">visa de travail</option>
                    <option value="Permis">Permis</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">numéro document de voyage</label>
                <input type="text" name="NumV" class="form-control" id="NumV" placeholder="">
            </div>
            <input type="hidden" name="idUser" class="form-control" id="idUser">
            <input type="hidden" name="token" class="form-control" id="token">
            


            <div class="col-12">
                <button type="submit" name="edit" class="btn btn-success d-block">edit</button>
            </div>
        </form>
    </main>

    <script>
        //select
        const token = sessionStorage.getItem('token');

        fetch('http://mavisa.com/Api/token', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(token)
        })
        .then(response => response.json())
        .then(data => {
        // store the token in a variable or in local storage
            console.log(data);
            document.getElementById('nom').value = data[0].nom;
            document.getElementById('prenom').value = data[0].prenom;
            document.getElementById('dn').value = data[0].dateNaiss;
            document.getElementById('nationalite').value = data[0].nationalite;
            document.getElementById('situation').value = data[0].situation_famil;
            document.getElementById('adresse').value = data[0].adresse;

            document.getElementById('typevisa').value = data[0].typevisa;
            document.getElementById('dateD').value = data[0].dateD;
            document.getElementById('dateF').value = data[0].dateF;
            document.getElementById('typeV').value = data[0].typeDocVoyage;
            document.getElementById('NumV').value = data[0].numDocVoyage;
            document.getElementById('token').value = data[0].token;
            document.getElementById('idUser').value = data[0].id;

            //////////////////////
            console.log(document.getElementById('nom').value = 'lplplplp');

            // update
            var regName = /^[a-zA-Z]+$/;
            var form = document.getElementById("form");

            function validateForm() {
                let nom = document.forms["form"]["nom"].value;
                let prenom = document.forms["form"]["prenom"].value;
                let dn = document.forms["form"]["dn"].value;
                let nationalite = document.forms["form"]["nationalite"].value;
                let situation = document.forms["form"]["situation"].value;
                let adresse = document.forms["form"]["adresse"].value;
                let typevisa = document.forms["form"]["typevisa"].value;
                let dateD = document.forms["form"]["dateD"].value;
                let dateF = document.forms["form"]["dateF"].value;
                let typeV = document.forms["form"]["typeV"].value;
                let NumV = document.forms["form"]["NumV"].value;
                let token = document.forms["form"]["token"].value;
                let idUser = document.forms["form"]["idUser"].value;

                if (nom == "" || prenom == "" || dn == "" || nationalite == "" || situation == "" || adresse == "" || typevisa == "" || dateD == "" || dateF == "" || typeV == "" || NumV == "") {
                    alert("Tous les champs obligatoires");
                    
                }else if(!regName.test(nom)){
                    alert("Un nom invalide a été entré.");
                }else if(!regName.test(prenom)){
                    alert("Un prenom invalide a été entré.");
                }else{
                    return true;
                }
            
            }

            // const formData = new FormData(document.getElementById("form"));
                const dataToUpdate = {
                    nom : 'frtrf',
                    prenom : document.getElementById('prenom').value,
                    dn : formData.get('dn'),
                    nationalite :formData.get('nationalite'),
                    situation : formData.get('situation'),
                    adresse : formData.get('adresse'),
                    typevisa : formData.get('typevisa'),
                    dateD : formData.get('dateD'),
                    dateF : formData.get('dateF'),
                    typeV : formData.get('typeV'),
                    NumV : formData.get('NumV'),
                    idUser : formData.get('idUser'),
                    token : formData.get('token'),
                    // nom : document.getElementById('nom').value,
                    // prenom : formData.get('prenom'),
                    // dn : formData.get('dn'),
                    // nationalite :formData.get('nationalite'),
                    // situation : formData.get('situation'),
                    // adresse : formData.get('adresse'),
                    // typevisa : formData.get('typevisa'),
                    // dateD : formData.get('dateD'),
                    // dateF : formData.get('dateF'),
                    // typeV : formData.get('typeV'),
                    // NumV : formData.get('NumV'),
                    // idUser : formData.get('idUser'),
                    // token : formData.get('token'),
                };
                // const data = Object.fromEntries(formData);
                console.log(dataToUpdate);

                

                form.addEventListener('submit', function(){
                    

                    // let nom = document.getElementById('nom').value;
                    // console.log(nom);
                    // let prenom = document.forms["form"]["prenom"].value;
                    // let dn = document.forms["form"]["dn"].value;
                    // let nationalite = document.forms["form"]["nationalite"].value;
                    // let situation = document.forms["form"]["situation"].value;
                    // let adresse = document.forms["form"]["adresse"].value;
                    // let typevisa = document.forms["form"]["typevisa"].value;
                    // let dateD = document.forms["form"]["dateD"].value;
                    // let dateF = document.forms["form"]["dateF"].value;
                    // let typeV = document.forms["form"]["typeV"].value;
                    // let NumV = document.forms["form"]["NumV"].value;
                    // let token = document.forms["form"]["token"].value;
                    // let idUser = document.forms["form"]["idUser"].value;
                    console.log('ok');
                    // validate = validateForm();

                    // if(validate == true){
                        const formData = new FormData(document.getElementById("form"));
                        const dataToUpdate = {
                            nom : 'frtrf',
                            prenom : formData.get('prenom').value,
                            dn : formData.get('dn'),
                            nationalite :formData.get('nationalite'),
                            situation : formData.get('situation'),
                            adresse : formData.get('adresse'),
                            typevisa : formData.get('typevisa'),
                            dateD : formData.get('dateD'),
                            dateF : formData.get('dateF'),
                            typeV : formData.get('typeV'),
                            NumV : formData.get('NumV'),
                            idUser : formData.get('idUser'),
                            token : formData.get('token'),
                            // nom : document.getElementById('nom').value,
                            // prenom : formData.get('prenom'),
                            // dn : formData.get('dn'),
                            // nationalite :formData.get('nationalite'),
                            // situation : formData.get('situation'),
                            // adresse : formData.get('adresse'),
                            // typevisa : formData.get('typevisa'),
                            // dateD : formData.get('dateD'),
                            // dateF : formData.get('dateF'),
                            // typeV : formData.get('typeV'),
                            // NumV : formData.get('NumV'),
                            // idUser : formData.get('idUser'),
                            // token : formData.get('token'),
                        };
                        // const data = Object.fromEntries(formData);
                        console.log(dataToUpdate);
                        // const formData = new FormData(form);
                        // const data = Object.fromEntries(formData);
                        // console.log(data);

                        fetch('http://mavisa.com/Api/update', {
                            method : 'PUT',
                            headers : {
                                'Content-Type' : 'application/json'
                            },
                            body: JSON.stringify(dataToUpdate)

                        }).then(res => res.json())
                        .then(message => {
                            console.log(message);
                        });
                        
                        // window.location.href = "http://mavisa.com/Api/reserv"

                    // }

                    // var nom = document.getElementById("nom");
                    // var prenom = document.getElementById("prenom");
                    // var dn = document.getElementById("dn");
                    // var situation = document.getElementById("situation");
                    // var adresse = document.getElementById("adresse");
                    // var typevisa = document.getElementById("typevisa");
                    // var dateD = document.getElementById("dateD");
                    // var dateF = document.getElementById("dateF");
                    // var typeV = document.getElementById("typeV");
                    // var NumV = document.getElementById("NumV");
                    
                });

            /////////////////////
        })
        .catch(error => {
            console.error(error);
        });

        
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>