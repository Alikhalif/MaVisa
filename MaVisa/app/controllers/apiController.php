<?php
include(MODELS.'/API.php');

header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json; charset=UTF-8');

header("Access-Control-Allow-Methods: *");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: *");

class ApiController{
    public function data(){
        $db = new Apidata();
        $res['data'] = $db->set();
        View::load('myApi',$res);
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

            $t = rand(10000000,99999999);
            $token = "M"+$t;
             
            
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
                'token' => $inputData['token'],
            );

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
}