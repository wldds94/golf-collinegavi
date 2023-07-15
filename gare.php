<?php
/**
 * Template Name: Gare
 *
 */

$bridge_qode_id = bridge_qode_get_page_id();
$bridge_qode_sidebar = get_post_meta($bridge_qode_id, "qode_show-sidebar", true);  

$bridge_qode_enable_page_comments = false;
if(get_post_meta($bridge_qode_id, "qode_enable-page-comments", true) == 'yes') {
	$bridge_qode_enable_page_comments = true;
}

if(get_post_meta($bridge_qode_id, "qode_page_background_color", true) != ""){
	$bridge_qode_background_color = get_post_meta($bridge_qode_id, "qode_page_background_color", true);
}else{
	$bridge_qode_background_color = "";
}

$bridge_qode_content_style_spacing = "";
if(get_post_meta($bridge_qode_id, "qode_margin_after_title", true) != ""){
	if(get_post_meta($bridge_qode_id, "qode_margin_after_title_mobile", true) == 'yes'){
		$bridge_qode_content_style_spacing = "padding-top:".esc_attr(get_post_meta($bridge_qode_id, "qode_margin_after_title", true))."px !important";
	}else{
		$bridge_qode_content_style_spacing = "padding-top:".esc_attr(get_post_meta($bridge_qode_id, "qode_margin_after_title", true))."px";
	}
}

if ( get_query_var('paged') ) { $bridge_qode_paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $bridge_qode_paged = get_query_var('page'); }
else { $bridge_qode_paged = 1; }

?>

<?php get_header(); ?>
    <?php get_template_part( 'title' ); ?>

    <div class="container tmpl-gare"<?php if($bridge_qode_background_color != "") { echo " style='background-color:". $bridge_qode_background_color ."'";} ?>>
        <?php if(isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') {?>
            <div class="overlapping_content"><div class="overlapping_content_inner">
        <?php } ?>
		<div class="container_inner default_template_holder clearfix page_container_inner" <?php bridge_qode_inline_style($bridge_qode_content_style_spacing); ?>>
			<?php do_action( 'bridge_qode_action_after_container_inner_open' ); ?>

            <div>
                <?php the_content(); ?>
            </div>
        
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
        <?php if(isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') {?>
            </div></div>
        <?php } ?>
    </div>

</div>

<div class="overlay">      
</div>
<div id="request-panel">
    <div class="close"></div>
    <div class="panel-container"></div>
</div> 

<?php do_action('bridge_qode_action_page_after_container') ?>
	
<?php get_footer(); ?>