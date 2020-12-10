<?php $attributes = $attributes->exceptProps([
    'name',
    'label',
    'value' => '',
]); ?>
<?php foreach (array_filter(([
    'name',
    'label',
    'value' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.inputs.basic','data' => ['type' => 'password','name' => $name,'label' => ''.e($label ?? '').'','value' => $value,'attributes' => $attributes]]); ?>
<?php $component->withName('inputs.basic'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'password','name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name),'label' => ''.e($label ?? '').'','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <?php /**PATH C:\Users\jimwe\PhpstormProjects\codebyters_app\resources\views/components/inputs/password.blade.php ENDPATH**/ ?>