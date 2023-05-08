<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">

        <?php
        if (logged_in()) {
            if (in_groups('admin')) echo view("/temp/layout/sidenav/admin");
            if (in_groups('kepala-desa'))  echo view("/temp/layout/sidenav/kepaladesa");
        }
        ?>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title"><?= logged_in() ? user()->nama_user : '' ?></div>
        </div>
    </div>
</nav>