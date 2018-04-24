<div class="col-md-12">
    <h4 style="margin-bottom: 30px;">
        Agents
        <a href="index.php?page=agents&action=add" class="btn btn-primary btn-add pull-right"><i class="fa fa-plus"></i> </a>
    </h4>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <table class="table table-hover" id="dataTables">
                <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
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
                foreach ($agents as $agent) {
                    ?>
                    <tr>
                        <td><?=$agent->firstname?></td>
                        <td><?=$agent->lastname?></td>
                        <td><?=$agent->username?></td>
                        <?php
                        if($user->is_admin()) {
                            ?>
                            <th><a class="btn btn-edit btn-warning btn-sm" href="index.php?page=agents&action=edit&agent-id=<?=$agent->id?>"><i class="fa fa-edit"></i></a></th>
                            <th><a class="btn btn-remove btn-danger btn-sm" href="index.php?page=agents&action=delete&agent-id=<?=$agent->id?>"><i class="fa fa-remove"></i></a></th>
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