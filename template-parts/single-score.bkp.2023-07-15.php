<?

//pre_var_dump($singleScore);
?>

<div class="single-score">
    <div class="back">back</div>
    <h3><?= htmlspecialchars($nome) ?></h3>
    <div class="table single-score" data-gara-id="<?= $competitionID ?>">
        <div class="thead">
            <div class="tr">
                <div class="th"><span><?= esc_html__('Buca', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Metri', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Par', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Colpi', 'golfgavi'); ?></span></div>
                <div class="th"><span><?= esc_html__('Colpi tirati', 'golfgavi'); ?></span></div>
            </div>
        </div>
        <div class="tbody">
            <?
            foreach($singleScore as $k => $single_score){?>
            
            <div class="tr">
                <div class="td"><span><?= $single_score->buca ?></span></div>
                <div class="td"><span><?= $single_score->metri ?></span></div>
                <div class="td"><span><?= $single_score->par_percorso ?></span></div>
                <div class="td"><span><?= $single_score->colpi ?></span></div>
                <div class="td"><span><?= $single_score->colpi_tirati ?></span></div>
            </div>
            <? } ?>
        </div>
    </div>

</div>