<?php
function sumitai_v2_setup() {
    // Add support for block styles
    add_theme_support( 'wp-block-styles' );

    // Enqueue editor styles
    add_editor_style( 'style.css' );
    
    // Register menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'sumitai-v2' ),
    ) );
    
    // Add support for featured images
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'sumitai_v2_setup' );

function sumitai_v2_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'sumitai-v2-style', get_stylesheet_uri() );
    
    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'sumitai_v2_scripts' );

/**
 * Automate Content & Menu Setup
 * Runs on init.
 */
function sumitai_auto_setup_content() {
    // 1. Guard check: Only run if not done yet
    if ( get_option( 'sumitai_setup_final_done' ) ) {
        return;
    }

    // 2. Create Categories with slugs
    $categories = array(
        'Exchange On-Prem & M365 Stacks' => 'exchange-m365',
        'Artificial Intelligence'        => 'artificial-intelligence',
        'AI MLOps'                       => 'ai-mlops',
        'Cybersecurity & Email Security' => 'cybersecurity-email',
        'AI Tools'                       => 'ai-tools',
        'Cloud'                          => 'cloud',
    );

    $cat_ids = array();
    foreach ( $categories as $name => $slug ) {
        if ( ! term_exists( $slug, 'category' ) ) { // Check by slug first
            $cid = wp_insert_term( $name, 'category', array( 'slug' => $slug ) );
            if ( ! is_wp_error( $cid ) ) {
                $cat_ids[$name] = $cid['term_id'];
            }
        } else {
            $term = get_term_by( 'slug', $slug, 'category' );
            $cat_ids[$name] = $term->term_id;
        }
    }

    // 3. Create Pages
    $pages = array( 'About', 'Contact' );
    $page_ids = array();
    foreach ( $pages as $p ) {
        $p_obj = get_page_by_title( $p );
        if ( ! $p_obj ) {
            $pid = wp_insert_post( array(
                'post_title'   => $p,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => "<!-- $p Page Placeholder -->",
            ) );
            $page_ids[$p] = $pid;
        } else {
            $page_ids[$p] = $p_obj->ID;
        }
    }

    // 4. Create Navigation Menu
    $menu_name = 'Experts Header';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );
        
        if ( ! is_wp_error( $menu_id ) ) {
            // ORDER: Exchange, AI, MLOps, Cyber, Tools, Cloud, About, Contact
            
            // 1. Exchange
            if ( isset( $cat_ids['Exchange On-Prem & M365 Stacks'] ) ) wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Exchange On-Prem & M365 Stacks', 'menu-item-object' => 'category', 'menu-item-object-id' => $cat_ids['Exchange On-Prem & M365 Stacks'], 'menu-item-type' => 'taxonomy', 'menu-item-status' => 'publish' ) );
            
            // 2. Artificial Intelligence
            if ( isset( $cat_ids['Artificial Intelligence'] ) ) wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Artificial Intelligence', 'menu-item-object' => 'category', 'menu-item-object-id' => $cat_ids['Artificial Intelligence'], 'menu-item-type' => 'taxonomy', 'menu-item-status' => 'publish' ) );
            
            // 3. AI MLOps
            if ( isset( $cat_ids['AI MLOps'] ) ) wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'AI MLOps', 'menu-item-object' => 'category', 'menu-item-object-id' => $cat_ids['AI MLOps'], 'menu-item-type' => 'taxonomy', 'menu-item-status' => 'publish' ) );
            
            // 4. Cybersecurity
            if ( isset( $cat_ids['Cybersecurity & Email Security'] ) ) wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Cybersecurity & Email Security', 'menu-item-object' => 'category', 'menu-item-object-id' => $cat_ids['Cybersecurity & Email Security'], 'menu-item-type' => 'taxonomy', 'menu-item-status' => 'publish' ) );
            
            // 5. AI Tools
            if ( isset( $cat_ids['AI Tools'] ) ) wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'AI Tools', 'menu-item-object' => 'category', 'menu-item-object-id' => $cat_ids['AI Tools'], 'menu-item-type' => 'taxonomy', 'menu-item-status' => 'publish' ) );
            
            // 6. Cloud
            if ( isset( $cat_ids['Cloud'] ) ) wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Cloud', 'menu-item-object' => 'category', 'menu-item-object-id' => $cat_ids['Cloud'], 'menu-item-type' => 'taxonomy', 'menu-item-status' => 'publish' ) );
            
            // 7. About
            if ( isset( $page_ids['About'] ) ) wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'About', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['About'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
            
            // 8. Contact
            if ( isset( $page_ids['Contact'] ) ) wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Contact', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['Contact'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );

            // Assign to Primary Location
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['primary'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }

    // 5. Mark as done
    update_option( 'sumitai_setup_final_done', true );
}
add_action( 'init', 'sumitai_auto_setup_content' );

/**
 * Automate PDF Content Publishing
 */
function sumitai_publish_pdf_content() {
    if ( get_option( 'sumitai_pdf_content_done' ) ) {
        return;
    }

    $title = 'The Future of Email Security: Why SPF, DKIM, and DMARC Still Matter';
    $category_slug = 'cybersecurity-email'; // The new slug requested
    
    // Check if post already exists
    if ( get_page_by_title( $title, OBJECT, 'post' ) ) {
         update_option( 'sumitai_pdf_content_done', true );
         return;
    }

    $content = '
<p class="article-subtitle">A deep dive into the modern protocols that protect your organization from spoofing.</p>

<p>The original email system is like an unsecured postcard where anyone could write any name in the “From” section, and the post office would deliver it without question. It was built for a different era, one where trust was implicit and bad actors were few.</p>

<p>Today, that model is broken. Modern protocols are like adding security features to that postcard after the fact.</p>

<h2>Understanding the Basics</h2>
<p>Before we dive into the complex configurations of ARC and BIMI, we need to revisit the "Holy Trinity" of email authentication:</p>

<ul>
    <li><strong>SPF (Sender Policy Framework)</strong>: The bouncer at the door checking the guest list.</li>
    <li><strong>DKIM (DomainKeys Identified Mail)</strong>: The wax seal on the envelope ensuring it hasnt been opened.</li>
    <li><strong>DMARC (Domain-based Message Authentication)</strong>: The instruction manual telling the receiver what to do if the first two fail.</li>
</ul>

<blockquote>"Security is not about building walls; its about verifying identities."</blockquote>

<h3>1. SPF: The Guest List</h3>
<p>SPF is literally a DNA record listing the IP addresses authorized to send mail on your behalf. If an email comes from an IP not on the list, its flagged.</p>

<pre>v=spf1 ip4:192.0.2.0/24 include:_spf.google.com ~all</pre>

<p>However, SPF has a major flaw: it breaks when an email is forwarded. If I forward your email to a friend, the "sender" IP changes to mine, but your domain is still in the "From" address. This is where DKIM steps in.</p>

<h3>2. DKIM: The Digital Signature</h3>
<p>DKIM adds a cryptographic signature to the header. Even if the IP changes (like in forwarding), the signature remains valid as long as the content isnt altered.</p>

<h2>Why This Matters for AI Systems</h2>
<p>As we integrate AI agents into our workflows, they will often send automated reports, alerts, and summaries. Ensuring these agents are authenticated is critical to preventing "Agent Spoofing," a new vector of attack we expect to see rise in 2026.</p>
';

    // Get Category ID
    $cat_id = 0;
    $term = get_term_by( 'slug', $category_slug, 'category' );
    if ( $term ) {
        $cat_id = $term->term_id;
    }

    // Insert Post
    $post_id = wp_insert_post( array(
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_type'     => 'post',
        'post_category' => array( $cat_id )
    ) );

    update_option( 'sumitai_pdf_content_done', true );
}
add_action( 'init', 'sumitai_publish_pdf_content' );
?>
