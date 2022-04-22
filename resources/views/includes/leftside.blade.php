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

            {{-- Category --}}
            <li class="nav-item ">
               <a href="{{ route('category') }}" class="nav-link {{ (request()->routeIs('category*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-book-reader"></i>
                  <p>Member Category</p>
               </a>
            </li>

            {{-- Category --}}
            <li class="nav-item ">
               <a href="{{ route('settings') }}" class="nav-link {{ (request()->routeIs('settings*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-book-reader"></i>
                  <p>Settings</p>
               </a>
            </li>         

           {{--  <li class="nav-header">Alternative Book</li>

            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book-reader"></i>
                  <p>All Class
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview pl-2">
                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="far fa-address-book nav-icon"></i>
                        <p>Class 1
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview pl-2">
                        <li class="nav-item">
                           <a href="#" class="nav-link">
                              <i class="fas fa-book-open nav-icon"></i>
                              <p>All Books
                                 <i class="right fas fa-angle-left"></i>
                              </p>
                           </a>
                           <ul class="nav nav-treeview pl-2">
                              <li class="nav-item">
                                 <a href="" class="nav-link">
                                    <i class="fab fa-creative-commons-sampling nav-icon"></i>
                                    <p>Creative</p>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="" class="nav-link">
                                    <i class="fas fa-calculator nav-icon"></i>
                                    <p>MCQ</p>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>মডেল টেষ্ট</p>
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </li>
               </ul>
            </li>

            <li class="nav-item menu-open">
               <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                     Charts
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="#" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>ChartJS</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Flot</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inline</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>uPlot</p>
                     </a>
                  </li>
               </ul>
            </li> --}}

         </ul>
      </nav>
   </div>
</aside>
