<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container mt-4">
    <h2>Edit Blog</h2>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form id="editBlogForm" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= esc($blog['id']) ?>">

        <div class="form-group mb-3">
            <label for="title">Blog Title</label>
            <input type="text" name="title" class="form-control" value="<?= esc($blog['title']) ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category" class="form-control" required>
                <option value="">Select</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $blog['category'] ? 'selected' : '' ?>>
                        <?= esc($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="short_content">Short Description</label>
            <textarea name="short_content" class="form-control" rows="3" required><?= esc($blog['short_content']) ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="content">Main Content</label>
            <textarea name="content" class="form-control" rows="6"><?= esc($blog['content']) ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Feature Image</label>
            <input type="file" name="image" class="form-control">
            <?php if ($blog['image']): ?>
                <img src="<?= base_url('uploads/blogs/' . $blog['image']) ?>" alt="Current Image" width="150" class="mt-2">
            <?php endif; ?>
        </div>

        <div class="form-group mb-3">
            <label for="meta_title">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" value="<?= esc($blog['meta_title']) ?>">
        </div>

        <div class="form-group mb-3">
            <label for="meta_description">Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="2"><?= esc($blog['meta_description']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
        <a href="<?= base_url('admin/blogs') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
document.getElementById('editBlogForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch("<?= base_url('admin/update') ?>", {
        method: 'POST',
        body: formData,
    })
    .then(res => res.json())
    .then(data => {
        if(data.status) {
            alert(data.message);
            window.location.href = "<?= base_url('admin/blogs') ?>";
        } else {
            alert('Error: ' + Object.values(data.errors).join('\n'));
        }
    })
    .catch(() => alert('Something went wrong'));
});
</script>

<?= $this->endSection() ?>
