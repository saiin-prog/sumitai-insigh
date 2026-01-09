<?php get_header(); ?>

    <!-- Welcome Banner Section -->
    <section class="welcome-banner">
        <div class="container">
            <div class="hero-profile-container">
                <img src="<?php echo get_template_directory_uri(); ?>/hero-profile.jpg" alt="Sumit" class="hero-profile-img">
            </div>
            <h1 class="welcome-title">Welcome to this learning space - sumitaiinsight</h1>
            <p class="welcome-subtitle">Exploring the frontiers of M365 stacks, cloud platforms (Azure, AWS, GCP), AI
                capabilities, MLOps, cyber security, email security, and modern AI tools.</p>
        </div>
    </section>

    <!-- Main Layout: Feed + Sidebar -->
    <main class="main-layout">
        <div class="container layout-grid">

            <!-- Left Column: Article Feed -->
            <div class="feed-column">
                <h2 class="section-title">Latest Knowledge</h2>

                <!-- 
                     NOTE: This section works best if we eventually migrate these hardcoded posts to real WP posts.
                     For now, per instructions, we keep the alignment with index.html static content 
                     BUT ideally we should at least check for posts.
                     
                     However, since the user wants "Email Security" to be dynamic, 
                     and specifically mentioned assigning "SPF..." to that category, 
                     the homepage might lose that article if we hardcode it here and also have it in DB.
                     
                     For this "migration" step, I will keep the static HTML as a fallback or "Sticky" content
                     mimicking index.html exactly as requested to "not need manual updates" implies future state.
                     
                     Let's stick to the static HTML from index.html for the homepage to ensure 1:1 match 
                     until they fully migrate content.
                -->

                <!-- Featured / Big Article -->
                <article class="feed-item featured-item">
                    <div class="feed-image">
                        <a href="<?php echo esc_url( home_url( '/category/email-security/spf-dkim-dmarc/' ) ); // Placeholder link logic ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/featured-robot.png" alt="AI and MLOps">
                        </a>
                    </div>
                    <div class="feed-content">
                        <div class="card-meta">
                            <div class="author-avatar"></div>
                            <span>Sumit Kumar · Jan 7, 2026</span>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/category/email-security/spf-dkim-dmarc/' ) ); ?>">
                            <h2 class="feed-title">The Future of Email Security: Why SPF, DKIM, and DMARC Still Matter
                            </h2>
                        </a>
                        <p class="feed-excerpt">
                            Modern email protocols are like adding security features to a postcard. Here is a deep dive
                            into how
                            they actually protect your organization from spoofing.
                        </p>
                        <div class="feed-footer">
                            <span class="tag">Email Security</span>
                            <span class="read-time">8 min read</span>
                        </div>
                    </div>
                </article>

                <!-- Standard Feed Item 1 -->
                <article class="feed-item">
                    <div class="feed-content">
                        <div class="card-meta">
                            <div class="author-avatar"></div>
                            <span>Sumit Kumar · Jan 5, 2026</span>
                        </div>
                        <a href="#">
                            <h3 class="feed-title">Understanding LLM Fine-Tuning</h3>
                        </a>
                        <p class="feed-excerpt">
                            A beginner's guide to how Large Language Models adapt to specific tasks without retraining
                            from scratch.
                        </p>
                        <div class="feed-footer">
                            <span class="tag">Learn AI</span>
                            <span class="read-time">4 min read</span>
                        </div>
                    </div>
                    <div class="feed-image-small">
                        <img src="https://images.unsplash.com/photo-1620712943543-bcc4688e7485?auto=format&fit=crop&q=80&w=300"
                            alt="AI">
                    </div>
                </article>

                <!-- Standard Feed Item 2 -->
                <article class="feed-item">
                    <div class="feed-content">
                        <div class="card-meta">
                            <div class="author-avatar"></div>
                            <span>Sumit Kumar · Jan 3, 2026</span>
                        </div>
                        <a href="#">
                            <h3 class="feed-title">Building Resilient ML Pipelines</h3>
                        </a>
                        <p class="feed-excerpt">
                            Why your model works in a notebook but fails in production. The key principles of MLOps
                            engineering.
                        </p>
                        <div class="feed-footer">
                            <span class="tag">MLOps</span>
                            <span class="read-time">6 min read</span>
                        </div>
                    </div>
                    <div class="feed-image-small">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80&w=300"
                            alt="MLOps">
                    </div>
                </article>

                <!-- Standard Feed Item 3 -->
                <article class="feed-item">
                    <div class="feed-content">
                        <div class="card-meta">
                            <div class="author-avatar"></div>
                            <span>Sumit Kumar · Jan 1, 2026</span>
                        </div>
                        <a href="#">
                            <h3 class="feed-title">Zero Trust Architecture Explained</h3>
                        </a>
                        <p class="feed-excerpt">
                            Moving beyond the perimeter deployment. How to implement zero trust without breaking user
                            experience.
                        </p>
                        <div class="feed-footer">
                            <span class="tag">Cyber Security</span>
                            <span class="read-time">5 min read</span>
                        </div>
                    </div>
                    <div class="feed-image-small">
                        <img src="https://images.unsplash.com/photo-1563968743333-bd1d48ab138e?auto=format&fit=crop&q=80&w=300"
                            alt="Zero Trust">
                    </div>
                </article>

            </div>

            <!-- Right Column: Sidebar (Categories) -->
            <aside class="sidebar-column">
                <div class="sidebar-sticky">
                    <h3 class="sidebar-title">Discover more of what matters to you</h3>
                    <div class="category-list-chips">
                        <a href="#" class="chip">Learn AI</a>
                        <a href="#" class="chip">MLOps</a>
                        <a href="#" class="chip">Cyber Security</a>
                        <a href="m365.html" class="chip">M365</a>
                        <a href="<?php echo esc_url( home_url( '/category/email-security/' ) ); ?>" class="chip">Email Security</a>
                        <a href="#" class="chip">Data Science</a>
                        <a href="#" class="chip">Cloud Computing</a>
                    </div>

                    <div class="sidebar-divider"></div>

                    <div class="sidebar-links">
                        <a href="#">Help</a>
                        <a href="#">Status</a>
                        <a href="#">Writers</a>
                        <a href="#">Blog</a>
                        <a href="#">Careers</a>
                        <a href="#">Privacy</a>
                        <a href="#">Terms</a>
                        <a href="#">About</a>
                    </div>
                </div>
            </aside>

        </div>
    </main>

<?php get_footer(); ?>
