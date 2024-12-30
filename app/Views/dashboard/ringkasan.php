<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
		<div class="title pb-20">
			<h2 class="h3 mb-0">Ringkasan Task</h2>
		</div>
		<div class="row pb-10">
			<!-- Open -->
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-18 text-dark"><?= $openCount ?></div>
							<div class="font-14 text-secondary weight-500">Open</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#00eccf">
								<i class="icon-copy fa fa-truck"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- In Progress -->
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-18 text-dark"><?= $inProgressCount ?></div>
							<div class="font-14 text-secondary weight-500">In Progress</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#ff5b5b">
								<i class="icon-copy fa fa-users"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Closed -->
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-18 text-dark"><?= $closedCount ?></div>
							<div class="font-14 text-secondary weight-500">Closed</div>
						</div>
						<div class="widget-icon">
							<div class="icon">
								<i class="micon bi bi-boxes" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- All -->
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-18 text-dark"><?= $allCount ?></div>
							<div class="font-14 text-secondary weight-500">All</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#09cc06">
								<i class="fa fa-check-circle" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card-box pb-10">
			<div class="h5 pd-20 mb-0">Daftar Petugas</div>
			<table class="data-table table nowrap">
				<thead>
					<tr>
						<th class="table-plus">Nama Petugas</th>
						<th>Open</th>
						<th>In Progress</th>
						<th>Closed</th>
						<th>All</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($petugasData as $petugas): ?>
						<tr>
							<td><?= $petugas['nama'] ?></td>
							<td><?= $petugas['open'] ?></td>
							<td><?= $petugas['in_progress'] ?></td>
							<td><?= $petugas['closed'] ?></td>
							<td><?= $petugas['all'] ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>


<script>
	const user_manage = document.querySelector('#dashboard');
	user_manage.classList.add('active');
</script>