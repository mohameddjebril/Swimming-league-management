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
            <a href="{{ route('agent.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          <!-- </li>
          <li class="nav-item nav-category">Pages</li>
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
         </li> -->

         <li class="nav-item nav-category">LEAGUE</li>

         <li class="nav-item">
             <a href="{{route('agent.athletes.index')}}" class="nav-link">
                 <i class="link-icon" data-feather="user"></i>
                 <span class="link-title">Athletes</span>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('agent.athletes.indexAcceptATH')}}" class="nav-link">
                 <i class="link-icon" data-feather="user"></i>
                 <span class="link-title">Athletes Accept</span>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('agent.athletes.indexAttenteATH')}}" class="nav-link">
                 <i class="link-icon" data-feather="user"></i>
                 <span class="link-title">Athletes Attente</span>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('agent.athletes.indexRejectATH')}}" class="nav-link">
                 <i class="link-icon" data-feather="user"></i>
                 <span class="link-title">Athletes Reject</span>
             </a>
         </li>
         
         <li class="nav-item">
             <a href="{{route('competitions.indexLcomp')}}" class="nav-link">
                 <i class="link-icon" data-feather="calendar"></i>
                 <span class="link-title">Competitions</span>
             </a>
         </li>


         <li class="nav-item">
             <a href="{{route('athcomps.athcompsAtt')}}" class="nav-link">
                 <i class="link-icon" data-feather="calendar"></i>
                 <span class="link-title">en attent</span>
             </a>
         </li>

         <li class="nav-item">
             <a href="{{route('athcomps.athcompsAcc')}}" class="nav-link">
                 <i class="link-icon" data-feather="calendar"></i>
                 <span class="link-title">Accept</span>
             </a>
         </li>

         <li class="nav-item">
             <a href="{{route('athcomps.athcompsRef')}}" class="nav-link">
                 <i class="link-icon" data-feather="calendar"></i>
                 <span class="link-title">refuse</span>
             </a>
         </li>
         


        </ul>
      </div>
     </nav>