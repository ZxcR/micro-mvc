<?php
    use App\Helpers\Guard;
    $title = "Редактировать задачу";
?>

<div class="row">
    <div class="col-12">
        <a href="../index" class="btn btn-primary">Список задач</a>
        <a href="../task/create" class="btn btn-primary">Добавить задачу</a>
        <hr>

        <form action="update?id=<?= $task->id ?>" method="post">
            <div class="form-group">
                <label for="user">User</label>
                <input type="text"  value="<?= Guard::htmlEncode($task->user) ?>" name="user" id="user" class="form-control">
                <?php if(isset($messages["user"])): ?>
                    <?php foreach($messages["user"] as $emailMessage): ?>
                        <span class="text-danger"><?= $emailMessage ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" value="<?= Guard::htmlEncode($task->email) ?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php if(isset($messages["email"])): ?>
                    <?php foreach($messages["email"] as $emailMessage): ?>
                        <span class="text-danger"><?= $emailMessage ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="title" value="<?= Guard::htmlEncode($task->title) ?>"  name="title" class="form-control" id="title">
                <?php if(isset($messages["title"])): ?>
                    <?php foreach($messages["title"] as $emailMessage): ?>
                        <span class="text-danger"><?= $emailMessage ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="content">Text</label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10">
                    <?= Guard::htmlEncode($task->content) ?>
                </textarea>
                <?php if(isset($messages["content"])): ?>
                    <?php foreach($messages["content"] as $emailMessage): ?>
                        <span class="text-danger"><?= $emailMessage ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>