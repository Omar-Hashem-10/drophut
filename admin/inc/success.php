<?php if (Session::check('success')): ?>
                <div class="alert alert-success text-center">
                    <?= htmlspecialchars(Session::get('success')); ?>
                </div>
                <?php Session::remove('success'); ?>
                <?php endif; ?>