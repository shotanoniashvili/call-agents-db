<div class="row main-form">
    <form class="form-horizontal" method="post">
        <fieldset>
            <legend class="text-md-center">Add call</legend>
            <?php
                if(isset($_POST['add-call'])) echo $alert->get_html();
            ?>
            <div class="form-group">
                <label class="col-md-4 control-label">Call date</label>
                <div class="col-md-8">
                    <input name="call-date" type="text" placeholder="Call date" class="bs-datetimepicker form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Callback date</label>
                <div class="col-md-8">
                    <input name="callback-date" type="text" placeholder="Callback date" class="bs-datetimepicker form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Agent</label>
                <div class="col-md-8">
                    <select name="agent-id" class="form-control input-md chosen-select" data-placeholder="Choose agent" <?=($user->is_agent()) ? 'disabled' : ''?>>
                        <option></option>
                        <?php
                        foreach ($agents as $agent) {
                            if($user->is_agent() && $user->id == $agent->id) {
                                echo '<option value="'.$agent->id.'" selected>'.$agent->fullname.'</option>';
                            } else {
                                echo '<option value="'.$agent->id.'">'.$agent->fullname.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Spoke</label>
                <div class="col-md-8">
                    <select name="speaker-id" class="form-control input-md chosen-select" data-placeholder="Choose spoke">
                        <option value=""></option>
                        <option value="">-------------</option>
                        <?php
                        foreach ($speakers as $speaker) {
                            echo '<option value="'.$speaker->id.'">'.$speaker->fullname.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Call ID</label>
                <div class="col-md-8">
                    <input name="call-id" type="number" placeholder="Call ID" class="form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Country</label>
                <div class="col-md-8">
                    <input name="country" type="text" placeholder="Country" class="form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Note</label>
                <div class="col-md-8">
                    <textarea name="note" type="text" placeholder="Note" class="form-control input-md" style="resize: vertical;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4"></label>
                <div class="col-md-8">
                    <button name="add-call" class="btn btn-primary mdMarginTop">Add call</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>