<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">
        
        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="<?php echo e(url('/')); ?>">
            Codebyters-App
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Apps <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\User::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('users.index')); ?>">Users</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Alumnus::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('alumni.index')); ?>">Alumni</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Occupation::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('occupations.index')); ?>">Occupations</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Position::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('positions.index')); ?>">Positions</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Address::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('addresses.index')); ?>">Addresses</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\City::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('cities.index')); ?>">Cities</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Official::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('officials.index')); ?>">Officials</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Image::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('images.index')); ?>">Images</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Student::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('students.index')); ?>">Students</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Course::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('courses.index')); ?>">Courses</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Tag::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('tags.index')); ?>">Tags</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Activity::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('activities.index')); ?>">Activities</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Province::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('provinces.index')); ?>">Provinces</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Institute::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('institutes.index')); ?>">Institutes</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Course::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('courses.index')); ?>">Programs</a>
                            <?php endif; ?>
                        </div>

                    </li>
                    <?php if(Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class)): ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Access Management <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', Spatie\Permission\Models\Role::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('roles.index')); ?>">Roles</a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', Spatie\Permission\Models\Permission::class)): ?>
                            <a class="dropdown-item" href="<?php echo e(route('permissions.index')); ?>">Permissions</a>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\Users\jimwe\PhpstormProjects\codebyters_app\resources\views/layouts/nav.blade.php ENDPATH**/ ?>