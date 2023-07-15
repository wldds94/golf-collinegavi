<?
//pre_var_dump($classifica_single_gara);
?>
<div class="classifica-squadre">
    <!--<div class="close"></div>-->
    <h3><?= $classifica_single_gara[0]['nome-gara'] ?></h3>
    <div class="table classifica-squadre">
        <div class="thead">
            <div class="tr">
                <div class="th"><span><?= esc_html__('Ranking', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Team', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Score', 'golfgavi'); ?></span></div>
            </div>
        </div>
        <div class="tbody">
            <?
            foreach($classifica_single_gara as $k => $single_team){?>
            <div class="tr">
                <div class="td"><span><?= $single_team['posizione'] ?></span></div>
                <div class="td"><span><? foreach($single_team['GiocatoriSquadra']->GiocatoreSquadra as  $player){ 
                    echo $player->nome.' '.$player->cognome.' ('.$player->pl_hcp.') '.$player->jun_sen.' '.$player->ladies.'<br/>'  ; } ?>
                </span></div>
                <div class="td">
                    <span><?= $single_team['totale']?></span>
                </div>
            </div>
            <? } ?>
        </div>
    </div>
    
</div>
