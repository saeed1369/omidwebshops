<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
?>


<?php $__env->startSection('profile_assets'); ?>
<link href="<?php echo e(asset('style/profile/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
<script src="<?php echo e(asset('style/profile/script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div  class="mt-3">
    <div id="wrapper">
       <?php echo $__env->make('profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <div class="container-fluid">

                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <img class="rounded-circle mb-3 mt-4" src="<?php echo e(asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)); ?>" width="160" height="160">
                                    <form method="post" action="<?php echo e(url('userAvatarFile')); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="file" name="userAvatarImage">

                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class=" btn btn-danger" name="saveAvatar" value="<?php echo e(__('generic.save')); ?> ">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">

                            <div class="row">
                                <div class="col">
                                    <div class="card shadow">
                                        <div class="card-header py-3 text-right">
                                            <p class="text-primary m-0 font-weight-bold"></p>
                                        </div>
                                        <div class="card-body">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger text-right"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <form method="post" action="<?php echo e(url('changeUserPassword')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group text-<?php echo e(__('generic.text_direction')); ?> "><label for="password"><strong><?php echo e(__('generic.new_password')); ?></strong></label><input class="form-control" id="password" type="password"  name="password"></div>
                                                <div class="form-group text-<?php echo e(__('generic.text_direction')); ?> "><label for="password-confirmation"><strong><?php echo e(__('generic.confirm_new_password')); ?></strong></label><input class="form-control" id="password-confirmation" type="password" name="password_confirmation"></div>

                                                <div class="form-group"><button class="btn btn-danger btn-sm" type="submit" name="btnChangePassword"><?php echo e(__('generic.change_password')); ?></button></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-header py-3">
                                        <p class="text-primary text-<?php echo e(__('generic.text_direction')); ?> m-0 font-weight-bold"><?php echo e(__('profile.personal_information')); ?></p>
                                    </div>
                                    <div class="card-body bg-white">
                                        <?php if($errors->any()): ?>
                                        <div class="alert alert-danger text-<?php echo e(__('generic.text_direction')); ?>">
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                        <form method="post" action="<?php echo e(url('/changeOherAttributes')); ?>">
                                            <?php echo csrf_field(); ?>

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-<?php echo e(__('generic.text_direction')); ?>"><label for="first_name"><strong><?php echo e(__('profile.name')); ?></strong></label><input class="form-control" type="text" placeholder="" name="name" value= "<?php echo e(Auth::user()->name); ?>"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-<?php echo e(__('generic.text_direction')); ?>"><label for="last_name"><strong><?php echo e(__('generic.mobile')); ?></strong></label><input class="form-control" type="tel" placeholder="" name="mobile" value= "<?php echo e(Auth::user()->mobile); ?>"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-<?php echo e(__('generic.text_direction')); ?>"><label for="first_name"><strong><?php echo e(__('profile.age')); ?></strong></label><input class="form-control" type="text" placeholder="" name="age"  value= "<?php echo e(Auth::user()->age); ?>"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-<?php echo e(__('generic.text_direction')); ?>"><label for="kodemelli"><strong><?php echo e(__('generic.kode_melli')); ?></strong></label><input class="form-control" type="text" placeholder="" name="kodemelli"  value= "<?php echo e(Auth::user()->kodemelli); ?>"></div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-<?php echo e(__('generic.text_direction')); ?>"><label for="first_name"><strong><?php echo e(__('profile.work')); ?></strong></label><input class="form-control" type="text" placeholder="" name="shoghl" value= "<?php echo e(Auth::user()->shoghl); ?>"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-<?php echo e(__('generic.text_direction')); ?>"><label for="last_name"><strong><?php echo e(__('profile.dgree')); ?></strong></label><input class="form-control" type="text" placeholder="" name="tahsilat" value= "<?php echo e(Auth::user()->tahsilat); ?>"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-<?php echo e(__('generic.text_direction')); ?>"><label for="first_name"><strong><?php echo e(__('profile.gener')); ?></strong></label></div>
                                                    <div class="form-group text-<?php echo e(__('generic.text_direction')); ?> ">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label text-<?php echo e(__('generic.text_direction')); ?>">
                                                                <input type="radio" class="form-check-input mx-1 text-<?php echo e(__('generic.text_direction')); ?>" name="gener" value="مرد" <?php  if(Auth::user()->gener == 'مرد') echo 'checked'; ?>  ><?php echo e(__('profile.male')); ?>

                                                                <input type="radio" class="form-check-input mx-1" name="gener" value="زن" <?php  if(Auth::user()->gener == 'زن') echo 'checked'; ?>><?php echo e(__('profile.female')); ?>

                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-danger btn-sm" type="submit" name="saveUserCahnge"><?php echo e(__('generic.save')); ?></button></div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title',__('generic.profile')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/profile/karbar.blade.php ENDPATH**/ ?>