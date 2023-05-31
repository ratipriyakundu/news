
<?php
$user_id=session()->get('user_id');
$user_info= DB::table('admins')->where('id',$user_id)->first();
$user_prmission=explode(',',$user_info->permission);
?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <?php
    $logo= DB::table('logo')->where('id',1)->first();?>
      <img src="uploads/logo/<?php echo $logo->logo;?>" class="" style="width: 25%;height: 41px; margin-top: -12px;margin-left: 76px;">
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                

              </p>
            </a>
            
          </li>
<?php
if(in_array('Manage Subadmin',$user_prmission)){?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Subadmin
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('subadmin-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subadmin List</p>
                </a>
              </li>
                       
            </ul>
          </li>
       <?php } if(in_array('Manage Advertisement',$user_prmission)){?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                 Advertisement
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('manage-ads')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ads List</p>
                </a>
              </li>
                       
            </ul>
          </li>
<?php } if(in_array('Manage Categories',$user_prmission)){?>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Categories
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subcategory-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subcategories</p>
                </a>
              </li>
                       
            </ul>
          </li>
<?php } if(in_array('Manage Footer',$user_prmission)){?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Footer Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('menu-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('manage-pages')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Pages</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('social-links')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Links</p>
                </a>
              </li>
              
              
            </ul>
          </li>
<?php } if(in_array('Manage News',$user_prmission)){?>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Manage News
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('news-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('post-news')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add News</p>
                </a>
              </li>
              
              
            </ul>
          </li>
		  <?php } if(in_array('Manage Header',$user_prmission)){?>
		  <li class="nav-item">
            <a href="{{route('manage-header-banner')}}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Manage Header Banner
                
              </p>
            </a>
            
          </li>
       <?php } if(in_array('Manage Logo',$user_prmission)){ ?>
          <li class="nav-item">
            <a href="{{route('manage-logo')}}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Manage Logo
                
              </p>
            </a>
            
          </li>
<?php } if(in_array('Manage Home Page',$user_prmission)){?>
          <li class="nav-item d-none">
            <a href="{{route('manage-home')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Manage Home Page
                
              </p>
            </a>
            
          </li>
          <?php }?>

          @if(in_array('Manage Home Page',$user_prmission))
            <li class="nav-item d-none">
              <a href="{{route('home-page-builder')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home Page Builder
                </p>
              </a>
            </li>
          @endif

          @if(in_array('Manage Home Page',$user_prmission))
            <li class="nav-item d-none">
              <a href="{{route('templates')}}" class="nav-link">
                <i class="nav-icon fas fa-image"></i>
                <p>
                  Add Template
                </p>
              </a>
            </li>
          @endif
          
          <li>

          <a href="{{route('logout')}}" class="nav-link bg-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                
              </p>
            </a>
</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>