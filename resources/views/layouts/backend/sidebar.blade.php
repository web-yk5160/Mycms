 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Auth::user()->gravatar() }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="{{ url('/home')}}">
            <i class="fa fa-dashboard"></i> <span>ダッシュボード</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>ブログ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backend.blog.index') }}"><i class="fa fa-circle-o"></i>全ての投稿</a></li>
            <li><a href="{{ route('backend.blog.create') }}"><i class="fa fa-circle-o"></i>新規追加</a></li>
          </ul>
        </li>
        @if (check_user_permissions(request(), "Categories@index"))
          <li><a href="{{ route('backend.categories.index') }}"><i class="fa fa-folder"></i> <span>カテゴリー</span></a></li>
        @endif
        @if (check_user_permissions(request(), "Tags@index"))
          <li><a href="{{ route('backend.tags.index') }}"><i class="fa fa-tags"></i> <span>タグ</span></a></li>
        @endif
        @if (check_user_permissions(request(), "Users@index"))
          <li><a href="{{ route('backend.users.index') }}"><i class="fa fa-users"></i> <span>ユーザー</span></a></li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>