<?php
namespace Aktar\Portfolio\FrontEnd;

class ShortCode{
    function __construct(){
    add_shortcode('portfolio-grid',[$this,'show_portfolio_grid']);
    }
	
	/*function call portfolios*/
    public function show_portfolio_grid($atts , $content=''){
        ob_start();
        $args = array(
            // Arguments for your query.
            'post_type' => 'portfolio',
        );
        // Custom query.
        $query = new \WP_Query( $args );
  ?>
          <div class="portfolios">
         <?php
        // Check that we have query results.
        if ( $query->have_posts() ) {
            // Start looping over the query results.
            while ( $query->have_posts() ) {
                $query->the_post();
        ?>
      <div class="portfolio">
            <div class="portfolio-thumb">
                <?php
                the_post_thumbnail();
                ?>
            </div>
            <div class="portfolio-summary">
                <h3 class="portfolio-title">
                    <?php
                    the_title();
                    ?>
                </h3>
                <div class="p-exrept">
                    <?php
                    the_excerpt();	 
                    ?>
                </div>
                <div class="portfolio-buttons">
                    <div class="portfolio-btn1">
                        <a href="">Preview</a>
                    </div>
                    <div class="portfolio-btn2">
                        <a href="">Visit site</a>
                    </div>
                </div>
            </div>
            
      </div>        
        <?php
            }
        }
        // Restore original post data.
        wp_reset_postdata();
        
        ?>
        </div>
        
        <?php
        return ob_get_clean();
    }
	
}