<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Category List</h2>
    <a href="<?= base_url('admin/category/create') ?>" class="btn btn-primary mb-3">Add New Category</a>

    <table class="table table-bordered table-hover" id="categoryTable">
        <thead class="">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $index => $category): ?>
                    <tr id="row-<?= $category['id'] ?>">
                        <td><?= $index + 1 ?></td>
                        <td class="category-name"><?= esc($category['name']) ?></td>
                        <td><?= date('Y-m-d', strtotime($category['created_at'])) ?></td>
                        <td>
                            <button class="btn btn-sm btn-warning btn-edit" data-id="<?= $category['id'] ?>" data-name="<?= esc($category['name']) ?>">Edit</button>
                            <button class="btn btn-sm btn-danger btn-delete" data-id="<?= $category['id'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No categories found.</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>

<!-- Modal for Editing -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editCategoryForm" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="edit-category-id">
                <div class="mb-3">
                    <label for="edit-category-name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" id="edit-category-name" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // DELETE
        $('.btn-delete').on('click', function() {
            if (!confirm('Are you sure to delete this category?')) return;

            const id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('admin/category/delete/') ?>' + id,
                type: 'DELETE',
                success: function(res) {
                    alert(res.message);
                    $('#row-' + id).remove();
                },
                error: function() {
                    alert('Error deleting category.');
                }
            });
        });

        // SHOW EDIT MODAL
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            $('#edit-category-id').val(id);
            $('#edit-category-name').val(name);
            new bootstrap.Modal(document.getElementById('editCategoryModal')).show();
        });

        // SUBMIT EDIT
        $('#editCategoryForm').on('submit', function(e) {
            e.preventDefault();
            const id = $('#edit-category-id').val();
            const name = $('#edit-category-name').val();

            $.ajax({
                url: '<?= base_url('admin/category/update') ?>',
                type: 'POST',
                data: {
                    id,
                    name
                },
                success: function(res) {
                    alert(res.message);
                    $('#row-' + id + ' .category-name').text(name);
                    bootstrap.Modal.getInstance(document.getElementById('editCategoryModal')).hide();
                },
                error: function() {
                    alert('Failed to update category.');
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>