<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container mt-4">
    <h2>Add Blog Category</h2>

    <div id="responseMessage"></div>

    <form id="addCategoryForm" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="form-group mb-3">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>

<script>
    $('#addCategoryForm').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: "<?= base_url('admin/store-category') ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status) {
                    $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                    $('#addCategoryForm')[0].reset();
                } else {
                    let errors = '';
                    $.each(response.errors, function(key, value) {
                        errors += '<li>' + value + '</li>';
                    });
                    $('#responseMessage').html('<div class="alert alert-danger"><ul>' + errors + '</ul></div>');
                }
            },
            error: function() {
                $('#responseMessage').html('<div class="alert alert-danger">An error occurred while saving.</div>');
            }
        });
    });
</script>

<?= $this->endSection() ?>
