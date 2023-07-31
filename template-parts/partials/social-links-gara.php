<?
//var_dump($orari);
//var_dump($classifica);
//var_dump($handicaps);
//var_dump($documento);

?><ul class="social-links " data-giri="<?= $gara->durata ?>" data-competition-id="<?= $competitionID ?>" data-modo-id="<?= $modo_gara_id ?>">
    <div class="liContainer <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
        <li class="<?= (isset($evidence) && true === $evidence) ? 'first' : '' ?> calendar <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
            <a title="<?= esc_attr__('orari di partenza', 'golfgavi') ?>">
                <!-- <i class="qode_icon_font_awesome fa fa-regular fa-clock"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
            </a>
        </li><span><?= esc_html__('orari di partenza', 'golfgavi') ?></span>
    </div>
    <div class="liContainer <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
        <li class="<?= (isset($evidence) && true === $evidence) ? 'first' : '' ?> ranking <?= (!isset($classifica)) ? 'disabled' : 'enabled' ?>">
            <a title="<?= esc_attr__('classifiche', 'golfgavi') ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
            </a>
        </li><span><?= esc_html__('classifiche', 'golfgavi') ?></span>
    </div>
    <div class="liContainer <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
        <li class="<?= (isset($evidence) && true === $evidence) ? 'first' : '' ?> handicap <?= (!isset($handicaps)) ? 'disabled' : 'enabled' ?>">
            <a title="<?= esc_attr__('handicap', 'golfgavi') ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 66.8-34.1 125.6-85.8 160H85.8C34.1 317.6 0 258.8 0 192C0 86 86 0 192 0S384 86 384 192zM242.1 256.6c0 18.5-15 33.5-33.5 33.5c-4.9 0-9.1 5.1-5.4 8.4c5.9 5.2 13.7 8.4 22.1 8.4c18.5 0 33.5-15 33.5-33.5c0-8.5-3.2-16.2-8.4-22.1c-3.3-3.7-8.4 .5-8.4 5.4zm-52.3-49.3c-4.9 0-9.1 5.1-5.4 8.4c5.9 5.2 13.7 8.4 22.1 8.4c18.5 0 33.5-15 33.5-33.5c0-8.5-3.2-16.2-8.4-22.1c-3.3-3.7-8.4 .5-8.4 5.4c0 18.5-15 33.5-33.5 33.5zm113.5-17.5c0 18.5-15 33.5-33.5 33.5c-4.9 0-9.1 5.1-5.4 8.4c5.9 5.2 13.7 8.4 22.1 8.4c18.5 0 33.5-15 33.5-33.5c0-8.5-3.2-16.2-8.4-22.1c-3.3-3.7-8.4 .5-8.4 5.4zM96 416c0-17.7 14.3-32 32-32h64 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H240c-8.8 0-16 7.2-16 16v16c0 17.7-14.3 32-32 32s-32-14.3-32-32V464c0-8.8-7.2-16-16-16H128c-17.7 0-32-14.3-32-32z"/></svg>
            </a>
        </li><span><?= esc_html__('handicap', 'golfgavi') ?></span>
    </div>
    <div class="liContainer <?= (!isset($orari)) ? 'disabled' : 'enabled' ?>">
        <li class="<?= (isset($evidence) && true === $evidence) ? 'first' : '' ?> document <?= (!isset($documento)) ? 'disabled' : 'enabled' ?>">
            <a target="_blank" <? if(isset($documento)): ?>href="<?= $documento ?>" <? endif; ?> title="<?= esc_attr__('premiati',  'golfgavi') ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M251.708 169.46c-.485 0-.966.014-1.447.034-12.824.67-25.086 4.307-36.023 10.566-12.132-6.798-25.97-10.422-40.164-10.422-25.995 0-50.743 12.422-66.19 33.22a27.893 27.893 0 0 0-2.692 4.436 28.3 28.3 0 0 0-2.654 3.83c-21.73 37.764-9.952 86.074 26.79 109.97a78.612 78.612 0 0 0 3.566 2.185c-.146 12.373 2.536 24.692 8.023 36.193a26.82 26.82 0 0 0 2.635 4.423 27.31 27.31 0 0 0 2.102 4.074c6.928 11.085 16.46 20.265 27.608 26.858v.245c0 43.48 33.953 79.652 77.308 82.37.587.033 1.167.054 1.748.054 1.102 0 2.194-.068 3.29-.185 1.085.13 2.18.185 3.287.185.52 0 1.044-.014 1.562-.04 43.396-2.438 77.4-38.462 77.563-82.09 10.825-6.26 20.128-14.954 27.233-25.622a27.203 27.203 0 0 0 2.458-4.525 27.053 27.053 0 0 0 2.525-4.082c5.973-11.835 8.887-24.946 8.66-38.092.233-.144.46-.273.704-.424 37.267-22.414 50.802-70.157 30.742-108.66a25.666 25.666 0 0 0-2.76-4.272 28.628 28.628 0 0 0-2.333-4.177c-15.22-22.42-40.666-35.82-68.076-35.82-14.388 0-28.48 3.734-40.91 10.833-11.03-6.41-23.493-10.26-36.325-11.01a33.17 33.17 0 0 0-1.638-.047c-1.106 0-2.194.06-3.293.19-1.102-.14-2.194-.2-3.296-.2z" fill="#FFF"/><path d="M161.624 305.855a55.86 55.86 0 0 1-16.778-6.338c-25.517-14.717-34.867-46.716-21.83-72.72 2.027 1.367 13.91 7.56 16.64 15.696l5.733 3.3.012-.01c-2.458 11.437 2.582 23.65 13.275 29.805 13.265 7.67 30.25 3.13 37.91-10.152 7.656-13.268 3.11-30.25-10.18-37.907-10.65-6.162-23.733-4.432-32.42 3.394l-.007-.017h.008l-5.72-3.31c-8.41 1.688-19.706-5.493-21.916-6.584 16.005-24.262 48.384-32.14 73.883-17.41a55.392 55.392 0 0 1 13.79 11.248l.06.07c9.48-10.738 23.017-17.773 38.23-18.667-.17 2.465.398 15.828-5.282 22.27l.03 6.613c-11.137 3.604-19.182 14.065-19.182 26.403 0 15.322 12.425 27.744 27.75 27.744 15.322 0 27.746-12.422 27.746-27.745 0-12.314-8.023-22.782-19.143-26.395l-.008-.01h.008l.022-6.613c-5.69-6.442-5.1-19.805-5.272-22.27H259c15.086.91 28.738 8.042 38.17 18.648a56.265 56.265 0 0 1 13.856-11.3c25.527-14.744 57.907-6.84 73.92 17.453-2.236 1.078-13.5 8.25-21.936 6.572l-5.714 3.306v.017c-8.675-7.852-21.764-9.593-32.45-3.42-13.25 7.656-17.812 24.638-10.146 37.906 7.66 13.282 24.616 17.823 37.896 10.152 10.67-6.154 15.7-18.332 13.27-29.77l.02-.016v.016l5.737-3.293c2.735-8.134 14.595-14.32 16.65-15.7 12.992 25.998 3.643 57.974-21.86 72.69a55.427 55.427 0 0 1-16.81 6.354l.073.032c4.546 13.542 3.855 28.775-2.976 42.382-2.035-1.377-13.913-7.564-16.65-15.7l-5.735-3.303v.015c2.453-11.438-2.575-23.65-13.257-29.81-13.285-7.666-30.244-3.124-37.915 10.153-7.657 13.265-3.124 30.24 10.154 37.912 10.666 6.157 23.736 4.42 32.42-3.396l.036.012h-.02l5.71 3.313c8.425-1.672 19.712 5.49 21.935 6.588-8.387 12.71-21.26 20.923-35.288 23.742l.02-.072a55.508 55.508 0 0 1 2.897 17.762c0 29.458-23.007 53.535-52.008 55.28h-.02c.175-2.466-.416-15.83 5.273-22.28l-.022-6.596h-.007l.008-.02c11.12-3.62 19.144-14.07 19.144-26.385 0-15.334-12.424-27.747-27.745-27.747-15.326 0-27.75 12.413-27.75 27.746 0 12.33 8.044 22.802 19.182 26.403l-.03 6.597c5.68 6.45 5.11 19.813 5.282 22.278-29.04-1.718-52.067-25.807-52.067-55.28 0-6.195 1.018-12.16 2.888-17.732l-.074.028c-13.996-2.858-26.824-11.076-35.184-23.77 2.206-1.08 13.503-8.26 21.918-6.574l5.708-3.312v-.017c8.7 7.85 21.774 9.596 32.464 3.43 13.275-7.672 17.82-24.648 10.152-37.913-7.65-13.277-24.64-17.82-37.905-10.152-10.676 6.158-15.71 18.345-13.276 29.772l-.007.012-.02-.013-5.717 3.295c-2.756 8.128-14.608 14.328-16.667 15.693h.015c-6.828-13.64-7.542-28.757-2.95-42.338l.034-.052z" fill="#f18500"/></svg>
            </a>
        </li><span><?= esc_html__('premiati', 'golfgavi') ?></span>
    </div>
</ul>