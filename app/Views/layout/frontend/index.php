<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Blog - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .blog-image {
            height: 200px;
            width: 100%;
            object-fit: contain;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.95rem;
            color: #333;
        }

        .card-footer {
            font-size: 0.85rem;
            background-color: #f1f1f1;
        }

        .card-body {
            padding-bottom: 0.5rem;
        }

        footer {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div id="mainContent">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container">
                <a class="navbar-brand ajax-link" href="<?= base_url('home') ?>">My Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="container">
            <h1 class="mb-4 text-center">Latest Blog Posts</h1>
            <?php if (!empty($blogs)): ?>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php foreach ($blogs as $blog): ?>
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 d-flex flex-column">
                                <?php if ($blog['image']): ?>
                                    <img src="<?= base_url('uploads/blogs/' . esc($blog['image'])) ?>"
                                        class="blog-image" alt="<?= esc($blog['title']) ?>">
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= esc($blog['title']) ?></h5>
                                    <p class="card-text"><?= esc($blog['short_content']) ?></p>
                                    <p class="text-muted mb-1">
                                        <strong>Category:</strong> <?= esc($categoryMap[$blog['category']] ?? 'Uncategorized') ?>
                                    </p>
                                    <p class="text-muted mb-2">
                                        <strong>Author:</strong> <?= esc($blog['author_full_name'] ?? 'Unknown Admin') ?>
                                    </p>
                                    <div class="mt-auto">
                                        <a href="<?= base_url('blog/view/' . $blog['id']) ?>" class="ajax-link btn btn-primary btn-sm w-100">Read More</a>
                                        <!-- <a href="<?= base_url('blog/view/' . $blog['id']) ?>" class="btn btn-primary btn-sm w-100">Read More</a> -->
                                    </div>
                                </div>
                                <div class="card-footer text-muted text-center small">
                                    Posted on <?= date('F j, Y', strtotime($blog['created_at'])) ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info text-center mt-4">No blog posts found.</div>
            <?php endif; ?>
        </div>

        <footer class="bg-dark text-white mt-5 p-3 text-center">
            &copy; <?= date('Y') ?> My Blog. All rights reserved.
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainContent = document.getElementById('mainContent');
            async function loadPage(url, addToHistory = true) {
                try {
                    const response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (!response.ok) throw new Error('Network response was not ok');

                    const html = await response.text();
                    mainContent.innerHTML = html;

                    if (addToHistory) {
                        history.pushState({
                            url: url
                        }, '', url);
                    }
                    window.scrollTo(0, 0);

                } catch (error) {
                    console.error('Failed to load page:', error);
                    mainContent.innerHTML = '<p class="text-danger">Failed to load content. Please try again.</p>';
                }
            }
            document.body.addEventListener('click', function(e) {
                const link = e.target.closest('a.ajax-link');
                if (link) {
                    e.preventDefault();
                    const url = link.href;
                    loadPage(url);
                }
            });

            window.addEventListener('popstate', function(event) {
                if (event.state && event.state.url) {
                    loadPage(event.state.url, false);
                }
            });
        });
    </script>

</body>

</html>