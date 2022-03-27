<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element">
					<img src="/img/profile_small.jpg" class="img-thumbnail" style="border-radius: 50%; margin: auto; display: block;" width="50%" alt="">
					<a data-toggle="dropdown" class="dropdown-toggle text-center" href="#">
						<span class="block m-t-xs font-bold">Wasteco</span>
					</a>
				</div>
				<div class="logo-element">
					IN+
				</div>
			</li>
			<li class="<?= $title === 'Dashboard | NCP' ? 'active' : '' ?>">
				<a href="<?= base_url('/'); ?>"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
			</li>
			<li class="<?= $title === 'Challenges | NCP' ? 'active' : '' ?>">
				<a href="<?= base_url('/challenge'); ?>"><i class="fa fa-home"></i> <span class="nav-label">Challenges</span> </a>
			</li>
			<li class="<?= $title === 'Users | NCP' ? 'active' : '' ?>">
				<a href="<?= base_url('/user'); ?>"><i class="fa fa-home"></i> <span class="nav-label">Users</span> </a>
			</li>
		</ul>
	</div>
</nav>