<!-- BEGIN: Side Menu -->
<nav class="side-nav">
  <a href="" class="intro-x flex items-center pl-5 pt-4">
    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('storage/posts/dist/images/logo.svg') }}">
    <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
  </a>
  <div class="side-nav__devider my-6"></div>
  <ul>
    <li>
      <a href="{{ url('/') }}" class="side-menu {{ request()->is('/') ? 'side-menu--active' : '' }}">
        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
        <div class="side-menu__title"> Dashboard </div>
      </a>
    </li>
    <li>
      <a href="{{ route('kategori.index') }}"
        class="side-menu {{ request()->routeIs('kategori.index') ? 'side-menu--active' : '' }}">
        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="side-menu__title"> Category </div>
      </a>
    </li>
    <li>
      <a href="#"
        class="side-menu {{ request()->routeIs('produk.index', 'produk.create', 'produk.edit') ? 'side-menu--active' : '' }}">
        <div class="side-menu__icon"> <i data-feather="box"></i> </div>
        <div class="side-menu__title"> Product <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
        </div>
      </a>
      <ul class="">
        <li>
          <a href="{{ route('produk.create') }}" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
            <div class="side-menu__title"> Create Product </div>
          </a>
        </li>
        <li>
          <a href="{{ route('produk.index') }}" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
            <div class="side-menu__title"> List Products </div>
          </a>
        </li>
        <li>
          <a href="top-menu-dashboard.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
            <div class="side-menu__title"> Stock </div>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="side-menu {{ request()->routeIs('carts.index','transactions.index') ? 'side-menu--active' : '' }}">
        <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
        <div class="side-menu__title"> Transaction <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
        </div>
      </a>
      <ul class="">
        <li>
          <a href="{{ route('carts.index') }}" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
            <div class="side-menu__title"> New Transaction </div>
          </a>
        </li>
        <li>
          <a href="{{ route('transactions.index') }}" class="side-menu">
            <div class="side-menu__icon"> 
              <i data-feather="shopping-bag"></i> 
            </div>
            <div class="side-menu__title"> List Transactions </div>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#" class="side-menu">
        <div class="side-menu__icon"> <i data-feather="clipboard"></i> </div>
        <div class="side-menu__title"> Report <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
        </div>
      </a>
      <ul class="">
        <li>
          <a href="{{ route('produk.create') }}" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
            <div class="side-menu__title"> Product </div>
          </a>
        </li>
        <li>
          <a href="{{ route('produk.create') }}" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
            <div class="side-menu__title"> Category </div>
          </a>
        </li>
        <li>
          <a href="top-menu-dashboard.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
            <div class="side-menu__title"> Transaction </div>
          </a>
        </li>
      </ul>
    </li>


  </ul>
</nav>
<!-- END: Side Menu -->
