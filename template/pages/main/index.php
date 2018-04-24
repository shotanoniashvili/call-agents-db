    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php include PROJECT_ROOT.'template/partials/form-add-call.php'; ?>
            </div>
            <div class="col-md-6">
                <?php
                if($user->is_admin()) {
                    include PROJECT_ROOT.'template/partials/form-add-agent.php';
                }
                ?>
            </div>
            <div class="col-md-6">
                <?php
                if($user->is_admin()) {
                    include PROJECT_ROOT.'template/partials/form-add-speaker.php';
                }
                ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>