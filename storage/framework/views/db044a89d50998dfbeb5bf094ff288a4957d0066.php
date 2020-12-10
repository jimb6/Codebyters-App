<?php $editing = isset($user) ?>

<div class="row">
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.inputs.group','data' => ['class' => 'col-sm-12 col-md-12 col-lg-12']]); ?>
<?php $component->withName('inputs.group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'col-sm-12 col-md-12 col-lg-12']); ?>
         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.inputs.email','data' => ['name' => 'email','label' => 'Email','value' => ''.e(old('email', ($editing ? $user->email : ''))).'','maxlength' => '255','required' => true]]); ?>
<?php $component->withName('inputs.email'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'email','label' => 'Email','value' => ''.e(old('email', ($editing ? $user->email : ''))).'','maxlength' => '255','required' => true]); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.inputs.group','data' => ['class' => 'col-sm-12 col-md-12 col-lg-12']]); ?>
<?php $component->withName('inputs.group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'col-sm-12 col-md-12 col-lg-12']); ?>
         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.inputs.password','data' => ['name' => 'password','label' => 'Password','maxlength' => '255','required' => !$editing]]); ?>
<?php $component->withName('inputs.password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'password','label' => 'Password','maxlength' => '255','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$editing)]); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign <?php echo app('translator')->get('crud.roles.name'); ?></h4>

        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.inputs.checkbox','data' => ['id' => 'role'.e($role->id).'','name' => 'roles[]','label' => ''.e(ucfirst($role->name)).'','value' => ''.e($role->id).'','checked' => isset($user) ? $user->hasRole($role) : false,'addHiddenValue' => false]]); ?>
<?php $component->withName('inputs.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'role'.e($role->id).'','name' => 'roles[]','label' => ''.e(ucfirst($role->name)).'','value' => ''.e($role->id).'','checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset($user) ? $user->hasRole($role) : false),'add-hidden-value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\Users\jimwe\PhpstormProjects\codebyters_app\resources\views/app/users/form-inputs.blade.php ENDPATH**/ ?>