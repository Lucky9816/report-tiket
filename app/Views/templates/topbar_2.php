	<body>
		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
			</div>
			<div class="header-right">
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
							<span class="user-icon">
								<img src="<?= base_url() ?>assets/src/images/profile.png" />
							</span>
							<span class="user-name"><?= $pengguna['nama'] ?></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
							<a class="dropdown-item" href="<?= base_url() ?>pengguna/profil"><i class="dw dw-user1"></i> Profil</a>
							<a class="dropdown-item" href="<?= base_url() ?>logout"><i class="dw dw-logout"></i> Keluar</a>
						</div>
					</div>
				</div>
			</div>
		</div>