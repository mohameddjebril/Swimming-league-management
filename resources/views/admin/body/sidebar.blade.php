<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          LEAGUE<span>Bejaia</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href=" {{ route('admin.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          {{-- <li class="nav-item nav-category">Pages</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
              <i class="link-icon" data-feather="unlock"></i>
              <span class="link-title">Authentication</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="authPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/auth/login.html" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                  <a href="pages/auth/register.html" class="nav-link">Register</a>
                </li>
              </ul>
            </div>
         </li> --> --}}

           <li class="nav-item nav-category">LEAGUE</li>
            <li class="nav-item">
              <a href="{{route('admin.indexL')}}" class="nav-link">
                  <i class="link-icon" data-feather="user"></i>
                  <span class="link-title">Athletes</span>
              </a>
           </li>
            <li class="nav-item">
              <a href="{{route('admin.indexDemA')}}" class="nav-link">
                  <i class="link-icon" data-feather="user"></i>
                  <span class="link-title">demende inscription</span>
              </a>
           </li>
        


          <li class="nav-item">
            <a href="{{route('clubs.index')}}" class="nav-link">
              <i class="link-icon" data-feather="shield"></i>
              <span class="link-title">Clubs</span>
          </a>
          </li>
          
          <li class="nav-item">
              <a href="{{route('clubs.indexA')}}" class="nav-link">
                  <i class="link-icon" data-feather="settings"></i>
                  <span class="link-title">Admin</span>
              </a>
          </li>
          
          <li class="nav-item">
              <a href="{{route('presidents.index')}}" class="nav-link">
                  <i class="link-icon" data-feather="users"></i>
                  <span class="link-title">Presidents</span>
              </a>
          </li>


          <li class="nav-item">
            <a href="{{route('epreuves.index')}}" class="nav-link">
              <i class="link-icon" data-feather="shield"></i>
              <span class="link-title">Epreuves</span>
          </a>
          </li>
          
          <li class="nav-item">
              <a href="{{route('competitions.index')}}" class="nav-link">
                  <i class="link-icon" data-feather="calendar"></i>
                  <span class="link-title">Competitions</span>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{route('admin.athcompsDemd')}}" class="nav-link">
                  <i class="link-icon" data-feather="calendar"></i>
                  <span class="link-title">Dem Competitions</span>
              </a>
          </li>


          <li class="nav-item">
              <a href="{{route('admin.athcompsAthl')}}" class="nav-link">
                  <i class="link-icon" data-feather="calendar"></i>
                  <span class="link-title">Ath Competitions</span>
              </a>
          </li>
          


        </ul>
      </div>
     </nav>