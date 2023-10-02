<div class="hidden sm:flex sm:items-center sm:ml-6">

  <x-dropdown align="right" width="48">
    <x-slot name="trigger">
      <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-white hover:text-violet-600 focus:outline-none transition ease-in-out duration-150">

        <div>{{ Auth::user()->user_name }}</div>
        <div class="ml-1">

          @if ((auth()->user()->image_path))

          <div class="relative w-5 h-5 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
            <img type="file" name="image_path" id="image_path" class="relative relative w-5 h-5 rounded-full" src="{{ asset('storage/' . auth()->user()->image_path) }}" alt="Rounded avatar">
          </div>

          @else

          <div class="relative w-5 h-5 overflow-hidden  rounded-full ">
            <div class="relative w-5 h-5 overflow-hidden  rounded-full ">
              <img type="file" name="image_path" id="image_path" class="relative w-5 h-5 rounded-full" src="https://cdn4.iconfinder.com/data/icons/top-search-7/128/_user_account_profile_head_person_avatar-512.png">

            </div>
          </div>
          @endif
        </div>
      </button>
    </x-slot>

    <x-slot name="content">
      <x-dropdown-link :href="route('profile')">
        {{ __('Profile') }}
      </x-dropdown-link>

      @if(auth()->user()->role === 'MEMBER')
      <x-dropdown-link :href="route('historys.register')">
        {{ __('Event Applied') }}
      </x-dropdown-link>
      <x-dropdown-link :href="route('historys.certificate')">
        {{ __('Certificate') }}
      </x-dropdown-link>
      <x-dropdown-link :href="route('myorgs.myorgs')">
        {{ __('My Organizer') }}
      </x-dropdown-link>
      @endif

      <!-- Authentication -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
          {{ __('Log Out') }}
        </x-dropdown-link>
      </form>
    </x-slot>
  </x-dropdown>
</div>