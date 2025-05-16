<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="<?= base_url('admin/dashboard') ?>">
                        <img src="<?= base_url() ?>public/assets/img/icons/dashboard.svg" alt="img">
                        <span> Dashboard</span>
                    </a>
                </li>

                <!-- Blog Management -->
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <i class="ion-document-text"></i>
                        <span> Blogs</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="<?= base_url('admin/blogs') ?>">Blog List</a></li>
                        <li><a href="<?= base_url('admin/create') ?>">Add New Blog</a></li>
                        <li><a href="<?= base_url('admin/category') ?>">Categories List</a></li>
                        <li><a href="<?= base_url('admin/addCategory') ?>">Blog Categories</a></li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <i class="ion-log-out"></i>
                        <span>Logout</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="<?= base_url('admin/logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
