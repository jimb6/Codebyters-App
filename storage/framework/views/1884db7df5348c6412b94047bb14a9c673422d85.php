<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="<?php echo e(route('users.index')); ?>" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                <?php echo app('translator')->get('crud.users.create_title'); ?>
            </h4>

             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form','data' => ['method' => 'POST','action' => ''.e(route('users.store')).'','class' => 'mt-4']]); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['method' => 'POST','action' => ''.e(route('users.store')).'','class' => 'mt-4']); ?>
                <?php echo $__env->make('app.users.form-inputs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="mt-4">
                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-light">
                        <i class="icon ion-md-return-left text-primary"></i>
                        <?php echo app('translator')->get('crud.common.back'); ?>
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        <?php echo app('translator')->get('crud.common.create'); ?>
                    </button>
                </div>
             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jimwe\PhpstormProjects\codebyters_app\resources\views/app/users/create.blade.php ENDPATH**/ ?>