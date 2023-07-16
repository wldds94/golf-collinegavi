
<div class="block classifica-singola">
    
    <div class="classificaSingolaContainer">
        <h3><?= $classifica_single_gara[0]['nome_gara'] ?></h3>
        <div class="table classifica-singola" data-giri="<?= $numGiri ?>" data-gara-id="<?= $competitionID ?>">
            <div class="thead">
                <div class="tr">
                    <div class="th"><span><?= esc_html__('#', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('Nome', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('Circolo', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('Sex', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('Cat', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('Score', 'golfgavi'); ?></span></div>
                </div>
            </div>
            <div class="tbody">
                <?
                foreach($classifica_single_gara as $k => $single_team){?>

                <div class="tr" data-giri="<?= isset($gara) ? $gara->durata : "" ?>" data-nome-cognome="<?= $single_team['nome'].' '.$single_team['cognome'] ?>" data-nr-tessera="<?= $single_team['nr_tessera'] ?>" data-codice-nominativo="<?= $single_team['codice_nominativo'] ?>" data-anno="<?= $single_team['anno'] ?>" data-giro="1" data-club-id="<?= $single_team['club_id'] ?>">
                    <div class="td"><span><?= $single_team['posizione'] ?></span></div>
                    <?php /* <div class="td"><span><a onclick="call_show_score(this)" href="javascript: void(0)"><?= $single_team['nome'].' '.$single_team['cognome'] ?></a></span></div> */ ?>
                    <div class="td"><span><a class="call_show_score" href="javascript:void(0)"><?= $single_team['nome'].' '.$single_team['cognome'] ?></a></span></div>
                    <div class="td"><span><?= $single_team['club_name'] ?></span></div>
                    <div class="td"><span><?= $single_team['ladies'] ?></span></div>
                    <div class="td"><span><?= $single_team['jun_sen'] ?></span></div>
                    <div class="td"><span><?= $single_team['totale'] ?></span></div>
                    <div class="td scoreSingleContainerRequest"></div>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
</div>

