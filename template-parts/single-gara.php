<?  //var_dump($gara); 
$dateObj   = DateTime::createFromFormat('d-m-Y', $gara->data);
if($evidence) echo '<h3>'.esc_html__('Ultima gara', 'golfgavi').':</h3>'; ?>
<article class="gara <?= $evidence ? 'first' : '' ?>" data-giri="<?= $gara->durata ?>">
    <div class="textSection">
        <div class="titleSection">
            <? if($linkedPost): ?>
            <h2 class="link"><a href='<?= get_permalink($linkedPost[0]->ID) ?>'><?= esc_html__(($dateObj->format('l'))).' '.' '.$gara->data.' '.$linkedPost[0]->post_title ?></a></h2>
            <? else: ?>
            <h2><?= esc_html__(($dateObj->format('l'))).' '.$gara->data ?> <?= $gara->nome_gara ?></h2>
            <? endif; ?>
        </div>
        <div class="content">
            <p><?= $gara->modo_gara_desc.'. '.$gara->descrizione_regolamento.'. Durata '.$gara->durata. (($gara->durata > 1) ? ' giri' : ' giro')?></p>
        </div>
    </div>
    <footer>
        <?php include(locate_template('parts/social-links-gara.php')) ?>
    </footer>
</article>
<? if($evidence) echo '<h3 class="bottom">'.esc_html__('Altre gare del mese', 'golfgavi').':</h3>';