@props(['links'])

<nav x-data="{ open: false }" class="border-gray-100 right-0 bg-gray-100 p-3 w-[100%] flex flex-row items-center">
    <div class="flex flex-row flex-1 items-center gap-5">
        <button class="focus:ring-4 font-medium rounded-lg text-sm  focus:outline-none block md:hidden lg:hidden xl:hidden" type="button" data-drawer-target="drawer-disable-body-scrolling" data-drawer-show="drawer-disable-body-scrolling" data-drawer-body-scrolling="false" aria-controls="drawer-disable-body-scrolling">
            <i class="fa fa-bars text-2xl"></i>
        </button>

        <h4 class="text-lg font-semibold">EdsoInv</h4>
    </div>

    <div class="flex flex-row items-center gap-7">
        <button class="relative">
            <i class="fa fa-envelope-o text-2xl"></i>
            <div class="absolute w-3 h-3 bg-red-500 rounded-full right-0 top-0"></div>
        </button>

        <button class="relative">
            <i class="fa fa-bell-o text-2xl"></i>
            <div class="absolute w-3 h-3 bg-red-500 rounded-full right-0 top-0"></div>
        </button>

        <a href="{{ route('profile.show') }}">
            <div class="flex flex-row items-center gap-2">
                <div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                    <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
                Hi, {{auth()->user()->first_name}}
            </div>
        </a>
    </div>
 
 <!-- drawer navigation component -->
 <div id="drawer-disable-body-scrolling" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-64 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-disable-body-scrolling-label">
     <h5 id="drawer-disable-body-scrolling-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
     <button type="button" data-drawer-hide="drawer-disable-body-scrolling" aria-controls="drawer-disable-body-scrolling" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
       <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
       </svg>
       <span class="sr-only">Close menu</span>
    </button>
    
   <div class="py-4 overflow-y-auto">
        @foreach($links as $link)
            <x-admin.sidebar-link :link="$link" />
        @endforeach
    </div>

    {{-- Logout form --}}
    <form class="absolute bottom-5 w-[93%]" method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <button class="p-2 w-[93%] text-white border border-gray-500 rounded flex flex-row items-center gap-2 mt-3">
            <i class="fa fa-sign-out text-xl"></i> Logout
        </button>
    </form>
 </div> 
</nav>