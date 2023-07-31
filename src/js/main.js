import './../scss/style.scss'

import $ from 'jquery';

console.log('Start')

var globalPosition = 0;
var onchange = function () {

    $('.select-date').addClass('active');
    $('.listCompetitionContainer').addClass('disabled');
    //        $('.garaContainer.first').prependTo(".listCompetitionContainer");

    var $formData = {
        action: 'update_competitions',
        anno: $('select[name=anno]').val(),
        mese: $('select[name=mese]').val()
    };
    $.ajax({
        url: golfgavi_vars?.ajax_url,
        type: 'post',
        data: $formData,
        success: function (result) {
            $('.listCompetitionContainer').html(result).removeClass('disabled');
            $('#load-more').show();
            $('.garaContainer.first').prependTo('.listCompetitionContainer');
            // $('.gara').hide();
            $('.select-date').removeClass('active');
            // size = $(".gara").size();
            // step = 5;
            // $('.gara:lt('+step+')').show();


            $('#gare').on('click', '.liContainer.enabled', function (e) {

                var li = $(this).find('li');
                if (li.hasClass('disabled')) {
                    return
                }

                if (!li.hasClass('document')) {
                    e.preventDefault()
                    e.stopImmediatePropagation()
                }

                globalPosition = $(this).offset().top - 350;
                console.log(globalPosition);
                var competitionID = $(this).parent().attr('data-competition-id');
                var modoGaraID = $(this).parent().data('modo-id');
                console.log(modoGaraID);
                var numGiri = $(this).parent().data('giri');
                // const $this = $(this);
                if (li.hasClass('calendar')) {
                    $formData = {
                        action: 'show_hours',
                        competitionID: competitionID,
                    };
                }
                if (li.hasClass('ranking')) {
                    $formData = {
                        action: 'show_ranking',
                        competitionID: competitionID,
                        modoGaraId: modoGaraID,
                        numGiri: numGiri
                    };
                }
                if (li.hasClass('handicap')) {
                    $formData = {
                        action: 'show_hcp',
                        competitionID: competitionID,
                    };
                }
                if (li.hasClass('calendar') || li.hasClass('ranking') || li.hasClass('handicap')) {
                    $.ajax({
                        url: golfgavi_vars?.ajax_url,
                        type: 'post',
                        data: $formData,
                        success: function (result) {
                            $('#request-panel').find('.panel-container').html(result);
                            $('body').addClass('request-panel-open');
                            $('.close').click(function () {
                                $('body').removeClass('request-panel-open');
                            });
                            $('.overlay').click(function (e) {
                                $('body').removeClass('request-panel-open');
                            }).children().click(function (e) {
                                return false;
                            });
                            ;

                        },
                    });
                }


            });
        },
    });
};

$('.select-date select[name="mese"]').on('change', onchange)
$('.select-date select[name="mese"]').trigger('change');
$('.select-date select[name="anno"]').on('change', onchange)

/**
 * 
 * FUNCTIONS
*/
var call_show_score = function (e) {

    var tr = $(this).parent('span').parent('.td').parent('.tr');
    var table = tr.parent('.tbody').parent('.table');
    var prev = $(table).parent('.classificaSingolaContainer');
    var $formData = {
        action: 'show_single_score',
        competitionID: table.attr('data-gara-id'),
        nrTessera: tr.attr('data-nr-tessera'),
        codiceNominativo: tr.attr('data-codice-nominativo'),
        anno: tr.data('anno'),
        giro: tr.data('giro'),
        clubID: tr.data('club-id'),
        name: $(this).html(),
        numGiri: table.data('giri')
    };

    const elementScore = $(tr).find('.scoreSingleContainerRequest')

    $.ajax({
        url: golfgavi_vars?.ajax_url,
        type: 'post',
        data: $formData,
        success: function (result) {
            $(elementScore).html(result);
            $(elementScore).addClass('panel-open')
            // var elementScore = $('.scoreContainer');
            // var elementRanking = $(table).parent('.classificaSingolaContainer').parent('.block').parent('.single-table').find('.block.classifica-singola');
            // var scrollTop = $('.overlay').scrollTop();

            // slideAwayAndChangeContentPanel(elementScore, 'away', result, '.single-table', scrollTop);
            $('#request-panel').on('click', '.back', function () {
                const elementScoreBackContainer = $(this).parent('.single-score').parent('.td') // .find('.scoreSingleContainerRequest')
                $(elementScoreBackContainer).removeClass('panel-open')
                $(elementScoreBackContainer).html('')
            });
        }
    });
}

$(document).on('click', '.call_show_score', call_show_score)

/** CUSTOM SELECT */
$('select').each(function () {
    var $this = $(this), numberOfOptions = $(this).children('option').length;

    $this.addClass('select-hidden');
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option:selected').text());

    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);

    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
        if ($this.children('option').eq(i).is(':selected')) {
            $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
        }
    }

    var $listItems = $list.children('li');

    $styledSelect.click(function (e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function () {
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });

    $listItems.click(function (e) {
        console.log("click item");
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.find('li.is-selected').removeClass('is-selected');
        $list.find('li[rel="' + $(this).attr('rel') + '"]').addClass('is-selected');
        $list.hide();
        $this.trigger('change')
        //console.log($this.val());
    });

    $(document).click(function () {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});