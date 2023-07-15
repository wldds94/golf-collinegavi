<?php
namespace GolfGavi\Base;

use GolfGavi\Libs\GesGolfManager;

class Ajax extends Base
{
    public function __construct() {
        // $this->GesGolfLibs = new GesGolfManager(CLUB_ID, SERIAL_NUMBER_ID, WSDL_URL);
        
    }

    public function register()
    {
        // add_action( 'wp_enqueue_scripts', array( $this, 'golfgavi_scripts' ) );
        add_action( 'wp_ajax_update_competitions', array( $this, 'update_competitions_callback' ) );
        add_action( 'wp_ajax_nopriv_update_competitions', array( $this, 'update_competitions_callback' ) );

        add_action( 'wp_ajax_show_ranking', array( $this, 'show_ranking_callback' ) );
        add_action( 'wp_ajax_nopriv_show_ranking', array( $this, 'show_ranking_callback' ) );

        // add_action( 'wp_ajax_show_single_score', 'show_single_score_callback' );
        // add_action( 'wp_ajax_nopriv_show_single_score', 'show_single_score_callback' );

        add_action( 'wp_ajax_show_hours', array( $this, 'show_hours_callback' ) );
        add_action( 'wp_ajax_nopriv_show_hours', array( $this, 'show_hours_callback' ) );

        // add_action( 'wp_ajax_show_hcp', 'show_hcp_callback' );
        // add_action( 'wp_ajax_nopriv_show_hcp', 'show_hcp_callback' );
    }

    public function show_hours_callback(){
        if(isset($_POST['competitionID'])){
            $gesGolf = new GesGolfManager(CLUB_ID, SERIAL_NUMBER_ID, WSDL_URL);
            $competitionID = $_POST['competitionID'];
            
            $orari = $gesGolf->getStartHours($competitionID);
            
            if(isset($orari)){
                include(locate_template('template-parts/orari-gara.php'));
            }
            wp_die();
        }
    }

    public function show_ranking_callback(){
        // var_dump($_POST);
        if(isset($_POST['competitionID']) && isset($_POST['modoGaraId'])){
            $gesGolf = new GesGolfManager(CLUB_ID, SERIAL_NUMBER_ID, WSDL_URL);
            $competitionID = $_POST['competitionID'];
            $modo_gara_id = $_POST['modoGaraId'];
            $numGiri = '1';
            if(isset($_POST['numGiri'])) {
                $numGiri = $_POST['numGiri'];
            }
            
            $classifica = $gesGolf->getRanking($competitionID, $modo_gara_id);
            
            if(isset($classifica['Classifica'])){
                
                foreach($classifica['Classifica'] as $key => $classifica_single_gara){
                    echo '<div class="single-table clearfix">';
                    if ($modo_gara_id == GARA_SINGOLA){
                        include(locate_template('template-parts/classifica-singola.php'));
                    }
                    elseif ($modo_gara_id == GARA_ECLETTICA){
                        // pre_var_dump($classifica);
                        include(locate_template('template-parts/classifica-eclettica.php'));
                    }
                    else {
                        include(locate_template('template-parts/classifica-squadre.php'));
                    }
                    echo '</div>';
                }
                echo '<div class="scoreContainer"></div>';
            }
            wp_die();
        }
    }

    public function update_competitions_callback() {
        if(isset($_POST['anno']) && isset($_POST['mese'])){
            $anno = $_POST['anno'];
            $mese = $_POST['mese'];

            $gesGolf = new GesGolfManager(CLUB_ID, SERIAL_NUMBER_ID, WSDL_URL);
            $gare = $gesGolf->getCompetitionCalendarSingleMonth( $anno, $mese );
        
            if(count($gare)>0){
                $ids= array();
                
                foreach($gare as $gara){
                    $competitionID = $gara->gara_id;
                    $dateObj   = \DateTime::createFromFormat('d-m-Y', $gara->data);
                    $modo_gara_id = $gara->modo_gara_id;
                    $classifica = $gesGolf->getRanking($competitionID, $modo_gara_id);
                    $orari = $gesGolf->getStartHours($competitionID);
                    if(isset($classifica)) $ids[]=array($competitionID => array($modo_gara_id => $gara) );
                    $handicaps = $gesGolf->getHandicap($competitionID);
                    $documento = ($gara->link_documento != '') ? GESGOLF_BASE_URL.  str_replace('..','',$gara->link_documento) : NULL;
                    $arguments= array(
                        'post_type'  => 'gara',
                        'meta_key'   => 'id_gesgolf',
                        'meta_value' => $competitionID
                    );
                    
                    $linkedCompetitions = new \WP_Query($arguments);
                    $linkedPost = $linkedCompetitions->posts;
                    echo '<div class="garaContainer">';
                    include(locate_template('template-parts/single-gara.php'));
                    echo '</div>';
                    
                }
                if(isset($ids) && count($ids)>0){
                    $lastCompetition = array_pop($ids);
                    $competitionID = (array_keys($lastCompetition)[0]);
                    // var_dump($competitionID);
                    $orari = $gesGolf->getStartHours($competitionID);
                    $modo_gara_id = (array_keys($lastCompetition[$competitionID])[0]);
                    $classifica = $gesGolf->getRanking($competitionID, $modo_gara_id);
                    $handicaps = $gesGolf->getHandicap($competitionID);
                    $documento = ($gara->link_documento != '') ? GESGOLF_BASE_URL.  str_replace('..','',$gara->link_documento) : NULL;
                    $gara = $lastCompetition[$competitionID][$modo_gara_id];
                    // var_dump($gara);
                    $evidence = true;
                    echo '<div class="garaContainer first">';
                    include(locate_template('template-parts/single-gara.php'));
                    echo '</div>';
                }
    
                wp_die();
            } else{
                echo '<article class="gara"><p>'.esc_html__('Non ci sono gare disponibili in questo mese', 'golfgavi').'</p></article>';
                wp_die();
            }
        }
    }

}