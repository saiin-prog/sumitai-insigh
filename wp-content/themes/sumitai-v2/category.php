<?php get_header(); ?>

    <!-- Main Layout: Feed + Sidebar -->
    <main class="main-layout">
        <div class="container layout-grid">

            <!-- Left Column: Article Feed -->
            <div class="feed-column">
                <h2 class="section-title"><?php single_cat_title(); ?></h2>

                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                
                <!-- Dynamic Feed Item -->
                <article class="feed-item">
                    <div class="feed-content">
                        <div class="card-meta">
                            <div class="author-avatar"></div>
                            <span><?php the_author(); ?> · <?php echo get_the_date(); ?></span>
                        </div>
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="feed-title"><?php the_title(); ?></h3>
                        </a>
                        <p class="feed-excerpt">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                        <div class="feed-footer">
                            <?php
                            $category = get_the_category(); 
                            if($category) {
                                echo '<span class="tag">' . $category[0]->cat_name . '</span>';
                            }
                            ?>
                             <!-- Read time is usually a plugin, omitting or static for now -->
                            <span class="read-time">Read now</span>
                        </div>
                    </div>
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="feed-image-small">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'medium' ); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </article>

                    <?php endwhile; ?>
                
                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    the_posts_pagination( array(
                        'prev_text' => __( 'Previous', 'sumitai-v2' ),
                        'next_text' => __( 'Next', 'sumitai-v2' ),
                    ) );
                    ?>
                </div>

                <?php else : ?>
                    <p><?php _e( 'No posts found in this category.', 'sumitai-v2' ); ?></p>
                <?php endif; ?>

            </div>

            <!-- Right Column: Sidebar (Categories) -->
            <aside class="sidebar-column">
                <div class="sidebar-sticky">
                    <h3 class="sidebar-title">Discover more of what matters to you</h3>
                    <div class="category-list-chips">
                        <!-- Ideally dynamic wp_list_categories but hardcoded to match design for now -->
                        <a href="#" class="chip">Learn AI</a>
                        <a href="#" class="chip">MLOps</a>
                        <a href="#" class="chip">Cyber Security</a>
                        <a href="m365.html" class="chip">M365</a>
                        <a href="<?php echo esc_url( home_url( '/category/email-security/' ) ); ?>" class="chip">Email Security</a>
                        <a href="#" class="chip">Data Science</a>
                        <a href="#" class="chip">Cloud Computing</a>
                    </div>
                </div>
            </aside>

        </div>
    </main>

<?php get_footer(); ?>
