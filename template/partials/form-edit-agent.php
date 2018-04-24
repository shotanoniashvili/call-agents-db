<div class="row main-form">
    <form class="form-horizontal" method="post">
        <?php
        if(isset($_POST['edit-agent'])) echo $alert->get_html();
        ?>
        <fieldset>
            <legend class="text-md-center">Edit agent</legend>
            <div class="form-group">
                <label class="col-md-4 control-label">Firstname</label>
                <div class="col-md-8">
                    <input name="first-name" type="text" placeholder="Firstname" class="form-control input-md" value="<?=$agent->firstname?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Lastname</label>
                <div class="col-md-8">
                    <input name="last-name" type="text" placeholder="Lastname" class="form-control input-md" value="<?=$agent->lastname?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Username</label>
                <div class="col-md-8">
                    <input name="user-name" type="text" placeholder="Username" class="form-control input-md" value="<?=$agent->username?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Password (Leave blank if you don't want to change)</label>
                <div class="col-md-8">
                    <input name="user-pass" type="password" placeholder="Password" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8">
                    <button name="edit-agent" class="btn btn-primary">Edit agent</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>