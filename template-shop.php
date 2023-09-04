<?php
/*
Template Name: dm shop
*/
$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 0;      // 1 for yes, 0 for no  
$title        = '';
$empty        = 1;

$args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty
);

$all_categories = get_categories($args);
get_header(); ?>



<div class="page-content custom-shop">
    <?php if (get_field('cover', 'option')) : ?>
        <div class="products-hero">
            <a href="<?php echo get_field('cover_url', 'option'); ?>"><img class="show-for-medium" src="<?php echo get_field('cover', 'option'); ?>"></a>
            <a href="<?php echo get_field('cover_url', 'option'); ?>"><img class="show-for-small-only" src="<?php echo get_field('cover_mob', 'option'); ?>"></a>
        </div>
    <?php else : ?>
        <div class="products-header"></div>
    <?php endif; ?>
    <div class="content" style="padding-top:0">
        <div class="products-featured">

            <?php //get woocomemrce starred products
            $featured = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                        'operator' => 'IN', // or 'NOT IN' to exclude feature products
                    )
                )
            );
            $loop = new WP_Query($featured);
            if ($loop->have_posts()) : ?>
                <h2>Dirty trends</h2>
                <div class="products featured-products-slider featured-products-grid">
                    <?php
                    while ($loop->have_posts()) : $loop->the_post(); ?>
                        <div class="featured-products-grid-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('woocommerce_thumbnail'); ?>
                            </a>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p>
                                <?php $product = wc_get_product(get_the_ID());
                                echo $product->get_price_html(); ?>
                            </p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php wp_reset_postdata();
            endif; ?>

        </div>

        <div class="products-bar">

            <div class="products-filters">
                <div class="cat-filter active" data-filter="all">All</div>
                <?php foreach ($all_categories as $cat) { ?>
                    <div class="cat-filter" data-filter="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></div>
                <?php } ?>
            </div>

        </div>

        <div class="products products-grid">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();
                    $product = wc_get_product(get_the_ID());
                    $product_id = get_the_ID();
                    $country_restriction_type = get_post_meta($product_id, '_fz_country_restriction_type', true);
                    $label = '';
                    if ($country_restriction_type === 'specific' || $country_restriction_type === 'excluded') {
                        $country = get_post_meta($product_id, '_restricted_countries')[0];
                        $label = ($country_restriction_type === 'specific') ?  implode(', ', $country)  . ' only' : 'not in ' . implode(', ', $country);
                    }
            ?>
                    <div class="products-grid-item <?php $terms = get_the_terms(get_the_ID(), 'product_cat');
                                                    foreach ($terms as $term) {
                                                        echo  $term->slug;
                                                    } ?>">
                        <a href="<?php the_permalink(); ?>" class="stock-value <?php echo (!$product->is_in_stock()) ? 'sold-out' : 'in-stock'; ?>">
                            <?php if ($label) : ?>
                                <span class="country-product-label"><?php echo esc_html($label); ?> </span>
                            <?php endif; ?>
                            <?php the_post_thumbnail('woocommerce_thumbnail'); ?>
                        </a>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <p>
                            <?php echo ($product->is_in_stock()) ? $product->get_price_html() : '<span class="sold-out-color">Sold out</span>'; ?>
                        </p>
                    </div>
            <?php endwhile;
            } else {
                echo __('No products found');
            }
            wp_reset_postdata();
            ?>
        </div>
        <!--/.products-->

    </div>


</div> <!-- end #content -->
<div id="newsletter-block">
    <div class="newsletter-block-content">
        <div id="mc_embed_shell">
            <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
            <style type="text/css">
                #mc_embed_signup {
                    background: #fff;
                    false;
                    clear: left;
                    font: 14px Helvetica, Arial, sans-serif;
                    width: 600px;
                }

                /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
            </style>
            <style type="text/css">
                #mc_embed_signup{
                    max-width: 100%;
                }
                #mc-embedded-subscribe-form input[type=checkbox] {
                    display: inline;
                    width: auto;
                    margin-right: 10px;
                }

                #mergeRow-gdpr {
                    margin-top: 0;
                }

                #mc_embed_signup .mc-field-group
                {
                    padding-bottom: 0;
                    margin-bottom: 0;
                }
                #mergeRow-gdpr fieldset label {
                    font-weight: normal;
                }

                #mc-embedded-subscribe-form .mc_fieldset {
                    border: none;
                    min-height: 0px;
                    padding-bottom: 0px;
                }

                #mc_embed_signup .mc-field-group.input-group ul li {
                    display: inline-block;
                }

                #mc_embed_signup h2{
                    padding: 15px 0;
                }

                
                #mc_embed_signup a{
                    color: black;
                    text-decoration: underline;
                }
            </style>
            <div id="mc_embed_signup">
                <form action="https://dirtymondays.us8.list-manage.com/subscribe/post?u=dcca022910725cce082212be2&amp;id=57577179d9&amp;v_id=3416&amp;f_id=006b20e0f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                    <div id="mc_embed_signup_scroll">
                        <h2>Subscribe</h2>
                        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                        <div class=""><label for="mce-EMAIL">Email <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""></div>
                   
                        <div class="grid-x grid-margin-x">
                        <div class="cell medium-6"><label for="mce-FNAME">Name <span class="asterisk">*</span></label><input type="text" name="FNAME" class=" text" id="mce-FNAME" required="" value=""></div>
                        <div class="cell medium-6"><label for="mce-LNAME">Surname <span class="asterisk">*</span></label><input type="text" name="LNAME" class=" text" id="mce-LNAME"  required="" value=""></div>
                        </div>
                    
                        <div class="mc-field-group size1of2"><label for="mce-MMERGE5-month">Birthday </label>
                            <div class="datefield"><span class="subfield monthfield"><input class="birthday REQ_CSS" type="text" pattern="[0-9]*" placeholder="MM" size="2" maxlength="2" name="MMERGE5[month]" id="mce-MMERGE5-month" value=""></span> /<span class="subfield dayfield"><input class="birthday REQ_CSS" type="text" pattern="[0-9]*" placeholder="DD" size="2" maxlength="2" name="MMERGE5[day]" id="mce-MMERGE5-day" value=""></span><span class="small-meta nowrap">( mm / dd )</span></div>
                        </div>
                        <div class="mc-field-group input-group "><label>Country <span class="asterisk">*</span></label>
                            <ul>
                                <li><input type="radio" name="COUNTRY" id="mce-COUNTRY0" value="Europe" required><label for="mce-COUNTRY0">Europe</label></li>
                                <li><input type="radio" name="COUNTRY" id="mce-COUNTRY1" value="USA"><label for="mce-COUNTRY1">USA</label></li>
                            </ul>
                        </div>
                        <div id="mergeRow-gdpr" class="mergeRow gdpr-mergeRow content__gdprBlock mc-field-group">
                            <div class="content__gdpr">
                               
                                <fieldset class="mc_fieldset gdprRequired mc-field-group" name="interestgroup_field"><label class="checkbox subfield" for="gdpr42876"><input type="checkbox" id="gdpr_42876" name="gdpr[42876]" class="gdpr" value="Y"><span>I have read and accept the Privacy Policy.</span></label></fieldset>
                                <p>You can unsubscribe at any time by clicking the link in the footer of our emails. For information about our privacy practices, please visit our website.</p>
                            </div>
                            <div class="content__gdprLegal">
                                <p><small>We use Mailchimp as our marketing platform. By clicking below to subscribe, you acknowledge that your information will be transferred to Mailchimp for processing. <a href="https://mailchimp.com/legal/terms">Learn more</a> about Mailchimp's privacy practices.</small></p>
                            </div>
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display: none;"></div>
                            <div class="response" id="mce-success-response" style="display: none;"></div>
                        </div>
                        <div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_dcca022910725cce082212be2_57577179d9" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe"></div>
                    </div>
                </form>
            </div>
            <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
            <script type="text/javascript">
                (function($) {
                    window.fnames = new Array();
                    window.ftypes = new Array();
                    fnames[0] = 'EMAIL';
                    ftypes[0] = 'email';
                    fnames[1] = 'FNAME';
                    ftypes[1] = 'text';
                    fnames[2] = 'LNAME';
                    ftypes[2] = 'text';
                    fnames[5] = 'MMERGE5';
                    ftypes[5] = 'birthday';
                    fnames[3] = 'COUNTRY';
                    ftypes[3] = 'radio';
                }(jQuery));
                var $mcj = jQuery.noConflict(true);
            </script>
        </div>
    </div>
</div>
<?php get_footer(); ?>