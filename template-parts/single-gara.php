<?  //var_dump($gara); 
$dateObj   = \DateTime::createFromFormat('d-m-Y', $gara->data);
if(isset($evidence) && true === $evidence) echo '<h3>'.esc_html__('Ultima gara', 'golfgavi').':</h3>'; ?>
<article class="gara <?php echo esc_attr( (isset($evidence) && true === $evidence) ? 'first' : '' ); ?>" data-giri="<?php echo esc_attr( $gara->durata ) ?>">
    <div class="textSection">
        <div class="titleSection">
            <div>
                <span class="date-gara">
                    <span class="day"><?php echo esc_html__(($dateObj->format('d'))) ?></span>
                    <span class="month"><?php echo esc_html__(($dateObj->format('M'))) ?></span>
                </span>
            </div>
            <div>
                <? if($linkedPost): ?>
                    <h2 class="link"><a href='<?php echo get_permalink($linkedPost[0]->ID) ?>'><?php echo esc_html__(($dateObj->format('l'))).' '.' '.$gara->data.' '.$linkedPost[0]->post_title ?></a></h2>
                <? else: ?>
                    <h2><?php echo esc_html__($gara->nome_gara) ?></h2>
                <? endif; ?>
                <div class="content-gara">
                    <p>
                        <?php echo esc_html__($gara->modo_gara_desc) ?><br>
                        <?php echo esc_html__($gara->descrizione_regolamento) ?><br>
                        <?php echo esc_html__("Durata " . $gara->durata . (($gara->durata > 1) ? ' giri' : ' giro')) ?>
                        <?php // echo esc_html( $gara->modo_gara_desc.'. '.$gara->descrizione_regolamento.'. Durata '.$gara->durata. (($gara->durata > 1) ? ' giri' : ' giro') ); ?></p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include(locate_template('template-parts/partials/social-links-gara.php')) ?>
    </footer>
</article>
<? if(isset($evidence) && true === $evidence) echo '<h3 class="bottom">'.esc_html__('Altre gare del mese', 'golfgavi').':</h3>';