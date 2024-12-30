<div class="left-side-bar">
    <div class="brand-logo">
        <a>
            <img alt="Responsive image" style="width:110px;height:50px;" src="<?= base_url() ?>assets/vendors/images/lti-logo2.png" class="dark-logo">
            <img alt="Responsive image" style="width:110px;height:50px;" src="<?= base_url() ?>assets/vendors/images/lti-logo2.png" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    </br>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="<?= base_url() ?>" class="dropdown-toggle no-arrow" id="home">
                        <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <?php if ($pengguna['hak_akses'] == 2) { ?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-file"></span><span class="mtext">My Task</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?= base_url() ?>mytask_tiket_reguler" id="mytask_tiket_reguler">Tiket</a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($pengguna['hak_akses'] == 1) { ?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-file"></span><span class="mtext">Task</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?= base_url() ?>tiket_reguler" id="tiket_reguler">Tiket</a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($pengguna['hak_akses'] == 2) { ?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-file"></span><span class="mtext">Closed Task</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?= base_url() ?>closed_tiket_reguler" id="closed_tiket_reguler">Tiket</a></li>
                    </ul>
                </li>
                <?php } ?>                
                <?php if ($pengguna['hak_akses'] == 1) { ?>
                    <li>
                        <a href="<?= base_url() ?>pengguna" class="dropdown-toggle no-arrow" id="pengguna">
                            <span class="micon bi bi-people"></span><span class="mtext">Pengguna</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>