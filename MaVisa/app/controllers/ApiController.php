<?php
include(MODELS.'/API.php');

// header('Access-Control-Allow-Origin: *');

// header('Content-Type: application/json; charset=UTF-8');

// header("Access-Control-Allow-Methods: *");

// header("Access-Control-Max-Age: 3600");

// header("Access-Control-Allow-Headers: *");

class ApiController{
    public function data(){
        $db = new Apidata();
        $res['data'] = $db->set();
        View::load('myApi',$res);
    }

    public function calander(){
        View::load('myApi');
    }

    public function dos(){
        View::load('dossie');
    }

    public function reserv(){
        View::load('Resevation');
    }

    public function getRandomStringUniqid($length = 9){
        $string = uniqid(rand());
        $randomString = substr('M'.$string, 0, $length);
        return $randomString;
    }

    public function insert(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=UTF-8');
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: *");

        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $inputData = json_decode(file_get_contents("php://input"), true);
            // echo $inputData;
            $token = $this->getRandomStringUniqid();           
             
            $data = array(
                'nom' => $inputData['nom'],
                'prenom' => $inputData['prenom'],
                'dateNaiss' => $inputData['dn'],
                'nationalite' => $inputData['nationalite'],
                'situation_famil' => $inputData['situation'],
                'adresse' => $inputData['adresse'],
                'typevisa' => $inputData['typevisa'],
                'dateD' => $inputData['dateD'],
                'dateF' => $inputData['dateF'],
                'typeDocVoyage' => $inputData['typeV'],
                'numDocVoyage' => $inputData['NumV'],
                'token' => $token,
            );


	// {
    //     "nom":"khalif",
    //     "prenom":"abdelali",
    //     "dateNaiss":"1999-02-01",
    //     "nationalite":"maroccaine",
    //     "situation_famil":"celibataire",
    //     "adresse":"rue 2 boulvard c safi",
    //     "typevisa":"Schengen C",
    //     "dateD":"2023-02-21",
    //     "dateF":"2023-02-28",
    //     "typeDocVoyage":"bateau",
    //     "numDocVoyage":2,
    //     }

            $dbP = new Apidata(); 
            $dbP->AddPerson($data);
        }
        else{
            $data = [
                'status' => 405,
                'message' => $_SERVER["REQUEST_METHOD"]. ' Method not allowed',
                
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }

    }


    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $inputData = json_decode(file_get_contents("php://input"));

            $data = array(
                'nom' => $inputData['nom'],
                'prenom' => $inputData['prenom'],
                'dateNaiss' => $inputData['dateNaiss'],
                'nationalite' => $inputData['nationalite'],
                'situation_famil' => $inputData['situation_famil'],
                'adresse' => $inputData['adresse'],
                'typevisa' => $inputData['typevisa'],
                'dateD' => $inputData['dateD'],
                'dateF' => $inputData['dateF'],
                'typeDocVoyage' => $inputData['typeDocVoyage'],
                'numDocVoyage' => $inputData['numDocVoyage'],
                'id' => $inputData['idUser']
            );

            $dbP = new Apidata(); 
            $dbP->updatePerson($data);
        }else{
            $data = [
                'status' => 405,
                'message' => $_SERVER["REQUEST_METHOD"]. ' Method not allowed',
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }
    }


    public function delete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $inputData = json_decode(file_get_contents("php://input"));

            $data = array(
                'id' => $inputData['idUser']
            );

            $dbP = new Apidata(); 
            $dbP->deletePerson($data);
        }else{
            $data = [
                'status' => 405,
                'message' => $_SERVER["REQUEST_METHOD"]. ' Method not allowed',
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }
    }

    public function select(){
        $dbP = new Apidata(); 
        $result = $dbP->getAll();

        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(
                array(
                    'message' => 'No Post Found'
                )
            );
        }
        
    }

    public function selectRv(){
        $all_rander = [];
        $dbP = new Apidata(); 
        $result = $dbP->getAllRendevous();

        foreach($result as $res){
            $data = array(
                'title' => 'hhh',
                'startTime' => $res['dateAp'],
                'endTime' => $res['datef']
            );
        }
        array_push($all_rander,$data);

        echo json_encode($all_rander);

        // if($result){
        //     echo json_encode($all_rander);
        // }else{
        //     echo json_encode(
        //         array(
        //             'message' => 'No Post Found'
        //         )
        //     );
        // }
        
    }
}