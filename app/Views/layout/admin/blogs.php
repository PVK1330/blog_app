<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container mt-4">
    <h2>Blog List</h2>

    <a href="<?= base_url('admin/create') ?>" class="btn btn-primary mb-3  float-end">Add New Blog</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Short Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($blogs)): ?>
                <?php foreach ($blogs as $index => $blog): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td title="<?= esc($blog['title']) ?>"><?= esc(mb_strimwidth($blog['title'], 0, 50, '...')) ?></td>
                        <td><?= isset($categoryMap[$blog['category']]) ? esc($categoryMap[$blog['category']]) : 'Unknown' ?></td>
                        <td><?= esc($adminMap[$blog['author_name']] ?? 'Unknown Admin') ?></td>
                        <td><?= esc(substr($blog['short_content'], 0, 50)) ?>...</td>
                        <td><?= date('Y-m-d', strtotime($blog['created_at'])) ?></td>
                        <td>
                            <a href="<?= base_url('admin/edit/' . $blog['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger btn-delete" data-id="<?= $blog['id'] ?>">Delete</button>
                        </td>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No blogs found.</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function() {
        $('.btn-delete').click(function() {
            if (!confirm('Are you sure you want to delete this blog?')) {
                return;
            }

            const blogId = $(this).data('id');
            const btn = $(this);

            $.ajax({
                url: "<?= base_url('admin/delete') ?>/" + blogId,
                type: "DELETE",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.message);
                        btn.closest('tr').fadeOut(500, function() {
                            $(this).remove();
                        });
                    } else {
                        alert('Failed to delete the blog.');
                    }
                },
                error: function() {
                    alert('Error occurred while deleting the blog.');
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>