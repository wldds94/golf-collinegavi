<?
//var_dump($orari);
//var_dump($classifica);
//var_dump($handicaps);
//var_dump($documento);

?><ul class="social-links " data-giri="<?= $gara->durata ?>" data-competition-id="<?= $competitionID ?>" data-modo-id="<?= $modo_gara_id ?>">
    <div class="liContainer <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
        <li class="<?= (isset($evidence) && true === $evidence) ? 'first' : '' ?> calendar <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
            <a title="<?= esc_attr__('orari di partenza', 'golfgavi') ?>">
                <i class="qode_icon_font_awesome fa fa-regular fa-clock"></i>
            </a>
        </li><span><?= esc_html__('orari di partenza', 'golfgavi') ?></span>
    </div>
    <div class="liContainer <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
        <li class="<?= (isset($evidence) && true === $evidence) ? 'first' : '' ?> ranking <?= (!isset($classifica)) ? 'disabled' : 'enabled' ?>">
            <a title="<?= esc_attr__('classifiche', 'golfgavi') ?>">
                <i class="qode_icon_font_awesome fa fa-solid fa-list"></i>
            </a>
        </li><span><?= esc_html__('classifiche', 'golfgavi') ?></span>
    </div>
    <div class="liContainer <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
        <li class="<?= (isset($evidence) && true === $evidence) ? 'first' : '' ?> handicap <?= (!isset($handicaps)) ? 'disabled' : 'enabled' ?>">
            <a title="<?= esc_attr__('handicap', 'golfgavi') ?>">
                <i class="qode_icon_font_awesome fa fa-regular fa-golf-ball-tee"></i>
            </a>
        </li><span><?= esc_html__('handicap', 'golfgavi') ?></span>
    </div>
    <div class="liContainer <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
        <li class="<?= (isset($evidence) && true === $evidence) ? 'first' : '' ?> document <?= (!isset($documento)) ? 'disabled' : 'enabled' ?>">
            <a target="_blank" <? if(isset($documento)): ?>href="<?= $documento ?>" <? endif; ?> title="<?= esc_attr__('premiati',  'golfgavi') ?>">
                <i class="qode_icon_font_awesome fa fa-regular fa-golf-ball-tee"></i>
            </a>
        </li><span><?= esc_html__('premiati', 'golfgavi') ?></span>
    </div>
</ul>