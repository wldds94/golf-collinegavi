<?php
namespace GolfGavi\Libs;
 
class GesGolfManager {
    
    private $_clubID;
    private $_serialNumber;
    private $_WSDL;
    private $_soapClient;
    private $_classifiche;
    
    public function __construct($_clubID, $_serialNumber, $_WSDL) {
        $this->_clubID = $_clubID;
        $this->_serialNumber = $_serialNumber;
        $this->_WSDL = $_WSDL;
        $this->_soapClient = $this->_connectToWSDL($_WSDL);
        $this->_classifiche = array();
        
    }
    
    private function _connectToWSDL($_WSDL){
        try{
            return new \SoapClient($_WSDL);
        }catch(\Exception $e){
            //connect to DB   
        }
        
    }
    
    private function _getArgumentsForSingleGara($competitionID){
        return array(
            'serial_number' => $this->getSerialNumber(),
            'caller_club_id' => $this->getClubID(),
            'gara_id' => $competitionID 
        );
    }
    
    
    private function _getFormattedHours($orari){
        $result = array();
        foreach($orari->OrarioDiPartenzaSemplice as $single_orario){
            if(!isset($result[$single_orario->ora]))
                $result[$single_orario->ora] = array();
            if(!in_array($single_orario, $result[$single_orario->ora]))
                array_push($result[$single_orario->ora], $single_orario);
        }
        return $result;
    }
    
    private function _getClassificheSingole($classificheSingole){
//        var_dump($classificheSingole);
        if(isset($classificheSingole->ClassificheSingole)){
            foreach($classificheSingole->ClassificheSingole as $classifica){
                foreach($classifica as $classificaSingola){

                    $resultRanking = array(
                    'nr_tessera' => $classificaSingola->nr_tessera,
                    'codice_nominativo' => $classificaSingola->codice_nominativo,
                    'nome' => $classificaSingola->nome,
                    'nome_gara' => $classificheSingole->nome_classifica,
                    'cognome' => $classificaSingola->cognome,
                    'posizione' => $classificaSingola->posizione,
                    'jun_sen' => $classificaSingola->jun_sen,
                    'ladies' => $classificaSingola->ladies,
                    'totale' => $classificaSingola->totale,
                    'anno' => $classificaSingola->anno,
                    'club_name' => $classificaSingola->club_name,
                    'club_id' => $classificaSingola->club_id,
                    'pl_hcp' => $classificaSingola->pl_hcp
                );
                if(!isset($this->_classifiche[$classificheSingole->id_classifica]))
                    $this->_classifiche[$classificheSingole->id_classifica] = array();
                if(!in_array($resultRanking, $this->_classifiche[$classificheSingole->id_classifica]))
                    array_push($this->_classifiche[$classificheSingole->id_classifica] , $resultRanking);

    //            array_push($this->_classifiche, $resultRanking);
                }

            }
        }
        else{
            foreach($classificheSingole->ClassificaSingola as $classificaSingola){

                    $resultRanking = array(
                    'nr_tessera' => $classificaSingola->nr_tessera,
                    'codice_nominativo' => $classificaSingola->codice_nominativo,
                    'nome' => $classificaSingola->nome,
                    'nome_gara' => $classificheSingole->nome_classifica,
                    'cognome' => $classificaSingola->cognome,
                    'posizione' => $classificaSingola->posizione,
                    'jun_sen' => $classificaSingola->jun_sen,
                    'ladies' => $classificaSingola->ladies,
                    'totale' => $classificaSingola->totale,
                    'anno' => $classificaSingola->anno,
                    'club_name' => $classificaSingola->club_name,
                    'club_id' => $classificaSingola->club_id,
                    'pl_hcp' => $classificaSingola->pl_hcp
                );
                if(!isset($this->_classifiche[$classificheSingole->id_classifica]))
                    $this->_classifiche[$classificheSingole->id_classifica] = array();
                if(!in_array($resultRanking, $this->_classifiche[$classificheSingole->id_classifica]))
                    array_push($this->_classifiche[$classificheSingole->id_classifica] , $resultRanking);

    //            array_push($this->_classifiche, $resultRanking);
                }
        }
    }
    private function _getClassificheEclettiche($classificaEclettica){
        
        foreach($classificaEclettica as $index => $classifica){
            $id = $classificaEclettica->id_classifica;
            $intestazione = $classificaEclettica->IntestazioneEclettica;
            $nomeGara = $classificaEclettica->nome_classifica;
            if($index !== ClassificheEclettiche) continue;
            foreach($classifica->ClassificaEclettica as $classificaEclettica){
                
                $resultRanking = array(
                    'intestazione'      => $intestazione,
                    'nome_gara'         => $nomeGara,
                    'nome'              => $classificaEclettica->nome,
                    'cognome'           => $classificaEclettica->cognome,
                    'posizione'         => $classificaEclettica->posizione,
                    'jun_sen'           => $classificaEclettica->jun_sen,
                    'ex_hcp'            => $classificaEclettica->ex_hcp,
                    'ladies'            => $classificaEclettica->ladies,
                    'totale'            => $classificaEclettica->totale,
                    'buca_1'            => $classificaEclettica->buca_1,
                    'buca_2'            => $classificaEclettica->buca_2,
                    'buca_3'            => $classificaEclettica->buca_3,
                    'buca_4'            => $classificaEclettica->buca_4,
                    'buca_5'            => $classificaEclettica->buca_5,
                    'buca_6'            => $classificaEclettica->buca_6,
                    'buca_7'            => $classificaEclettica->buca_7,
                    'buca_8'            => $classificaEclettica->buca_8,
                    'buca_9'            => $classificaEclettica->buca_9,
                    'buca_10'           => $classificaEclettica->buca_10,
                    'buca_11'           => $classificaEclettica->buca_11,
                    'buca_12'           => $classificaEclettica->buca_12,
                    'buca_13'           => $classificaEclettica->buca_13,
                    'buca_14'           => $classificaEclettica->buca_14,
                    'buca_15'           => $classificaEclettica->buca_15,
                    'buca_16'           => $classificaEclettica->buca_16,
                    'buca_17'           => $classificaEclettica->buca_17,
                    'buca_18'           => $classificaEclettica->buca_18,
                    'totale'            => $classificaEclettica->totale,
                    'nota_buche_fatte'  => $classificaEclettica->nota_buche_fatte
                );
//                pre_var_dump($id);
//                pre_var_dump($resultRanking);
                if(!isset($this->_classifiche[$id]))
                    $this->_classifiche[$id] = array();
                if(!in_array($resultRanking, $this->_classifiche[$id]))
                    array_push($this->_classifiche[$id] , $resultRanking);
            }
            
//            array_push($this->_classifiche, $resultRanking);
        }
    }
    
    private function _getClassificheSquadre($single_classifica){
            foreach($single_classifica->ClassificheSquadre as $details){
                foreach($details as $single_detail){
                    $resultRanking = array(
                        
                        'nome-gara' => $single_classifica->nome_classifica,
                        'posizione' => $single_detail->posizione,
                        'id_squadra' => $single_detail->id_squadra,
                        'totale' => $single_detail->totale,
                        'GiocatoriSquadra' => $single_detail->GiocatoriSquadra
                    );
                    if(!isset($this->_classifiche[$single_classifica->id_classifica]))
                        $this->_classifiche[$single_classifica->id_classifica] = array();
                    if(!in_array($resultRanking, $this->_classifiche[$single_classifica->id_classifica]))
                        array_push($this->_classifiche[$single_classifica->id_classifica] , $resultRanking);
                }
//            }
        }
        return ($this->_classifiche);
    }
    
    public function getCompetitionCalendarSingleMonth($year, $month){
        $arguments = array(
            'serial_number' => $this->getSerialNumber(),
            'caller_club_id'=> $this->getClubID(),
            'anno'          => $year,
            'mese'          => $month
        );
        
        $resultCall = $this->_soapClient->__call('GetCalendarioGare', array($arguments));
        $result = $resultCall->GetCalendarioGareResult;
        var_dump($result);
        return ($result->Errore == 'OK') ? 
               ( count($result->Gare->GaraInCalendario) == 1 ) ? array( $result->Gare->GaraInCalendario ) : $result->Gare->GaraInCalendario
                : NULL;
    }
    
    public function getCompetitionCalendarCurrentYear($year){
        $result = array();
        for( $month = 1; $month < 13; $month++ ){
            $res=$this->getCompetitionCalendarSingleMonth($year, $month);
            if($res)
                $result[$month] = $res;
        }
        return $result;
    }
    
    public function getStartHours($competitionID){
        $arguments = $this->_getArgumentsForSingleGara($competitionID);
        $resultCall = $this->_soapClient->__call( 'GetOrarioDiPartenzaSemplificato', array($arguments) );
        $result = $resultCall->GetOrarioDiPartenzaSemplificatoResult;
        return ($result->Errore == 'OK') ? 
                $this->_getFormattedHours($result->OrariDiPartenzaSemplici)  
                : NULL;
    }
    
    
    
    public function getHandicap($competitionID){
        $arguments = $this->_getArgumentsForSingleGara($competitionID);
        $resultCall = $this->_soapClient->__call( 'GetMovimentiHandicapByGara', array($arguments) );
        $result = $resultCall->GetMovimentiHandicapByGaraResult;
        return ($result->Errore == 'OK') ? 
                $result->MovimentiHandicap  
                : NULL;
    }
    
    public function getRanking($competitionID, $modo_gara_id){
        $arguments = $this->_getArgumentsForSingleGara($competitionID);
        $resultCall = $this->_soapClient->__call( 'GetClassifiche', array($arguments) );
        $result = $resultCall->GetClassificheResult;
        
        $rightRankings = array();
        if($result->Errore == 'OK'){
            foreach($result->Classifiche as $key => $classifica){
//                if($modo_gara_id === 2)
//                    pre_var_dump($classifica);
                $rightRankings[$key] = $this->getRightRanking($modo_gara_id, $classifica);
                
            }
//            var_dump($rightRankings);
            return $rightRankings;
        }
        return NULL;
    }
    
    public function getRightRanking($modo_gara_id, $classifica){
        $totalResult = array();
//        pre_var_dump($modo_gara_id);
        if($modo_gara_id == GARA_SINGOLA){ //classifica singola
//            pre_var_dump($modo_gara_id);
            if(gettype($classifica) !== 'object'){
                foreach($classifica as $single_classifica){
                    $this->_getClassificheSingole($single_classifica);
                }
            }
            else{
                $this->_getClassificheSingole($classifica);
            }
            
        }
        elseif($modo_gara_id == GARA_ECLETTICA){ //classifica eclettica
        
//            $classificheEclettiche = $classifica->ClassificheEclettiche;
            foreach($classifica as $classificaEclettica){
//                pre_var_dump($classificaEclettica);
                $this->_getClassificheEclettiche($classificaEclettica);
            }
//            pre_var_dump($this->_classifiche);
        }
        else{ // classifiche a squadre
            foreach($classifica as $single_classifica){
                $this->_getClassificheSquadre($single_classifica);
            }
            
        }
        return $this->_classifiche;
    }
    
    public function getScore($competitionID, $nrTessera, $codice_nominativo, $clubID, $anno, $giro){ 
        $arguments = array(
            "serial_number" => $this->_serialNumber, 
            "caller_club_id" => 732, 
            "gara_id" => $competitionID, 
            "nr_tessera" => $nrTessera, 
            "codice_nominativo" => $codice_nominativo, 
            "club_id" => $clubID, 
            "anno" => $anno, 
            "giro" => $giro
        );
//        var_dump($arguments); 
        $res = $this->_soapClient->__call('GetScore', array($arguments) );
        return $res;
//        pre_var_dump($res);
    }
    
    
    
    public function getClubID(){
        return $this->_clubID;
    }
    public function getSerialNumber(){
        return $this->_serialNumber;
    }
    public function getWSDL(){
        return $this->_WSDL;
    }
}
