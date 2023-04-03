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

    public function ident(){
        View::load('identification');
    }

    public function profile(){
        View::load('profile');
    }

    public function updateInfo(){
        View::load('updateDoss');
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

        // if($_SERVER["REQUEST_METHOD"] == 'POST'){
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

            $dbId = new Apidata(); 
            $res = $dbId->getByToken($token);

            $rander = array();

            
            $data = array(
                'nom' => $res['nom'],
                'prenom' => $res['prenom'],
                'dateNaiss' => $res['dateNaiss'],
                'nationalite' => $res['nationalite'],
                'situation_famil' => $res['situation_famil'],
                'adresse' => $res['adresse'],
                'typevisa' => $res['typevisa'],
                'dateD' => $res['dateD'],
                'dateF' => $res['dateF'],
                'typeDocVoyage' => $res['typeDocVoyage'],
                'numDocVoyage' => $res['numDocVoyage'],
                'id' => $res['idUser'],
                'token' => $res['token']
            );
            array_push($rander,$data);
            
            header('Content-Type: application/json');

            echo json_encode($rander);
        // }
        // else{
        //     $data = [
        //         'status' => 405,
        //         'message' => $_SERVER["REQUEST_METHOD"]. ' Method not allowed',
                
        //     ];
        //     header("HTTP/1.0 405 Method not allowed");
        //     echo json_encode($data);
        // }

    }


    public function update(){
        // if($_SERVER['REQUEST_METHOD'] == 'PUT'){
            $inputData = json_decode(file_get_contents("php://input"),true);

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
                'id' => $inputData['idUser'],
                'token' => $inputData['token']
            );

            $dbP = new Apidata(); 
            $dbP->updatePerson($data);
        // }else{
        //     $data = [
        //         'status' => 405,
        //         'message' => $_SERVER["REQUEST_METHOD"]. ' Method not allowed',
        //     ];
        //     header("HTTP/1.0 405 Method not allowed");
        //     echo json_encode($data);
        // }
    }


    public function delete(){
        if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
            $inputData = json_decode(file_get_contents("php://input"),true);

            $data = array(
                'id' => $inputData['idU']
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
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=UTF-8');
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: *");

        $dbP = new Apidata(); 
        $result = $dbP->getAllRendevous();

        $all_rander = array();

        foreach($result as $res){
            $data = array(
                'id' => $res['idAp'],
                'start' => $res['dateAp'],
                'idUser' => $res['idUser']
            );
            array_push($all_rander,$data);
        }
        

        header('Content-Type: application/json');

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

    public function token(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=UTF-8');
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: *");

        $inputData = json_decode(file_get_contents("php://input"));
        
        $db = new Apidata(); 
        $result = $db->getByToken($inputData);

        if($result){
            $all_data = array();

            $data = array(
                'id' => $result['idUser'],
                'nom' => $result['nom'],
                'prenom' => $result['prenom'],
                'dateNaiss' => $result['dateNaiss'],
                'nationalite' => $result['nationalite'],
                'situation_famil' => $result['situation_famil'],
                'adresse' => $result['adresse'],
                'typevisa' => $result['typevisa'],
                'dateD' => $result['dateD'],
                'dateF' => $result['dateF'],
                'typeDocVoyage' => $result['typeDocVoyage'],
                'numDocVoyage' => $result['numDocVoyage'],
                'token' => $result['token'],
            );

            array_push($all_data, $data);
            header('Content-Type: application/json');

            echo json_encode($all_data);
        }else{
            echo json_encode(
                array(
                    'message' => 'No Found'
                )
            );
        }

        

    }

    public function Reservation(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=UTF-8');
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: *");

        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $inputData = json_decode(file_get_contents("php://input"), true);
            // echo json_encode($inputData);

            $data = array(
                'userId' => $inputData['userId'],
                'dateAp' => $inputData['dateAp']
            );

            $db = new Apidata();
            $result = $db->check_Reservation($data);

            if($result){
                header('Content-Type: application/json');
                echo json_encode(
                    array(
                        'message' => 'Reservations are not possible at the moment'
                    )
                );
            }else{
                $db = new Apidata();
                if($db->AddReservation($data)){
                    header('Content-Type: application/json');
                    echo json_encode(
                        array(
                            'message' => 'Reservation success'
                        )
                    );
                }
            }
            

        }else{
            $data = [
                'status' => 405,
                'message' => $_SERVER["REQUEST_METHOD"]. ' Method not allowed',
                
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }
    }


    public function deleteRes(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=UTF-8');
        header("Access-Control-Allow-Methods: DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: *");

        if($_SERVER["REQUEST_METHOD"] == 'DELETE'){
            $inputData = json_decode(file_get_contents("php://input"), true);
            
            $data = array(
                'idU' => $inputData['idU'],
            );

            $db = new Apidata();
            if($db->DeleteRendevous($data)){
                header('Content-Type: application/json');
                echo json_encode(
                    array(
                        'message' => 'Reservation Delete success'
                    )
                );
            }

        }else{
            $data = [
                'status' => 405,
                'message' => $_SERVER["REQUEST_METHOD"]. ' Method not allowed',
                
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }

    }

    public function UpdateRes(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=UTF-8');
        header("Access-Control-Allow-Methods: PUT");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: *");

        if($_SERVER['REQUEST_METHOD'] == 'PUT'){
            $inputData = json_decode(file_get_contents("php://input"), true);

            $data = array(
                'dateAp' => $inputData['dateEnd'],
                'idU' => $inputData['idU']
            );

            $db = new Apidata();
            if($db->Update($data)){
                header('Content-Type: application/json');
                echo json_encode(
                    array(
                        'message' => 'Reservation Update success'
                    )
                );
            }
            // else{
            //     header('Content-Type: application/json');
            //     echo json_encode(
            //         array(
            //             'message' => 'Server Error!'
            //         )
            //     );
            // }

        }else{
            $data = [
                'status' => 405,
                'message' => $_SERVER["REQUEST_METHOD"]. ' Method not allowed',
                
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }
    }
}

?>