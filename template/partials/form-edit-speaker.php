<div class="row main-form">
    <form class="form-horizontal" method="post">
        <?php
        if(isset($_POST['edit-speaker'])) echo $alert->get_html();
        ?>
        <fieldset>
            <legend class="text-md-center">Edit speaker</legend>
            <div class="form-group">
                <label class="col-md-4 control-label">Firstname</label>
                <div class="col-md-8">
                    <input name="first-name" type="text" placeholder="Firstname" class="form-control input-md" value="<?=$speaker->firstname?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Lastname</label>
                <div class="col-md-8">
                    <input name="last-name" type="text" placeholder="Lastname" class="form-control input-md" value="<?=$speaker->lastname?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4"></label>
                <div class="col-md-8">
                    <button name="edit-speaker" class="btn btn-primary">Edit speaker</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>