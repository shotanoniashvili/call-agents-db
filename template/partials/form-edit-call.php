<div class="row main-form">
    <form class="form-horizontal" method="post">
        <fieldset>
            <legend class="text-md-center">Edit call</legend>
            <?php
                if(isset($_POST['edit-call'])) echo $alert->get_html();
            ?>
            <div class="form-group">
                <label class="col-md-4 control-label">Call date</label>
                <div class="col-md-8">
                    <input name="call-date" type="text" placeholder="Call date" class="bs-datetimepicker form-control input-md" value="<?=$call->date->format('d-m-Y H:i:s')?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Callback date</label>
                <div class="col-md-8">
                    <input name="callback-date" type="text" placeholder="Callback date" class="bs-datetimepicker form-control input-md" value="<?=$call->callback_date->format('d-m-Y H:i:s')?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Agent</label>
                <div class="col-md-8">
                    <select name="agent-id" class="form-control input-md chosen-select" data-placeholder="Choose agent">
                        <option></option>
                        <?php
                        foreach ($agents as $agent) {
                            if($call->agent->id == $agent->id) {
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
                        <option value="" <?=($call->spoke->id == null) ? 'checked' : ''?>>-------------</option>
                        <?php
                        foreach ($speakers as $speaker) {
                            if($call->spoke->id == $speaker->id) {
                                echo '<option value="'.$speaker->id.'" selected>'.$speaker->fullname.'</option>';
                            } else {
                                echo '<option value="'.$speaker->id.'">'.$speaker->fullname.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Call ID</label>
                <div class="col-md-8">
                    <input name="call-id" type="number" placeholder="Call ID" class="form-control input-md" value="<?=$call->call_id?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Country</label>
                <div class="col-md-8">
                    <input name="country" type="text" placeholder="Country" class="form-control input-md" value="<?=$call->country?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Note</label>
                <div class="col-md-8">
                    <textarea name="note" type="text" placeholder="Note" class="form-control input-md" style="white-space:pre-wrap; resize: vertical;"><?=$call->note?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4"></label>
                <div class="col-md-8">
                    <button name="edit-call" class="btn btn-primary mdMarginTop">Edit call</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>