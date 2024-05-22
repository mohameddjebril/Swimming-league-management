<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<ul class="navbar-nav">	
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Agent</a>
            </li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="wd-30 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/agent_img/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
								</div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
                    <a href="{{ route('agent.profile') }}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="{{ route('agent.change.password') }}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="edit"></i>
                      <span>Change Password</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="{{ route('agent.logout') }}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Log Out</span>
                    </a>
                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
		  </nav>