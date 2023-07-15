<?
//pre_var_dump($orari);
?>
<div class="orari orari-gara">
    <!--<div class="close"></div>-->
    <div class="table orari-gara">
        <div class="thead">
            <div class="tr">
                <div class="th"><span><?= esc_html__('Ora', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Tee', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('', 'golfgavi'); ?></span></div>
            </div>
        </div>
        <div class="tbody">
            <? 
            $playersArray = array();
            foreach($orari as $ora => $single_row){
                if(!isset($playersArray[$ora]))
                        $playersArray[$ora] = array();
                foreach($single_row as $key => $player){
//                    echo $player->tee_partenza;
                    if(!isset($playersArray[$ora][$player->tee_partenza]))
                        $playersArray[$ora][$player->tee_partenza] = array();
                    array_push($playersArray[$ora][$player->tee_partenza], $player);
                }
                
                
            }
//            pre_var_dump($playersArray); die;
            $oraTemp = 0;
            foreach($playersArray as $ora => $tees){
                foreach($tees as $teeIndex => $tee){
                    $otherHour = ($oraTemp !== $ora);
                    if($otherHour) $oraTemp = $ora;?>
            <div class="tr">
                <div class="td"><span><?= $otherHour ? $ora : '' ?></span></div>
                <div class="td"><span><?= $teeIndex ?></span></div>
                <div class="td"><span><? foreach($tee as  $key => $player){ 
                    echo ($key != 0) ? ' <br> ' : '';
                    echo $player->nome.' '.$player->cognome.' '.$player->pl_hcp; } ?>
               </span></div>
            </div>
            <?      } ?>
            <?  } ?>
        </div>
    </div>    
</div>
