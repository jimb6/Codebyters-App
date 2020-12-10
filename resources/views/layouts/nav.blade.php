<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">
        
        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}">
            Codebyters-App
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Apps <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', App\Models\User::class)
                            <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                            @endcan
                            @can('view-any', App\Models\Alumnus::class)
                            <a class="dropdown-item" href="{{ route('alumni.index') }}">Alumni</a>
                            @endcan
                            @can('view-any', App\Models\Occupation::class)
                            <a class="dropdown-item" href="{{ route('occupations.index') }}">Occupations</a>
                            @endcan
                            @can('view-any', App\Models\Position::class)
                            <a class="dropdown-item" href="{{ route('positions.index') }}">Positions</a>
                            @endcan
                            @can('view-any', App\Models\Address::class)
                            <a class="dropdown-item" href="{{ route('addresses.index') }}">Addresses</a>
                            @endcan
                            @can('view-any', App\Models\City::class)
                            <a class="dropdown-item" href="{{ route('cities.index') }}">Cities</a>
                            @endcan
                            @can('view-any', App\Models\Official::class)
                            <a class="dropdown-item" href="{{ route('officials.index') }}">Officials</a>
                            @endcan
                            @can('view-any', App\Models\Image::class)
                            <a class="dropdown-item" href="{{ route('images.index') }}">Images</a>
                            @endcan
                            @can('view-any', App\Models\Student::class)
                            <a class="dropdown-item" href="{{ route('students.index') }}">Students</a>
                            @endcan
                            @can('view-any', App\Models\Course::class)
                            <a class="dropdown-item" href="{{ route('courses.index') }}">Courses</a>
                            @endcan
                            @can('view-any', App\Models\Tag::class)
                            <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                            @endcan
                            @can('view-any', App\Models\Activity::class)
                            <a class="dropdown-item" href="{{ route('activities.index') }}">Activities</a>
                            @endcan
                            @can('view-any', App\Models\Province::class)
                            <a class="dropdown-item" href="{{ route('provinces.index') }}">Provinces</a>
                            @endcan
                            @can('view-any', App\Models\Institute::class)
                            <a class="dropdown-item" href="{{ route('institutes.index') }}">Institutes</a>
                            @endcan
                            @can('view-any', App\Models\Course::class)
                            <a class="dropdown-item" href="{{ route('courses.index') }}">Programs</a>
                            @endcan
                        </div>

                    </li>
                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Access Management <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', Spatie\Permission\Models\Role::class)
                            <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                            @endcan

                            @can('view-any', Spatie\Permission\Models\Permission::class)
                            <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
                            @endcan
                        </div>
                    </li>
                    @endif
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>