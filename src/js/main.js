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
// $('#load-more').click(function () {
//     step = ( step+5 <= size) ? step+5 : size;

//     $('.gara:lt('+step+')').fadeIn();
//     if( ( step >= size) )
//             $('#load-more').hide();
// });
// $('select').selectOrDie({
//     onChange: onchange(),
//     size: 6
// });
// $('.select-date').on('click', onchange)
$('.select-date select[name="mese"]').on('change', onchange)
$('.select-date select[name="mese"]').trigger('change');

/**
 * 
 * FUNCTIONS
*/
var call_show_score = function (e){
    
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
    
    $.ajax({
        url: golfgavi_vars?.ajax_url,
        type: 'post',
        data: $formData,
        success: function( result ) {
            // var elementScore = $('.scoreContainer');
            // var elementRanking = $(table).parent('.classificaSingolaContainer').parent('.block').parent('.single-table').find('.block.classifica-singola');
            // var scrollTop = $('.overlay').scrollTop();
            
            // slideAwayAndChangeContentPanel(elementScore, 'away', result, '.single-table', scrollTop);
            // $('#request-panel').on('click','.back',function() {
            //     // $('.back').click(function(){
            //     slideAwayAndChangeContentPanel(elementRanking, 'away', prev,'.single-table', scrollTop);
            //     // $('.back').removeClass('visible');
            // });
        }
    });
}

$(document).on('click', '.call_show_score', call_show_score)