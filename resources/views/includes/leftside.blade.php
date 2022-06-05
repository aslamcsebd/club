<aside class="main-sidebar sidebar-dark-primary elevation-4" >
   <a href="{{ url('/') }}" class="brand-link bbg-light">
      <i lass="nav-icon fas fa-school"></i>
      <span class="brand-text font-weight-light text-center pl-2">Victory Loves Preparation</span>
   </a>
   <div class="sidebar">
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
            
            {{-- Member --}}
            <li class="nav-item start as-treeview {{ (request()->routeIs('member*'))  ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ (request()->routeIs('member*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Registration<i class="right fas fa-angle-left"></i></p>
               </a>
               <ul class="nav nav-treeview pl-3 sub-menu">
                  <li class="nav-item">
                     <a href="{{ route('member.new') }}" class="nav-link {{ (request()->routeIs('member.new*'))  ? 'active' : '' }}">
                       {{-- <i class="far fa-address-book nav-icon"></i> --}}
                        <p>Add member</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('member.all') }}" class="nav-link {{ (request()->routeIs('member.all*'))  ? 'active' : '' }}">
                        {{-- <i class="far fa-address-book nav-icon"></i> --}}
                        <p>All member</p>
                     </a>
                  </li>
               </ul>
            </li>            

            {{-- Notices --}}
            <li class="nav-item start as-treeview {{ (request()->routeIs('notice*'))  ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ (request()->routeIs('notice*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Notices<i class="right fas fa-angle-left"></i></p>
               </a>
               <ul class="nav nav-treeview pl-3 sub-menu">
                  <li class="nav-item">
                     <a href="{{ route('notice.new') }}" class="nav-link {{ (request()->routeIs('notice.new*'))  ? 'active' : '' }}">
                       <i class="far fa-address-book nav-icon"></i>
                        <p>Add notice</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('notice.all') }}" class="nav-link {{ (request()->routeIs('notice.all*'))  ? 'active' : '' }}">
                        <i class="far fa-address-book nav-icon"></i>
                        <p>All notice</p>
                     </a>
                  </li>
               </ul>
            </li>

            {{-- File --}}
            <li class="nav-item start as-treeview {{ (request()->routeIs('file*'))  ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ (request()->routeIs('file*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>File<i class="right fas fa-angle-left"></i></p>
               </a>
               <ul class="nav nav-treeview pl-3 sub-menu">
                  <li class="nav-item">
                     <a href="{{ route('file.new') }}" class="nav-link {{ (request()->routeIs('file.new*'))  ? 'active' : '' }}">
                       <i class="far fa-address-book nav-icon"></i>
                        <p>Add file</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('file.all') }}" class="nav-link {{ (request()->routeIs('file.all*'))  ? 'active' : '' }}">
                        <i class="far fa-address-book nav-icon"></i>
                        <p>All file</p>
                     </a>
                  </li>
               </ul>
            </li>

            {{-- Head Parent --}}
            <li class="nav-item start as-treeview {{ (request()->routeIs('head*'))  ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ (request()->routeIs('head*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Heads<i class="right fas fa-angle-left"></i></p>
               </a>
               <ul class="nav nav-treeview pl-3 sub-menu">
                  <li class="nav-item">
                     <a href="{{ route('head.new') }}" class="nav-link {{ (request()->routeIs('head.new*'))  ? 'active' : '' }}">
                       <i class="far fa-address-book nav-icon"></i>
                        <p>Add head</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('head.all') }}" class="nav-link {{ (request()->routeIs('head.all*'))  ? 'active' : '' }}">
                        <i class="far fa-address-book nav-icon"></i>
                        <p>All head</p>
                     </a>
                  </li>
               </ul>
            </li>

            {{-- Users --}}
            <li class="nav-item start as-treeview {{ (request()->routeIs('user*'))  ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ (request()->routeIs('user*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Users<i class="right fas fa-angle-left"></i></p>
               </a>
               <ul class="nav nav-treeview pl-3 sub-menu">
                  <li class="nav-item">
                     <a href="{{ route('user.new') }}" class="nav-link {{ (request()->routeIs('user.new*'))  ? 'active' : '' }}">
                       <i class="far fa-address-book nav-icon"></i>
                        <p>Add user</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('user.all') }}" class="nav-link {{ (request()->routeIs('user.all*'))  ? 'active' : '' }}">
                        <i class="far fa-address-book nav-icon"></i>
                        <p>All user</p>
                     </a>
                  </li>
               </ul>
            </li>

            {{-- Settings --}}
            <li class="nav-item ">
               <a href="{{ route('settings') }}" class="nav-link {{ (request()->routeIs('settings*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-book-reader"></i>
                  <p>Settings</p>
               </a>
            </li>

         </ul>
      </nav>
   </div>
</aside>
