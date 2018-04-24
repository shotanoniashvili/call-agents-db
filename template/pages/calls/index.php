<div class="col-md-12">
    <h4 style="margin-bottom: 30px;">
        Calls
        <a href="index.php?page=calls&action=add" class="btn btn-primary btn-add pull-right"><i class="fa fa-plus"></i> </a>
    </h4>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php
                include PROJECT_ROOT.'template/partials/form-filter-calls.php';
            ?>
        </div>
        <div class="col-lg-12 col-md-12">
            <table class="table table-hover" id="dataTables">
                <thead>
                <tr>
                    <th>Call date</th>
                    <th>Callback date</th>
                    <th>Agent</th>
                    <th>Spoke</th>
                    <th>Call ID</th>
                    <th>Country</th>
                    <th>Note</th>
                    <?php
                    if($user->is_admin()) {
                        ?>
                        <th width="1%">&nbsp;</th>
                        <th width="1%">&nbsp;</th>
                        <?php
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($calls as $call) {
                    ?>
                    <tr>
                        <td><?=$call->date->format('d-m-Y H:i:s')?></td>
                        <td><?=$call->callback_date->format('d-m-Y H:i:s')?></td>
                        <td><?=$call->agent->fullname?></td>
                        <td><?=$call->spoke->fullname?></td>
                        <td><?=$call->call_id?></td>
                        <td><?=$call->country?></td>
                        <td><?=$call->note?></td>
                        <?php
                        if($user->is_admin()) {
                            ?>
                            <th><a class="btn btn-edit btn-warning btn-sm" href="index.php?page=calls&action=edit&call-id=<?=$call->id?>"><i class="fa fa-edit"></i></a></th>
                            <th><a class="btn btn-remove btn-danger btn-sm" href="index.php?page=calls&action=delete&call-id=<?=$call->id?>"><i class="fa fa-remove"></i></a></th>
                            <?php
                        }
                        ?>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>