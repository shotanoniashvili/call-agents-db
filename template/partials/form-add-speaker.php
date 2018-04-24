<div class="row main-form">
    <form class="form-horizontal" method="post">
        <?php
        if(isset($_POST['add-speaker'])) echo $alert->get_html();
        ?>
        <fieldset>
            <legend class="text-md-center">Add speaker</legend>
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
                <label class="col-md-4"></label>
                <div class="col-md-8">
                    <button name="add-speaker" class="btn btn-primary">Add speaker</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>