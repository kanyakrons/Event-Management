<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form action="{{ route('profile.uploadImage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-2 flex items-center gap-x-3">
            @if (($user->image_path))
            <label title="Click to upload" for="button">
                <div class="relative w-20 h-20 overflow-hidden bg-gray-100 rounded-full ">
                    <img type="file" name="preview" id="preview" class="relative w-20 h-20 rounded-full" src="{{ asset('storage/' . $user->image_path) }}" alt="Rounded avatar">
                </div>
            </label>
            @else
            <label title="Click to upload" for="button">
                <div class="relative w-20 h-20 overflow-hidden rounded-full ">
                    <div class="relative w-20 h-20 overflow-hidden bg-gray-100 rounded-full ">
                        <img type="file" name="preview" id="preview" class="relative w-20 h-20 rounded-full" src="https://cdn4.iconfinder.com/data/icons/top-search-7/128/_user_account_profile_head_person_avatar-512.png">
                    </div>
                </div>
            </label>
            @endif
            <input hidden="" type="file" name="image_path" id="button" onchange="loadFile(event)">
            <div>
                <x-primary-button>Upload</x-primary-button>
            </div>

        </div>
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 ">
            <div div class="sm:col-span-2">
                <div class="flex items-center mb-4 ">
                    <input id="gender" type="radio" name="gender" value="male" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                    <label for="gender" class="ml-2 text-sm font-medium text-gray-900 ">Male</label>
                </div>
                <div class="flex items-center">
                    <input id="gender" type="radio" name="gender" value="female" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                    <label for="gender" class="ml-2 text-sm font-medium text-gray-900 ">Female</label>
                </div>
            </div>
            <div class="sm:col-span-3">
                <x-input-label for="age" :value="__('Age')" />
                <div class="mt-2">
                    <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $user->age)" required autofocus autocomplete="name" />

                </div>
            </div>
        </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <x-input-label for="first_name" :value="__('First name')" />
                <div class="mt-2">
                    <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('name', $user->first_name)" required autocomplete="off" />
                </div>
            </div>
            <div class="sm:col-span-3">
                <x-input-label for="last_name" :value="__('Last name')" />
                <div class="mt-2">
                    <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('name', $user->last_name)" required autocomplete="off" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>
        </div>
        @if($user->role == 'MEMBER')
        <div class="sm:col-span-3">

            <x-input-label for="faculty" :value="__('Select faculty')" />
            <select id="faculty" name="faculty" value="{{old('about', $user->faculty)}}" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                @if($user->faculty)
                <option selected> {{$user->faculty}}</option>
                @else
                <option selected> ---- </option>
                @endif

                <option value="engineering">Engineering</option>
                <option value="medicine">Medicine</option>
                <option value="business">Business</option>
                <option value="law">Law</option>
                <option value="arts">Arts</option>
                <option value="science">Science</option>
                <option value="education">Education</option>
                <option value="social-sciences">Social Sciences</option>
                <option value="information-technology">Information Technology</option>
                <option value="architecture">Architecture</option>
                <option value="environmental-studies">Environmental Studies</option>
                <option value="agriculture">Agriculture</option>
                <option value="music">Music</option>

            </select>

        </div>
        @endif


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="off" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>
        <div class="sm:col-span-3">
            <x-input-label for="phone" :value="__('Phone')" />

            <input type="tel" id="phone" name="phone" class=" mt-2 block p-2.5 w-full text-sm  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="{{old('phone', $user->phone)}}" required>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div class="sm:col-span-3">
            <x-input-label for="about" :value="__('About')" />
            <input type="text" id="about" name="about" rows="4" class="mt-2 block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 " value="{{old('about', $user->about)}}" required>

        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>


<script>
    var loadFile = function(event) {

        var input = event.target;
        var file = input.files[0];
        var type = file.type;

        var output = document.getElementById('preview');


        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
