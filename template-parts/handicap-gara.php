<?
//pre_var_dump($hcp);
?>
<div class="handicap handicap-gara">
    <!--<div class="close"></div>-->
    <div class="table handicap-gara">
        <div class="thead">
            <div class="tr">
                <div class="th"><span><?= esc_html__('Nome', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Circolo', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Var', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Old', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('New', 'golfgavi'); ?></span></div>
            </div>
        </div>
        <div class="tbody">
            <?
//            pre_var_dump();
            if(is_array($hcp->MovimentoHandicap)){
                foreach($hcp->MovimentoHandicap as $single_hcp){
    //               foreach($hcps as $single_hcp){?>
                    <div class="tr">
                        <div class="td"><span><?= $single_hcp->nome. ' '. $single_hcp->cognome ?></span></div>
                        <div class="td"><span><?= $single_hcp->club_name ?></span></div>
                        <div class="td"><span><?= round(($single_hcp->ex_hcp_aggiornato) - ($single_hcp->ex_hcp_precedente), 1) ?></span></div>
                        <div class="td"><span><?= $single_hcp->ex_hcp_precedente ?></span></div>
                        <div class="td"><span><?= $single_hcp->ex_hcp_aggiornato ?></span></div>
                    </div>
                <? // } 
                } ?>
            <?} 
            else{ ?>
            <div class="tr">
                <div class="td"><span><?= $hcp->MovimentoHandicap->nome. ' '. $hcp->MovimentoHandicap->cognome ?></span></div>
                <div class="td"><span><?= $hcp->MovimentoHandicap->club_name ?></span></div>
                <div class="td"><span><?= round(($hcp->MovimentoHandicap->ex_hcp_aggiornato) - ($hcp->MovimentoHandicap->ex_hcp_precedente), 1) ?></span></div>
                <div class="td"><span><?= $hcp->MovimentoHandicap->ex_hcp_precedente ?></span></div>
                <div class="td"><span><?= $hcp->MovimentoHandicap->ex_hcp_aggiornato ?></span></div>
            </div>
                
            <? } ?>
        </div>
    </div>    
</div>
