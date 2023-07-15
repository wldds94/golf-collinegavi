<?php
/**
 * Template Name: Gare
 *
 */

$id = bridge_qode_get_page_id();
$sidebar = get_post_meta($id, "qode_show-sidebar", true);  

$enable_page_comments = false;
if(get_post_meta($id, "qode_enable-page-comments", true) == 'yes') {
	$enable_page_comments = true;
}

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <?php
        $bridge_qode_is_IE = bridge_qode_return_is_ie_variable();

        if ( ! empty( $bridge_qode_is_IE ) && $bridge_qode_is_IE ) { ?>
            <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <?php } ?>

        <?php
        /**
         * bridge_qode_header_meta hook
         *
         * @see bridge_core_header_meta() - hooked with 10
         * @see bridge_qode_user_scalable_meta() - hooked with 10
         */
        do_action('bridge_qode_action_header_meta');
        ?>

        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <?php wp_head(); ?>

    </head>

<body <?php body_class(); ?>>
<div class="wrapper">
    <div class="wrapper_inner">

        <?php do_action('bridge_qode_action_after_wrapper_inner'); ?>

        <div class="content content_top_margin_none">
            <div class="content_inner">

                <?php get_template_part( 'title' ); ?>

                <div class="full_width"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
                    <div class="full_width_inner">

                        <div class="tmpl-gare" >
                            <div id="gare" class="container">
                                <div class="select-date">
                                    <label style="color:#691a0f!important"><?= esc_html__( "Seleziona data" ) ?></label>
                                    <select data-placeholder="mese" name="mese">
                                        <?php for ($month = 1; $month < 13; $month++) {
                                            $dateObj = DateTime::createFromFormat("!m", $month);
                                            $monthName = $dateObj->format("F");
                                            echo '<option name="mese" value="' . $month . '" ' . selected($month, (int) date("m")) . ">" .
                                                esc_html($monthName) .
                                                "</option>";
                                        } ?>
                                    </select>               
                                    <select data-placeholder="anno" name="anno">
                                        <?php for ( $year = 2016; $year <= (int) date("Y"); $year++ ) {
                                            echo '<option name="anno" value="' . $year . '" ' . selected($year, (int) date("Y")) . ">" .
                                                $year .
                                                "</option>";
                                        } ?>
                                    </select>
                                </div>

                                <div class="listCompetitionContainer">
                                    <?php
                                    $post_type = $post->post_type;
                                    $args = [
                                        "post_type" => $post_type,
                                        "posts_per_page" => 5,
                                        "paged" => 1,
                                    ];
                                    $the_query = new WP_Query($args);

                                    wp_localize_script("ajax-pagination", "ajaxPagination", [
                                        "ajaxurl" => admin_url("admin-ajax.php"),
                                        "queryVars" => json_encode($the_query->query_vars),
                                        "count" => 0,
                                    ]);

                                    wp_enqueue_script("ajax-pagination");
                                    ?>
                                </div>
                                                
                            </div>
                                            
                        </div> <!-- .tmpl-gare -->
                    
                    
                    </div> <!-- .full_width_inner -->
                </div> <!-- .full_width -->

            </div> <!-- .content_inner -->
        </div> <!-- .content.content_top_margin_none -->

    </div><!-- .wrapper_inner -->
</div> <!-- .wrapper -->

<?php wp_footer(); ?>
<?php // get_footer(); ?>
</body>
</html>



<?php /* get_header(); ?>
    <?php // get_template_part("title"); ?>
    <div class="tmpl-gare" >
        <div id="gare" class="container">
            <div class="select-date">
                <label style="color:#691a0f!important"><?= esc_html__(
                    "Seleziona data"
                ) ?></label>
                <select data-placeholder="mese" name="mese">
                    <?php for ($month = 1; $month < 13; $month++) {
                        $dateObj = DateTime::createFromFormat("!m", $month);
                        $monthName = $dateObj->format("F");
                        echo '<option name="mese" value="' .
                            $month .
                            '" ' .
                            selected($month, (int) date("m")) .
                            ">" .
                            esc_html($monthName) .
                            "</option>";
                    } ?>
                </select>               
                <select data-placeholder="anno" name="anno">
                    <?php for (
                        $year = 2016;
                        $year <= (int) date("Y");
                        $year++
                    ) {
                        echo '<option name="anno" value="' .
                            $year .
                            '" ' .
                            selected($year, (int) date("Y")) .
                            ">" .
                            $year .
                            "</option>";
                    } ?>
                </select>
            </div>

            <div class="listCompetitionContainer">
                <?php
                $post_type = $post->post_type;
                $args = [
                    "post_type" => $post_type,
                    "posts_per_page" => 5,
                    "paged" => 1,
                ];
                $the_query = new WP_Query($args);

                wp_localize_script("ajax-pagination", "ajaxPagination", [
                    "ajaxurl" => admin_url("admin-ajax.php"),
                    "queryVars" => json_encode($the_query->query_vars),
                    "count" => 0,
                ]);

                wp_enqueue_script("ajax-pagination");
                ?>
            </div>
                            
        </div>
                        
    </div>
<?php get_footer(); ?>

	<?php /* get_header(); ?>
        <?php get_template_part( 'title' ); ?>
        <div class="tmpl-gare" >
            <div class="container"<?php if($bridge_qode_background_color != "") { echo " style='background-color:". $bridge_qode_background_color ."'";} ?>>
                <?php if(isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') {?>
                    <div class="overlapping_content"><div class="overlapping_content_inner">
                <?php } ?>
                <div class="container_inner default_template_holder clearfix page_container_inner" <?php bridge_qode_inline_style($bridge_qode_content_style_spacing); ?>>
                    <?php do_action( 'bridge_qode_action_after_container_inner_open' ); ?>
                    <div class="column_inner">
                        <p>Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione. È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva versioni del Lorem Ipsum.</p>
                    
                        <div id="gare" class="container">
                            <div class="select-date">
                                <label style="color:#691a0f!important"><?= esc_html__('Seleziona data') ?></label>
                                <select data-placeholder="mese" name="mese">
                                    <?php for($month = 1; $month < 13; $month++){
                                        $dateObj   = DateTime::createFromFormat('!m', $month);
                                        $monthName = $dateObj->format('F');
                                        echo '<option name="mese" value="'. $month .'" ' . selected( $month, (int) date('m') ) . '>' . esc_html($monthName).'</option>';
                                    } ?>
                                </select>
                                <select data-placeholder="anno" name="anno">
                                    <?php for($year = 2016; $year <= (int)(date('Y')); $year++){
                                        echo '<option name="anno" value="'.$year.'" '.  selected($year, (int)date('Y')).'>'.$year.'</option>';
                                    } ?>
                                </select>
                            </div>

                            <div class="listCompetitionContainer">

                                <?php
                                $post_type = $post->post_type;
                                    $args = array(
                                            'post_type' => $post_type,
                                            'posts_per_page' => 5,
                                            'paged' => 1
                                    );
                                $the_query = new WP_Query($args);

                                wp_localize_script( 'ajax-pagination', 'ajaxPagination', array(
                                    'ajaxurl' => admin_url( 'admin-ajax.php' ),
                                    'queryVars' => json_encode($the_query->query_vars),
                                    'count' => 0,
                                ));

                                wp_enqueue_script( 'ajax-pagination' );
                                ?>
                            </div>
                            
                        </div>
                        
                    </div>
                
            </div>
                <?php if(isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') {?>
                    </div></div>
                <?php } ?>
            </div>

        </div>
	<?php do_action('bridge_qode_action_page_after_container') ?>
	
    <?php get_footer(); */ ?>