<!-- Sidebar -->
<div class="site-overlay"></div>
<div class="site-sidebar" style="background-color: #373944">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <li class="menu-title">مینو ها</li>

      <li class="with-sub">
        <a href="{{route('home')}}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-home"></i></span>
          <span class="s-text">داشبورد</span>
        </a>
      </li>


      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-wpforms"></i></span>
          <span class="s-text">پست ها</span>
        </a>
        <ul>
          <li><a href="{{route('order')}}">افزودن سفارش جدید</a></li>
          <li><a href="{{route('pendingOrders')}}">در حال پراسیس</a></li>
          <li><a href="{{route('sentOrders')}}">ارسال شده</a></li>
          <li><a href="{{route('readyOrders')}}">آماده ی تحویل</a></li>
          <li><a href="{{route('deliveredOrders')}}">تحویل داده شده</a></li>
        </ul>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '2'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>">
        <a href="{{route('company')}}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-bank"></i></span>
          <span class="s-text">نمایندگی ها</span>
        </a>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '2'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>">
        <a href="{{route('service')}}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-settings"></i></span>
          <span class="s-text">خدمات</span>
        </a>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '2'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>">
        <a href="{{route('bio')}}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-info-alt"></i></span>
          <span class="s-text">درباره</span>
        </a>
      </li>


      <li class="with-sub <?php if (Auth::user()->isAdmin == '2'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>">
        <a href="{{route('contact')}}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-comments-smiley"></i></span>
          <span class="s-text">پیام ها</span>
        </a>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '2'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-group"></i></span>
          <span class="s-text">کاربران</span>
        </a>
        <ul>
          <li><a href="/addUser">اضافه نمودن کاربر جدید</a></li>
          <li><a href="{{route('userList')}}">لیست کاربران</a></li>
          <li><a href="{{ route('blockList') }}">کاربران بلاک شده</a></li>
        </ul>
      </li>

    </ul>
  </div>
</div>
<!-- Aside End -->
