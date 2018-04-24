<div class="row main-form">
    <form class="form-horizontal" method="post">
        <?php
        if(isset($_POST['add-agent'])) echo $alert->get_html();
        ?>
        <fieldset>
            <legend class="text-md-center">Add agent</legend>
            <div class="form-group">
                <label class="col-md-4 control-label">Firstname</label>
                <div class="col-md-8">
                    <input name="first-name" type="text" placeholder="Firstname" class="form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Lastname</label>
                <div class="col-md-8">
                    <input name="last-name" type="text" placeholder="Lastname" class="form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Username</label>
                <div class="col-md-8">
                    <input name="user-name" type="text" placeholder="Username" class="form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-8">
                    <input name="user-pass" type="password" placeholder="Password" class="form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4"></label>
                <div class="col-md-8">
                    <button name="add-agent" class="btn btn-primary">Add agent</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>