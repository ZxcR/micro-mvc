<?
    $title = "Список задач";
    use App\Helpers\Guard;
?>

<div class="row">
    <div class="col-12">
        <a href="task/create" class="btn btn-primary">Создать задачу</a>
        <?php if(\App\Helpers\Guard::isAuth()):?>
            <span class="ml-5"> <?= \App\Helpers\Guard::User() ?> </span>
            <span class="ml-5"><a href="logout">Выход</a></span>
        <?php else: ?>
            <a href="login" class="btn btn-primary">Авторизация</a>
        <?php endif ?>
        
        <hr>

        <?php if(isset($messages["success"])): ?>
            <div class="alert alert-success" role="alert">
                <?= $messages["success"] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif ?>


        <div class="table table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>user</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Text</th>
                        <th>Status</th>
                        <th>Admin</th>
                        <?php if(Guard::isAuth()): ?>
                        <th></th>
                        <th></th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tasks as $task): ?>
                    <tr>
                        <td><?= Guard::htmlEncode($task->user) ?></td>
                        <td><?= Guard::htmlEncode($task->title) ?></td>
                        <td><?= Guard::htmlEncode($task->email) ?></td>
                        <td><?= Guard::htmlEncode($task->content) ?></td>
                        <td>
                    
                            <span data-status-id="<?= $task->id ?>" class="badge badge-<?=  $task->status == "closed" ? "success" : "warning" ?>"><?= $task->status ?></span>
                        </td>
                        <td>
                            <?php if($task->isUpdated()): ?>
                               <span class="badge badge-success"> upd </span>
                            <?php endif ?>
                        </td>
                        <?php if(Guard::isAuth()): ?>
                            <td>
                                <input type="checkbox" class="task_checked" <?= $task->isChecked() ? "checked" : "" ?> data-id="<?= $task->id ?>">
                            </td>
                            <td>
                                <a href="task/edit?id=<?= $task->id ?>">
                                edit
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>