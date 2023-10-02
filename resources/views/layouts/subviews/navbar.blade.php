<nav class="relative my-0 px-4 py-2 flex justify-between items-center bg-white ">

<a href="/events" class="flex items-center">
  <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#8B5CF6" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.2857 20C19.4416 20 22 17.4717 22 14.3529C22 11.8811 20.393 9.78024 18.1551 9.01498C17.8371 6.19371 15.4159 4 12.4762 4C9.32028 4 6.7619 6.52827 6.7619 9.64706C6.7619 10.3369 6.88706 10.9978 7.11616 11.6089C6.8475 11.5567 6.56983 11.5294 6.28571 11.5294C3.91878 11.5294 2 13.4256 2 15.7647C2 18.1038 3.91878 20 6.28571 20H16.2857Z" fill="#8B5CF6"></path> </g></svg>
            <span class="self-center text-xl font-semibold whitespace-nowrap"> EVENT</span>
        </a>

  <div class="hidden lg:flex">
    <a class=" py-1.5 px-2 m-1 text-center text-sm hover:text-violet-600" href="/">
      Home
    </a>
    @if(Auth::check())
    @include('layouts.subviews.dropdown')

    @else
    <a class="py-1.5 px-2 m-1 text-center text-sm hover:text-violet-600"
    href="/login">
      <button >
        Sign in
      </button>
    </a>

    <a class="grid grid-cols-2 gap-4 py-1.5 px-3 m-1 text-sm text-center border border-violet-600 rounded-full text-violet-600  hover:bg-gray-100 hidden lg:inline-block "
    href="/register">
      Register
    </a>
    @endif
  </div>
</nav>

