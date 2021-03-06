<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php echo get_post_meta($id,'mpsp_slide_nav_button_position',true); ?>
<style>
.owl-pagination{
}
.owl-buttons{
  color:<?php echo get_post_meta($id,'mpsp_slide_nav_button_color',true);?>
  

}
.owl-buttons{
}




</style>





<style type="text/css">
  #tss_warppper{
    background: <?php echo get_post_meta($id,'mpsp_posts_bg_color',true); ?>;
    max-width: 480px;
    text-align: center;
    margin: 0 auto;
    padding: 10px 20px 10px 20px;
  }

  #tss_image{
    width: 100px;
    height: 100px;
    border-radius:<?php echo get_post_meta($id,'tss_mpsp_slider_img_border',true); ?>px;
    text-align: center;


  }

  .tss_p{
    font-size: 16px;
    font-weight: 100;
    color: <?php echo get_post_meta($id,'mpsp_posts_description_color',true); ?>;
  }
  #tss_name{
    font-weight: bold;
    font-size: 22px;
    text-align: center;
  }

  #tss_occupation{
    font-style: italic;
    text-align: center;

  }

  #tss_testimonial span{
    font-size: 29px;
    font-weight:bold;
    color: #dddddd;
  }
  #tss_testimonial{
    font-size: 18px;
    text-align: left;
  }
  </style>

  
             
<div id="<?php echo 'tss_id'.$id; ?>" class="owl-carousel">
                
          <?php


// WP_Query arguments
                  $args = array (
                    'post_type'              => 'tss_data',
                    'category_name'          => get_post_meta($id,'mpsp_posts_value',true), 
                    'posts_per_page'         => get_post_meta($id,'mpsp_posts_visible',true),
                    'order'                  => get_post_meta($id,'mpsp_posts_order',true),
                    'orderby'                => get_post_meta($id,'mpsp_posts_orderby',true),

                  );


// The Query
  $the_query = new WP_Query( $args );

  while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
          
  <div id='tss_warppper'>
    <div id='tss_content'>
      <img id='tss_image' src="<?php  
              $tss_img = get_post_meta(get_the_ID(),'tss_image',true);
      
              if(!empty($tss_img)){
              echo get_post_meta(get_the_ID(),'tss_image',true);
            }else{
              echo plugins_url('user-icon.jpg',__FILE__);
            } ?>">
      <p class='tss_p' id='tss_name'><?php echo get_post_meta(get_the_ID(),'tss_name',true);  ?></p>
      <p class='tss_p' id='tss_occupation'><?php echo get_post_meta(get_the_ID(),'tss_ocupation',true);  ?></p>
      <p class='tss_p' id='tss_testimonial'><?php echo get_post_meta(get_the_ID(),'tss_testimonial',true);  ?></p>
    </div>  
  </div>


  <?php endwhile;?>


               
</div>


<script>

jQuery(document).ready(function() {
          
 
  jQuery("<?php echo '#tss_id'.$id; ?>").owlCarousel({
    items :<?php echo  get_post_meta($id,'mpsp_slide_single',true); ?>,
    autoPlay : <?php echo get_post_meta($id,'mpsp_slide_autoplay',true); ?>,
    stopOnHover : true,
    navigation: <?php echo  get_post_meta($id,'mpsp_slide_navigation',true); ?>,
    paginationSpeed : 1000,
    goToFirstSpeed : 2000,
    singleItem : false,
    autoHeight : true,
    slideSpeed : <?php echo  get_post_meta($id,'mpsp_slide_speed',true); ?>000,
    transitionStyle: <?php echo  get_post_meta($id,'mpsp_slide_transistion',true); ?>,
    pagination : <?php echo  get_post_meta($id,'mpsp_slide_pagination',true); ?>,
    paginationNumbers :<?php echo  get_post_meta($id,'mpsp_slide_pagination_numbers',true); ?>,
    navigationText : ["<b><</b>", "<b>></b>"],

  });
});

</script>