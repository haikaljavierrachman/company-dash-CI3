<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-secret"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Belajar Web</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menu. id, menu
        FROM user_menu JOIN user_access_menu 
          ON user_menu. id = user_access_menu. menu_id
       WHERE role_id = $role_id
       ORDER BY user_access_menu. menu_id ASC
       ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Looping Menu -->
    <?php foreach ($menu as $m) :  ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- Sub menu sesuai menu -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                        FROM user_sub_menu 
                    WHERE user_sub_menu. menu_id = $menuId
                        AND user_sub_menu. is_active = 1
       ";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else :  ?>
                <li class="nav-item">
                <?php endif;  ?>

                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>

        <?php endforeach;  ?>

        <hr class="sidebar-divider">

    <?php endforeach;  ?>


    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-power-off"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->