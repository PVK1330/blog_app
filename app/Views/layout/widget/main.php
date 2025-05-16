<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="row">
    <!-- Total Posts -->
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget">
            <div class="dash-widgetimg">
                <span><i class="ion-document-text" style="font-size: 30px;"></i></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span class="counters" data-count="120">120</span></h5>
                <h6>Total Posts</h6>
            </div>
        </div>
    </div>

    <!-- Total Authors -->
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash1">
            <div class="dash-widgetimg">
                <span><i class="ion-person-stalker" style="font-size: 30px;"></i></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span class="counters" data-count="15">15</span></h5>
                <h6>Total Authors</h6>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash2">
            <div class="dash-widgetimg">
                <span><i class="ion-pricetags" style="font-size: 30px;"></i></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span class="counters" data-count="8">8</span></h5>
                <h6>Blog Categories</h6>
            </div>
        </div>
    </div>

    <!-- Comments -->
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash3">
            <div class="dash-widgetimg">
                <span><i class="ion-chatboxes" style="font-size: 30px;"></i></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span class="counters" data-count="345">345</span></h5>
                <h6>Total Comments</h6>
            </div>
        </div>
    </div>
</div>

<!-- Chart and Recent Posts -->
<div class="row">
    <!-- Blog Stats Chart -->
    <div class="col-lg-7 col-sm-12 col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Post Activity (Monthly)</h5>
            </div>
            <div class="card-body">
                <div id="blog-activity-chart" class="chart-set"></div>
            </div>
        </div>
    </div>

    <!-- Recently Added Posts -->
    <div class="col-lg-5 col-sm-12 col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Recently Added Posts</h4>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('admin/blog-list') ?>" class="dropdown-item">View All Posts</a></li>
                        <li><a href="<?= base_url('admin/blog-add') ?>" class="dropdown-item">Add New Post</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive dataview">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example static entries -->
                            <tr>
                                <td>1</td>
                                <td><a href="<?= base_url('blog/1') ?>">How to Start Blogging</a></td>
                                <td>Admin</td>
                                <td>2025-05-15</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="<?= base_url('blog/2') ?>">SEO Tips for Beginners</a></td>
                                <td>John Doe</td>
                                <td>2025-05-13</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><a href="<?= base_url('blog/3') ?>">Laravel vs CodeIgniter</a></td>
                                <td>Jane Smith</td>
                                <td>2025-05-10</td>
                            </tr>
                            <!-- You can dynamically loop through posts using PHP here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional Additional Chart -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-title">Posts Per Category</h5>
    </div>
    <div class="card-body">
        <div id="category-chart" class="chart-set"></div>
    </div>
</div>

<?= $this->endSection() ?>
