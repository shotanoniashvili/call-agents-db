<div class="col-md-12">
    <h4 style="margin-bottom: 30px;">
        Speakers
        <a href="index.php?page=speakers&action=add" class="btn btn-primary btn-add pull-right"><i class="fa fa-plus"></i> </a>
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
                foreach ($speakers as $speaker) {
                    ?>
                    <tr>
                        <td><?=$speaker->firstname?></td>
                        <td><?=$speaker->lastname?></td>
                        <?php
                        if($user->is_admin()) {
                            ?>
                            <th><a class="btn btn-edit btn-warning btn-sm" href="index.php?page=speakers&action=edit&speaker-id=<?=$speaker->id?>"><i class="fa fa-edit"></i></a></th>
                            <th><a class="btn btn-remove btn-danger btn-sm" href="index.php?page=speakers&action=delete&speaker-id=<?=$speaker->id?>"><i class="fa fa-remove"></i></a></th>
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