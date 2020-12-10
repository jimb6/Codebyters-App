<?php $attributes = $attributes->exceptProps([
    'id',
    'name',
    'label',
    'value',
    'checked' => false,
    'addHiddenValue' => true,
    'hiddenValue' => 0,
]); ?>
<?php foreach (array_filter(([
    'id',
    'name',
    'label',
    'value',
    'checked' => false,
    'addHiddenValue' => true,
    'hiddenValue' => 0,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $checked = !! $checked
?>

<div class="form-check">

    
    <?php if($addHiddenValue): ?>
    <input type="hidden" id="<?php echo e($id ?? $name); ?>-hidden" name="<?php echo e($name); ?>" value="<?php echo e($hiddenValue); ?>">
    <?php endif; ?>

    <input
        type="checkbox"
        id="<?php echo e($id ?? $name); ?>"
        name="<?php echo e($name); ?>"
        value="<?php echo e($value ?? 1); ?>"
        <?php echo e($checked ? 'checked' : ''); ?>

        <?php echo e($attributes->merge(['class' => 'form-check-input'])); ?>

    >
    <?php if($label ?? null): ?>
        <label class="form-check-label" for="<?php echo e($name); ?>">
            <?php echo e($label); ?>

        </label>
    <?php endif; ?>
</div>

<?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <?php echo $__env->make('components.inputs.partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php /**PATH C:\Users\jimwe\PhpstormProjects\codebyters_app\resources\views/components/inputs/checkbox.blade.php ENDPATH**/ ?>