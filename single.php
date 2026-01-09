<?php get_header(); ?>

    <main>
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
        <!-- Article Header -->
        <article class="article-container">
            <div class="article-header">
                <h1 class="article-title"><?php the_title(); ?></h1>
                <!-- Subtitle logic would typically use a plugin or custom field. 
                     For now, we can check if there's an excerpt or custom field.
                     Leaving empty or using Excerpt if present. -->
                <?php if ( has_excerpt() ) : ?>
                <h2 class="article-subtitle"><?php echo get_the_excerpt(); ?></h2>
                <?php endif; ?>

                <div class="card-meta" style="justify-content: center; margin-top: 24px;">
                    <div class="author-avatar"></div>
                    <div>
                        <span style="display: block; font-weight: 500; color: #000;"><?php the_author(); ?></span>
                        <span style="color: #757575;"><?php echo get_the_date(); ?> · <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
                    </div>
                </div>
            </div>

            <!-- Main Content Body -->
            <div class="article-body">
                <?php the_content(); ?>
            </div>
        </article>
        <?php endwhile; ?>

    </main>

<?php get_footer(); ?>
