<!-- BEGIN: Top Bar -->
<div class="top-bar">
  <!-- BEGIN: Breadcrumb -->
  <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    @foreach ($breadcrumbs as $breadcrumb)
      <a href="{{ $breadcrumb['link'] }}" class="{{ $loop->last ? 'breadcrumb--active' : '' }}">
        {{ $breadcrumb['name'] }}
      </a>
      @unless ($loop->last)
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
      @endunless
    @endforeach
  </div>

  <!-- END: Breadcrumb -->
  <!-- BEGIN: Search -->
  <div class="intro-x relative mr-3 sm:mr-6">
    <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i>
    </a>
  </div>
  <!-- END: Search -->
  <!-- BEGIN: Notifications -->
  <div class="intro-x dropdown relative mr-auto sm:mr-6">
    <div class="dropdown-toggle notification notification--bullet cursor-pointer"> <i data-feather="bell"
        class="notification__icon"></i> </div>
    <div
      class="notification-content dropdown-box mt-8 absolute top-0 left-0 sm:left-auto sm:right-0 z-20 -ml-10 sm:ml-0">
      <div class="notification-content__box dropdown-box__content box">
        <div class="notification-content__title">Notifications</div>
        <div class="cursor-pointer relative flex items-center ">
          <div class="w-12 h-12 flex-none image-fit mr-1">
            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
              src="{{ asset('storage/posts/dist/images/profile-13.jpg') }}">
            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
          </div>
          <div class="ml-2 overflow-hidden">
            <div class="flex items-center">
              <a href="javascript:;" class="font-medium truncate mr-5">Angelina Jolie</a>
              <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
            </div>
            <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is not simply
              random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END: Notifications -->
  <!-- BEGIN: Account Menu -->
  <div class="intro-x dropdown w-8 h-8 relative">
    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
      <img alt="Midone Tailwind HTML Admin Template" src="{{ asset('storage/posts/dist/images/profile-12.jpg') }}">
    </div>
    <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
      <div class="dropdown-box__content box bg-theme-38 text-white">
        <div class="p-4 border-b border-theme-40">
          <div class="font-medium">Angelina Jolie</div>
          <div class="text-xs text-theme-41">Software Engineer</div>
        </div>
        <div class="p-2">
          <a href=""
            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
            <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
          <a href=""
            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
            <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
          <a href=""
            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
            <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
          <a href=""
            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
            <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
        </div>
        <div class="p-2 border-t border-theme-40">
          <a class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"
            href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
              data-feather="toggle-right" class="w-4 h-4 mr-2"></i>
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>

        </div>

      </div>
    </div>
  </div>
  <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
