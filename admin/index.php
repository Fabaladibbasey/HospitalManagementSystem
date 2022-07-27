<?php include_once '../views/partial/header.php' ?>

<div class="container-fluid">
	<div class="row flex-nowrap">
		<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark" id="text-white">
			<!-- <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;"> -->
			<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
				<a href="../admin/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
					<span class="fs-5 d-none d-sm-inline">Menu</span>
				</a>
				<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
					<li class="nav-item">
						<a href="../admin/" class="nav-link align-middle px-0">
							<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
							<i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">staff</span> </a>
						<ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
							<li class="w-100">
								<a href="../admin/index.php?req=list_staff" class="nav-link px-0"> <span class="d-none d-sm-inline">
										manage staff</span> </a>
							</li>
							<li>
								<a href="../admin/index.php?req=rmstaff" class="nav-link px-0"> <span class="d-none d-sm-inline">remove</span> staff </a>
							</li>
						</ul>
					</li>
					<li>
						<a href="../admin/index.php?req=patients" class="nav-link px-0 align-middle">
							<i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">patients</span></a>
					</li>
					<li>
						<a href="../admin/index.php?req=prescriptions" class="nav-link px-0 align-middle">
							<i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">prescriptions</span></a>
					</li>
					<li>
						<a href="../admin/index.php?req=appointments" class="nav-link px-0 align-middle">
							<i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">appointments</span></a>
						<!-- <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">prescriptions</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                            </li>
                        </ul> -->
					</li>
					<li>
						<a href="../admin/index.php?req=account" class="nav-link px-0 align-middle">
							<i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">account</span></a>
						<!-- <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">enquries</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                            </li>
                        </ul> -->
					</li>
					<li>
						<a href="../admin/index.php?req=enq" class="nav-link px-0 align-middle">
							<i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">enquries</span> </a>
					</li>
				</ul>
				<hr>
				<div class="dropdown pb-4">
					<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
						<!-- https://github.com/mdo.png -->
						<img src="./images/myPic-min.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
						<span class="d-none d-sm-inline mx-1">fabala</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-dark text-small shadow">
						<li><a class="dropdown-item" href="#">Schedule Meeting...</a></li>
						<li><a class="dropdown-item" href="#">Settings</a></li>
						<li><a class="dropdown-item" href="#">Profile</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="/hospitalManagementSystem/home/index.php">Sign out</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col py-3">
			<!-- Content area... -->
			<?php
			if ($_GET['req'] == 'enroll_staff') {
				include_once '../admin/staff/registerStaff.php';
			} elseif ($_GET['req'] == 'list_staff' && !$_GET['id']) {
				include_once '../admin/staff/staffList.php';
			} elseif ($_GET['req'] == 'list_staff' && $_GET['id']) {
				include_once '../admin/staff/staffProfile.php';
			} elseif ($_GET['req'] == 'upd' && $_GET['id']) {
				include_once '../admin/staff/updateStaff.php';
			} elseif ($_GET['req'] == 'rmstaff') {
				include_once '../admin/staff/unenrollStaff.php';
			} elseif ($_GET['req'] == 'enq') {
				include_once '../admin/enquiry/index.php';
			} elseif ($_GET['req'] == 'account') {
				include_once '../admin/Account/index.php';
			} elseif ($_GET['req'] == 'prescriptions') {
				include_once '../admin/Precriptions/index.php';
			} elseif ($_GET['req'] == 'appointments') {
				include_once '../admin/Appointments/index.php';
			} elseif ($_GET['req'] == 'patients') {
				include_once '../admin/Patients/index.php';
			} else {
				include_once '../admin/dashboard.php';
			} ?>
		</div>
	</div>
</div>

<?php include '../views/partial/footer.php'; ?>