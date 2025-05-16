<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= esc($blog['title']) ?> - My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        main article {
            background: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        aside .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.1);
        }

        .blog-image {
            max-height: 400px;
            object-fit: contain;
            border-radius: 0.5rem;
            width: 100%;
        }

        .meta-info p {
            font-size: 0.9rem;
            color: #555;
        }

        footer {
            background-color: #212529;
            font-size: 0.9rem;
        }

        .list-group-item a {
            color: #212529;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .list-group-item a:hover {
            color: #0d6efd;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div id="mainContent">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5 shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold ajax-link" href="<?= base_url('home') ?>">My Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="container">
            <div class="row g-5">
                <main class="col-lg-8">
                    <article>
                        <h1 class="mb-3 fw-bold"><?= esc($blog['title']) ?></h1>
                        <p class="text-muted fst-italic mb-2">
                            <span class="me-3"><strong>Category:</strong> <?= esc($categoryName) ?></span>
                            <span class="me-3"><strong>Posted on:</strong> <?= date('F j, Y', strtotime($blog['created_at'])) ?></span>
                            <span><strong>Author:</strong> <?= esc($authorFullName ?? 'Unknown Admin') ?></span>
                        </p>

                        <?php if ($blog['image']): ?>
                            <img src="<?= base_url('uploads/blogs/' . esc($blog['image'])) ?>"
                                alt="<?= esc($blog['title']) ?>" class="blog-image mb-4">
                        <?php endif; ?>

                        <div class="mb-4 fs-5 text-secondary">
                            <?= $blog['short_content'] ?>
                        </div>
                        <div class="mb-4 fs-6">
                            <?= $blog['content'] ?>
                        </div>

                        <?php if (!empty($blog['meta_title']) || !empty($blog['meta_description'])): ?>
                            <section class="meta-info border-top pt-3 mt-4">
                                <h5 class="mb-3 text-primary">Meta Information</h5>
                                <?php if (!empty($blog['meta_title'])): ?>
                                    <p><strong>Meta Title:</strong> <?= esc($blog['meta_title']) ?></p>
                                <?php endif; ?>
                                <?php if (!empty($blog['meta_description'])): ?>
                                    <p><strong>Meta Description:</strong> <?= esc($blog['meta_description']) ?></p>
                                <?php endif; ?>
                            </section>
                        <?php endif; ?>

                        <a href="<?= base_url('home') ?>" class="btn btn-outline-primary mt-5 ajax-link">← Back to Home</a>
                    </article>
                </main>

                <!-- Sidebar -->
                <aside class="col-lg-4">
                    <div class="card sticky-top" style="top: 80px;">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Other Blogs</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php if (!empty($otherBlogs)): ?>
                                <?php foreach ($otherBlogs as $other): ?>
                                    <li class="list-group-item">
                                        <a href="<?= base_url('blog/view/' . $other['id']) ?>" class="ajax-link" title="<?= esc($other['title']) ?>">
                                            <?= esc($other['title']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item text-muted">No other blogs available.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>

        <footer class="text-white py-3 mt-5 text-center">
            &copy; <?= date('Y') ?> My Blog. All rights reserved.
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('click', function(e) {
            if (e.target.matches('.ajax-link')) {
                e.preventDefault();
                const url = e.target.href;

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        document.getElementById('mainContent').innerHTML = html;
                        history.pushState(null, '', url);
                    })
                    .catch(err => console.error(err));
            }
        });

        window.addEventListener('popstate', () => {
            location.reload();
        });
    </script>
</body>

</html>