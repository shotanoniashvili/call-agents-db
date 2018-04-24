<div class="row main-form" style="margin: 0;">
    <form class="form-horizontal" method="get">
        <input type="hidden" name="page" value="calls" />
        <input type="hidden" name="action" value="filter" />
        <fieldset>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Date from</label>
                        <div class="col-md-4">
                            <input name="filter-date-from" type="text" placeholder="Date from" class="form-control input-md bs-datepicker" value="<?=$filter['date-from']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Date to</label>
                        <div class="col-md-4">
                            <input name="filter-date-to" type="text" placeholder="Date to" class="form-control input-md bs-datepicker" value="<?=$filter['date-to']?>">
                        </div>
                    </div>
                    <?php
                        if($user->is_admin()) {
                    ?>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Agent</label>
                                <div class="col-md-4">
                                    <select name="filter-agent" class="form-control input-md chosen-select" data-placeholder="Choose agent" <?=($user->is_agent()) ? 'disabled' : ''?>>
                                        <option></option>
                                        <?php
                                        foreach ($agents as $agent) {
                                            if(isset($filter['agent']) && $filter['agent'] == $agent->id) {
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
                                <label class="col-md-2 control-label">Spoke</label>
                                <div class="col-md-4">
                                    <select name="filter-speaker" class="form-control input-md chosen-select" data-placeholder="Spoke">
                                        <option value="">----------</option>
                                        <?php
                                        foreach ($speakers as $speaker) {
                                            if(isset($filter['spoke']) && $filter['spoke'] == $speaker->id) {
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
                                <label class="col-md-2 control-label">Call ID</label>
                                <div class="col-md-4">
                                    <input name="filter-call-id" type="number" placeholder="Call ID" class="form-control input-md" value="<?=(isset($filter['id'])) ? $filter['id'] : ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Country</label>
                                <div class="col-md-4">
                                    <input name="filter-country" type="text" placeholder="Country" class="form-control input-md" value="<?=(isset($filter['country'])) ? $filter['country'] : ''?>">
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group text-center">
                    <button name="filter-calls" class="btn btn-primary">Search</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>