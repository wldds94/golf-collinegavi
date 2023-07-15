<? // pre_var_dump($classifica_single_gara); die;?>
<div class="block classifica-eclettica">
    
    <div class="classificaSingolaContainer">
        <h3><?= $classifica_single_gara[$key-1]['nome_gara'] ?></h3>
        <div class="table classifica-eclettica" data-giri="<?= $numGiri ?>" data-gara-id="<?= $competitionID ?>">
            <div class="thead">
                <div class="tr">
                    <div class="th"><span><?= esc_html__('#', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('Nome', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('Hcp', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('1', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('2', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('3', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('4', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('5', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('6', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('7', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('8', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('9', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('10', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('11', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('12', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('13', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('14', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('15', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('16', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('17', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('18', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('Tot', 'golfgavi'); ?></span></div>
                </div>
                <div class="tr">
                    <div class="th"><span><?= esc_html__('', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('', 'golfgavi'); ?></span></div>
                    <div class="th"><span><?= esc_html__('par', 'golfgavi'); ?></span></div>
                    <? foreach($classifica_single_gara[$key-1]['intestazione'] as $par):
//                        var_dump($par);?>
                        
                        <div class="th"><span><?= $par ?></span></div>
                    <?endforeach; ?>
                    <div class="th"><span></span></div>
                </div>
            </div>
            <div class="tbody">
                <?
                foreach($classifica_single_gara as $k => $single_team){?>

                <div class="tr" data-giri="<?= $gara->durata ?>" data-nome-cognome="<?= $single_team['nome'].' '.$single_team['cognome'] ?>" data-nr-tessera="<?= $single_team['nr_tessera'] ?>" data-codice-nominativo="<?= $single_team['codice_nominativo'] ?>" data-anno="<?= $single_team['anno'] ?>" data-giro="1" data-club-id="<?= $single_team['club_id'] ?>">
                    <div class="td"><span><?= $single_team['posizione'] ?></span></div>
                    <div class="td"><span><a onclick="call_show_score(this)" href="javascript: void(0)"><?= $single_team['nome'].' '.$single_team['cognome'] ?></a></span></div>
                    <div class="td"><span><?= $single_team['ex_hcp'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_1'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_2'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_3'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_4'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_5'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_6'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_7'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_8'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_9'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_10'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_11'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_12'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_13'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_14'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_15'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_16'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_17'] ?></span></div>
                    <div class="td"><span><?= $single_team['buca_18'] ?></span></div>
                    <div class="td"><span><?= $single_team['totale'].' '. $single_team['nota_buche_fatte'] ?></span></div>
                    
                </div>
                <? } ?>
            </div>
        </div>
    </div>
</div>

