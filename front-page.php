<?php 
/* Template Name: Mobile Home Final Submission */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOP.CO Mobile</title>
    
    <?php wp_head(); ?> 

    <style>
        /* ----------------RESET & FONTS---------------- */
        html, body { margin: 0; padding: 0; width: 100%; overflow-x: hidden; background-color: #fff; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; }
        * { box-sizing: border-box; }
        
        .font-heavy { font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-weight: 900; letter-spacing: -0.5px; }

        .mobile-wrapper { 
            max-width: 450px; 
            margin: 0 auto; 
            background: #fff; 
            min-height: 100vh; 
            border-left: 1px solid #f0f0f0;
            border-right: 1px solid #f0f0f0;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        a { text-decoration: none; color: inherit; }
        img { max-width: 100%; display: block; }

        /* ----------------1. ANNOUNCEMENT BAR---------------- */
        .ann-bar { background: #000; color: #fff; text-align: center; padding: 9px 10px; font-size: 12px; font-weight: 500; }
        .ann-bar a { text-decoration: underline; }

        /* ----------------2. HEADER (FIXED ICONS)---------------- */
        .app-header { padding: 18px 16px; display: flex; align-items: center; background: #fff; position: sticky; top: 0; z-index: 100; gap: 15px; }
        
        /* New SVG Icon Styles */
        .icon-svg { width: 24px; height: 24px; stroke: #000; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; cursor: pointer; }
        
        .burger-icon { display: flex; align-items: center; }
        .logo { font-size: 28px; margin-right: auto; line-height: 1; margin-top: -3px; color: #000; }
        
        .header-icons { display: flex; gap: 15px; align-items: center; }

        /* ----------------3. HERO SECTION---------------- */
        .hero { background-color: #F2F0F1; display: flex; flex-direction: column; padding-top: 40px; }
        .hero-content { padding: 0 16px; }
        .hero h1 { font-size: 40px; line-height: 0.9; margin: 0 0 15px 0; text-transform: uppercase; color: #000; }
        .hero p { color: #000; font-size: 14px; margin-bottom: 25px; opacity: 0.6; line-height: 1.5; }
        
        .btn-shop { background: #000; color: #fff; padding: 16px 0; width: 100%; display: block; text-align: center; border-radius: 60px; font-weight: 500; margin-bottom: 30px; font-size: 16px; }

        /* Stats */
        .hero-stats { display: flex; flex-wrap: wrap; justify-content: center; gap: 0; margin-bottom: 20px; }
        .stat-item { width: 50%; padding: 0 10px; position: relative; margin-bottom: 15px; }
        .stat-item:nth-child(1) { border-right: 1px solid #ddd; } 
        .stat-item.full-center { width: 100%; text-align: center; border: none; }
        .stat-item h3 { margin: 0; font-size: 26px; }
        .stat-item span { font-size: 12px; color: #666; display: block; margin-top: 2px; }

        .hero-image-container img { width: 100%; }

        /* ----------------4. BRANDS---------------- */
        .brand-bar { background: #000; padding: 35px 20px; }
        .brand-list { display: flex; flex-wrap: wrap; justify-content: center; gap: 25px; }
        .brand-item { display: flex; justify-content: center; align-items: center; }
        .brand-item:nth-child(-n+3) { width: 28%; }
        .brand-item:nth-child(n+4) { width: 40%; margin-top: 10px; }
        .brand-item img { height: 28px; width: auto; filter: brightness(0) invert(1); object-fit: contain; }

        /* ----------------5. PRODUCT SECTIONS---------------- */
        .product-section { padding: 40px 0 40px 16px; background: #fff; border-bottom: 1px solid #eee; overflow: hidden; }
        .section-title { font-size: 34px; margin-bottom: 25px; text-align: center; text-transform: uppercase; color: #000; line-height: 1; padding-right: 16px; }
        
        .product-grid { display: flex; gap: 15px; overflow-x: auto; padding-bottom: 20px; margin-bottom: -20px; padding-right: 20px; scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch; align-items: flex-start; }
        .product-grid::-webkit-scrollbar { display: none; }
        
        .prod-card { min-width: 190px; width: 190px; flex-shrink: 0; display: block; scroll-snap-align: start; }
        .prod-image-wrap { width: 100%; aspect-ratio: 1/1.1; overflow: hidden; border-radius: 16px; margin-bottom: 12px; background: #f0f0f0; }
        .prod-image-wrap img { width: 100%; height: 100%; object-fit: cover; }
        .prod-title { font-size: 16px; font-weight: 700; margin: 0 0 5px 0; color: #000; font-family: 'Arial', sans-serif; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .prod-rating { font-size: 12px; margin-bottom: 5px; color: #FFC633; }
        
        .prod-price { font-size: 20px; font-weight: 700; color: #000; display: flex; align-items: center; gap: 10px; font-family: 'Arial', sans-serif; flex-wrap: wrap; }
        .prod-price ins { text-decoration: none; color: #000; font-weight: 700; order: 1; }
        .prod-price del { color: #999; font-size: 16px; font-weight: 700; text-decoration: line-through; order: 2; opacity: 0.6; }

        .view-all-container { text-align: center; margin-top: 30px; padding-right: 16px; }
        .view-all-btn { display: inline-block; padding: 14px 60px; border: 1px solid #0000001A; border-radius: 62px; background: #fff; color: #000; font-weight: 500; font-size: 14px; min-width: 200px; }

        /* ----------------6. BROWSE BY STYLE---------------- */
        .browse-style { padding: 40px 16px; background: #fff; }
        .style-container { background: #F0F0F0; border-radius: 40px; padding: 40px 20px; }
        .style-grid { display: flex; flex-direction: column; gap: 16px; }
        
        .style-card { background: #fff; height: 190px; border-radius: 20px; position: relative; overflow: hidden; text-decoration: none; background-size: cover; background-position: center top; background-color: #ddd; display: block; }
        .style-card span { position: absolute; top: 25px; left: 25px; font-size: 26px; color: #000; z-index: 2; }

        /* ----------------7. HAPPY CUSTOMERS---------------- */
        .reviews-section { padding: 40px 20px; overflow: hidden; }
        .review-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 25px; }
        .review-header h2 { font-size: 34px; line-height: 1; margin: 0; }
        .review-arrows { display: flex; gap: 15px; }
        .arrow-btn { font-size: 20px; cursor: pointer; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; }
        
        .review-slider { position: relative; }
        .review-card { border: 1px solid #0000001A; border-radius: 20px; padding: 25px; display: none; animation: fadeIn 0.4s; }
        .review-card.active { display: block; }

        .stars { color: #FFC633; font-size: 20px; margin-bottom: 12px; letter-spacing: 2px; }
        .customer-name { font-weight: bold; margin-bottom: 10px; display: flex; align-items: center; gap: 6px; font-size: 18px; }
        .verified-icon { background: #01AB31; color: #fff; border-radius: 50%; width: 18px; height: 18px; font-size: 10px; display: flex; align-items: center; justify-content: center; }
        .review-text { font-size: 15px; color: #666; line-height: 1.5; }
        @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

        /* ----------------8. FOOTER---------------- */
        .footer { background: #F0F0F0; padding: 160px 20px 30px; position: relative; margin-top: 100px; }
        .newsletter-box { background: #000; border-radius: 20px; padding: 35px 25px; position: absolute; top: -110px; left: 16px; right: 16px; color: #fff; display: flex; flex-direction: column; gap: 15px; }
        .newsletter-box h2 { font-size: 30px; line-height: 1; margin: 0; font-family: 'Arial Black', sans-serif; color: #fff !important; }
        .input-group { display: flex; flex-direction: column; gap: 10px; margin-top: 10px; }
        .newsletter-input { width: 100%; padding: 12px 20px; border-radius: 60px; border: none; font-size: 14px; color: #000; outline: none; }
        .newsletter-btn { width: 100%; padding: 12px; border-radius: 60px; border: none; background: #fff; color: #000; font-weight: 600; cursor: pointer; font-size: 14px; }

        .footer-logo { font-size: 30px; margin-bottom: 20px; line-height: 1; margin-top: 20px; }
        .footer-desc { font-size: 14px; color: #00000099; margin-bottom: 25px; line-height: 1.6; }
        
        .social-icons { display: flex; gap: 12px; margin-bottom: 35px; }
        .social-icon { width: 32px; height: 32px; border: 1px solid #00000033; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #fff; transition: 0.2s; }
        .social-icon svg { width: 16px; height: 16px; fill: #000; }
        .social-icon:hover { background: #000; border-color: #000; }
        .social-icon:hover svg { fill: #fff; }

        .footer-links-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px 20px; }
        
        .footer-col h4 { 
            font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif;
            font-size: 14px; 
            letter-spacing: 1.5px; 
            margin: 0 0 20px 0; 
            text-transform: uppercase; 
            font-weight: 900;
            color: #000; 
        }
        .footer-col ul { list-style: none; padding: 0; margin: 0; }
        .footer-col li { font-size: 14px; color: #00000099; margin-bottom: 15px; }

        .footer-bottom { border-top: 1px solid #0000001A; margin-top: 40px; padding-top: 25px; text-align: center; display: flex; flex-direction: column; gap: 15px; align-items: center; }
        .copy-text { color: #00000099; font-size: 14px; }
        
        .payment-icons { display: flex; gap: 8px; align-items: center; }
        .pay-icon { height: 24px; width: auto; background: #fff; padding: 3px; border-radius: 4px; border: 1px solid #eee; }
        .pay-icon img { height: 100%; width: auto; display: block; }

        html { margin-top: 0 !important; }
    </style>
</head>
<body>

<?php 
function get_safe_acf_image($field_name) {
    $image = get_field($field_name);
    if( empty($image) ) return '';
    if( is_array($image) ) return $image['url']; 
    if( is_numeric($image) ) return wp_get_attachment_url($image); 
    return $image; 
}
$hero_url = get_safe_acf_image('hero_image');
?>

<div class="mobile-wrapper">

    <div class="ann-bar"><?php the_field('announcement_text'); ?></div>

    <div class="app-header">
        <div class="burger-icon">
            <svg class="icon-svg" viewBox="0 0 24 24"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </div>
        
        <div class="logo font-heavy">SHOP.CO</div>
        
        <div class="header-icons">
            <svg class="icon-svg" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <svg class="icon-svg" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
            <svg class="icon-svg" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </div>
    </div>

    <div class="hero">
        <div class="hero-content">
            <h1 class="font-heavy"><?php the_field('hero_heading'); ?></h1>
            <p>Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.</p>
            <a href="#" class="btn-shop">Shop Now</a>
            <div class="hero-stats">
                <div class="stat-item"><h3 class="font-heavy">200+</h3><span>International Brands</span></div>
                <div class="stat-item"><h3 class="font-heavy">2,000+</h3><span>High-Quality Products</span></div>
                <div class="stat-item full-center"><h3 class="font-heavy">30,000+</h3><span>Happy Customers</span></div>
            </div>
        </div>
        <div class="hero-image-container">
             <?php if($hero_url): ?>
                <img src="<?php echo esc_url($hero_url); ?>" alt="Hero Model" />
             <?php else: ?>
                <div style="height:300px; background:#ccc; display:flex; align-items:center; justify-content:center;">Hero Image Missing</div>
             <?php endif; ?>
        </div>
    </div>

    <div class="brand-bar">
        <div class="brand-list">
            <?php 
            $brand_group = get_field('brand_logos'); 
            if( $brand_group ): 
                foreach( $brand_group as $logo ): 
                    $img_url = is_array($logo) ? $logo['url'] : (is_numeric($logo) ? wp_get_attachment_url($logo) : $logo);
                    if($img_url): ?>
                        <div class="brand-item"><img src="<?php echo esc_url($img_url); ?>" alt="Brand" /></div>
                    <?php endif;
                endforeach; 
            endif; ?>
        </div>
    </div>

    <div class="product-section">
        <div class="section-title font-heavy">NEW ARRIVALS</div>
        <div class="product-grid">
            <?php
            $cat_slug = get_field('featured_category');
            if (!$cat_slug) { $cat_slug = 'new-arrivals'; } 
            
            $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'product_cat' => $cat_slug ); 
            $loop = new WP_Query( $args );

            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post();
                    global $product;
                    ?>
                    <a href="<?php the_permalink(); ?>" class="prod-card">
                        <div class="prod-image-wrap"><?php the_post_thumbnail('large'); ?></div>
                        <div class="prod-title"><?php the_title(); ?></div>
                        <div class="prod-rating">★★★★☆ 4.5/5</div>
                        <div class="prod-price"><?php echo $product->get_price_html(); ?></div>
                    </a>
                    <?php
                endwhile;
            endif; wp_reset_postdata(); ?>
        </div>
        <div class="view-all-container">
            <a href="#" class="view-all-btn">View All</a>
        </div>
    </div>

    <div class="product-section">
        <div class="section-title font-heavy">TOP SELLING</div>
        <div class="product-grid">
            <?php
            $top_args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'product_cat' => 'top-selling' );
            $top_loop = new WP_Query( $top_args );
            
            if(!$top_loop->have_posts()) { 
                $top_args = array( 'post_type' => 'product', 'posts_per_page' => 6 ); 
                $top_loop = new WP_Query( $top_args ); 
            }

            if ( $top_loop->have_posts() ) :
                while ( $top_loop->have_posts() ) : $top_loop->the_post();
                    global $product;
                    ?>
                    <a href="<?php the_permalink(); ?>" class="prod-card">
                        <div class="prod-image-wrap"><?php the_post_thumbnail('large'); ?></div>
                        <div class="prod-title"><?php the_title(); ?></div>
                        <div class="prod-rating">★★★★☆ 4.5/5</div>
                        <div class="prod-price"><?php echo $product->get_price_html(); ?></div>
                    </a>
                    <?php
                endwhile;
            else:
                echo '<p style="padding-left:15px;">No products found.</p>';
            endif; 
            wp_reset_postdata(); ?>
        </div>
        <div class="view-all-container">
            <a href="#" class="view-all-btn">View All</a>
        </div>
    </div>

    <?php
    $casual_url = get_safe_acf_image('style_casual');
    $formal_url = get_safe_acf_image('style_formal');
    $party_url  = get_safe_acf_image('style_party');
    $gym_url    = get_safe_acf_image('style_gym');
    ?>
    <div class="browse-style">
        <div class="style-container">
            <div class="section-title font-heavy" style="font-size: 32px; margin-bottom: 25px;">BROWSE BY<br>DRESS STYLE</div>
            <div class="style-grid">
                
                <a href="#" class="style-card" style="background-image: url('<?php echo esc_url($casual_url); ?>');">
                    <span class="font-heavy">Casual</span>
                </a>
                
                <a href="#" class="style-card" style="background-image: url('<?php echo esc_url($formal_url); ?>');">
                    <span class="font-heavy">Formal</span>
                </a>
                
                <a href="#" class="style-card" style="background-image: url('<?php echo esc_url($party_url); ?>');">
                    <span class="font-heavy">Party</span>
                </a>
                
                <a href="#" class="style-card" style="background-image: url('<?php echo esc_url($gym_url); ?>');">
                    <span class="font-heavy">Gym</span>
                </a>

            </div>
        </div>
    </div>

    <div class="reviews-section">
        <div class="review-header">
            <h2 class="font-heavy">OUR HAPPY<br>CUSTOMERS</h2>
            <div class="review-arrows">
                <div class="arrow-btn" onclick="prevReview()">←</div>
                <div class="arrow-btn" onclick="nextReview()">→</div>
            </div>
        </div>
        
        <div class="review-slider">
            <div class="review-card active" id="review-1">
                <div class="stars">★★★★★</div>
                <div class="customer-name">Sarah M. <span class="verified-icon">✔</span></div>
                <div class="review-text">"I'm blown away by the quality and style of the clothes I received from Shop.co. From casual wear to elegant dresses, every piece I've bought has exceeded my expectations."</div>
            </div>
            <div class="review-card" id="review-2">
                <div class="stars">★★★★★</div>
                <div class="customer-name">Alex K. <span class="verified-icon">✔</span></div>
                <div class="review-text">"Finding clothes that align with my personal style used to be a challenge until I met Shop.co. The range of options they offer is truly remarkable, catering to a variety of tastes."</div>
            </div>
             <div class="review-card" id="review-3">
                <div class="stars">★★★★☆</div>
                <div class="customer-name">James L. <span class="verified-icon">✔</span></div>
                <div class="review-text">"As someone who's always on the lookout for unique fashion pieces, I'm thrilled to have stumbled upon Shop.co. The selection of clothes is not only diverse but also on-point."</div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="newsletter-box">
            <h2 class="font-heavy">STAY UPTO DATE ABOUT OUR LATEST OFFERS</h2>
            <div class="input-group">
                <input type="email" placeholder="Enter your email address" class="newsletter-input">
                <button class="newsletter-btn">Subscribe to Newsletter</button>
            </div>
        </div>

        <div class="footer-logo font-heavy">SHOP.CO</div>
        <div class="footer-desc">We have clothes that suits your style and which you’re proud to wear. From women to men.</div>
        
        <div class="social-icons">
            <a href="#" class="social-icon">
                <svg viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
            </a>
            <a href="#" class="social-icon" style="background:#000; border-color:#000;">
                <svg viewBox="0 0 24 24" style="fill:#fff;"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
            </a>
            <a href="#" class="social-icon">
                <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <a href="#" class="social-icon">
                <svg viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
            </a>
        </div>

        <div class="footer-links-grid">
            <div class="footer-col">
                <h4>COMPANY</h4>
                <ul><li>About</li><li>Features</li><li>Works</li><li>Career</li></ul>
            </div>
            <div class="footer-col">
                <h4>HELP</h4>
                <ul><li>Customer Support</li><li>Delivery Details</li><li>Terms & Conditions</li><li>Privacy Policy</li></ul>
            </div>
            <div class="footer-col">
                <h4>FAQ</h4>
                <ul><li>Account</li><li>Manage Deliveries</li><li>Orders</li><li>Payments</li></ul>
            </div>
            <div class="footer-col">
                <h4>RESOURCES</h4>
                <ul><li>Free eBook</li><li>Development Tutorial</li><li>How to - Blog</li><li>YouTube Playlist</li></ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="copy-text">Shop.co © 2000-2023, All Rights Reserved</div>
            <div class="payment-icons">
                 <div class="pay-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa"></div>
                 <div class="pay-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard"></div>
                 <div class="pay-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal"></div>
                 <div class="pay-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b0/Apple_Pay_logo.svg" alt="Apple Pay"></div>
                 <div class="pay-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Google_Pay_Logo.svg" alt="Google Pay"></div>
            </div>
        </div>
    </div>

</div>

<script>
    let currentReview = 1;
    const totalReviews = 3;

    function showReview(num) {
        for(let i=1; i<=totalReviews; i++) {
            document.getElementById('review-'+i).classList.remove('active');
        }
        document.getElementById('review-'+num).classList.add('active');
    }

    function nextReview() {
        currentReview++;
        if(currentReview > totalReviews) currentReview = 1;
        showReview(currentReview);
    }

    function prevReview() {
        currentReview--;
        if(currentReview < 1) currentReview = totalReviews;
        showReview(currentReview);
    }
</script>

<?php wp_footer(); ?>
</body>
</html>