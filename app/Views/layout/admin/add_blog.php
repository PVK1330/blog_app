<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<style>
    .page-wrapper {
        margin-left: 150px;
        padding: 60px 0 0;
        position: relative;
        transition: all 0.2s ease;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add New Blog</h4>
                <h6>Create a new blog post</h6>
            </div>
        </div>

        <form id="addBlogForm" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">

                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= esc($cat['id']) ?>"><?= esc($cat['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="image">Feature Image</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="col-lg-12 col-12">
                    <div class="form-group">
                        <label for="short_content">Short Description</label>
                        <textarea id="short_content" name="short_content" class="form-control" rows="3" required></textarea>
                    </div>
                </div>

                <div class="col-lg-12 col-12">
                    <div class="form-group">
                        <label for="content">Main Content</label>
                        <textarea id="content" name="content" class="form-control" rows="6" required></textarea>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title" class="form-control">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" class="form-control" rows="2"></textarea>
                    </div>
                </div>

                <div class="col-lg-12 mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('admin/blogs') ?>" class="btn btn-secondary">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('addBlogForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;

        fetch("<?= base_url('admin/store') ?>", {
            method: 'POST',
            body: formData,
            headers: {
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.status) {
                alert(data.message);
                window.location.href = "<?= base_url('admin/blogs') ?>";
            } else {
                let errorMessages = Object.values(data.errors || {}).join('\n');
                alert('Error:\n' + errorMessages);
            }
        })
        .catch(() => {
            alert('An unexpected error occurred.');
        })
        .finally(() => {
            submitBtn.disabled = false;
        });
    });
</script>

<?= $this->endSection() ?>
