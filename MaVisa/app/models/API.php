<?php
class Apidata{
    public function set(){
        header('Access-Control-Allow-Origin: *');

        header('Content-Type: application/json; charset=UTF-8');

        header("Access-Control-Allow-Methods: *");

        header("Access-Control-Max-Age: 3600");

        header("Access-Control-Allow-Headers: *");

        $data = ["name" => "Ali" , "website" => "http://localhost:5173/"];
        $JSON_data = json_encode($data);
        print_r($JSON_data);
        return $JSON_data;
    }

    public function AddPerson($inputData){
        // idUser	nom	prenom	dateNaiss	nationalite	situation_famil	adresse	typevisa	dateD	dateF	typeDocVoyage	numDocVoyage	token	


        $db = DB::connect()->prepare("INSERT INTO info(nom, prenom, dateNaiss, nationalite, situation_famil, adresse, typevisa, dateD, dateF, typeDocVoyage, numDocVoyage, token) VALUES(:nom, :prenom, :dateNaiss, :nationalite, :situation_famil, :adresse, :typevisa, :dateD, :dateF, :typeDocVoyage, :numDocVoyage, :token) ");
        $db->bindParam(':nom', $inputData['nom']);
        $db->bindParam(':prenom', $inputData['prenom']);
        $db->bindParam(':dateNaiss', $inputData['dateNaiss']);
        $db->bindParam(':nationalite', $inputData['nationalite']);
        $db->bindParam(':situation_famil', $inputData['situation_famil']);
        $db->bindParam(':adresse', $inputData['adresse']);
        $db->bindParam(':typevisa', $inputData['typevisa']);
        $db->bindParam(':dateD', $inputData['dateD']);
        $db->bindParam(':dateF', $inputData['dateF']);
        $db->bindParam(':typeDocVoyage', $inputData['typeDocVoyage']);
        $db->bindParam(':numDocVoyage', $inputData['numDocVoyage']);
        $db->bindParam(':token', $inputData['token']);
        if($db->execute()){
            $data = [
                'status' => 201,
                'message' => 'Person Created success',
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 500,
                'message' => ' Server Error!',
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }

    }

    public function updatePerson($inputData){
        $db = DB::connect()->prepare("UPDATE info SET nom = :nom, prenom = :prenom, dateNaiss = :dateNaiss, nationalite = :nationalite, situation_famil = :situation_famil, adresse = :adresse, typevisa = :typevisa, dateD = :dateD, dateF = :dateF, typeDocVoyage = :typeDocVoyage, numDocVoyage = :numDocVoyage WHERE idUser = :idx");
        $db->bindParam(':nom', $inputData['nom']);
        $db->bindParam(':prenom', $inputData['prenom']);
        $db->bindParam(':dateNaiss', $inputData['dateNaiss']);
        $db->bindParam(':nationalite', $inputData['nationalite']);
        $db->bindParam(':situation_famil', $inputData['situation_famil']);
        $db->bindParam(':adresse', $inputData['adresse']);
        $db->bindParam(':typevisa', $inputData['typevisa']);
        $db->bindParam(':dateD', $inputData['dateD']);
        $db->bindParam(':dateF', $inputData['dateF']);
        $db->bindParam(':typeDocVoyage', $inputData['typeDocVoyage']);
        $db->bindParam(':numDocVoyage', $inputData['numDocVoyage']);
        $db->bindParam(':idx',$data['id']);
        if($db->execute()){
            $data = [
                'status' => 201,
                'message' => 'Person Updated success',
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 500,
                'message' => ' Server Error!',
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }
    }

    public function deletePerson($data){
        $db = DB::connect()->prepare("DELETE FROM info WHERE idUser = :idx");
        $db->bindParam(':idx',$data['id']);
        if($db->execute()){
            $data = [
                'status' => 201,
                'message' => 'Person Delete success',
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 500,
                'message' => ' Server Error!',
            ];
            header("HTTP/1.0 405 Method not allowed");
            echo json_encode($data);
        }

    }


    public function getAll(){
        $db = DB::connect()->prepare("SELECT * FROM info");
        $db->execute();
        $res = $db->fetchAll();
        return $res;

    }

    public function getByToken($inputData){
        $db = DB::connect()->prepare("SELECT * FROM info WHERE token = :token");
        $db->bindParam(':token', $inputData['token']);
        $db->execute();
        $res = $db->fetchAll();
        return $res;
    }
    
}
