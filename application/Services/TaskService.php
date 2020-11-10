<?php
namespace App\Services;

use App\Models\Task;

class TaskService {

    public function createTask($data)
    {   
        $data["created_at"] = Date("Y-m-d H:i:s");
        $data["updated_at"] = Date("Y-m-d H:i:s");
        $data["status"] = "open";

        return Task::create($data);
    }

    public function findTask($id)
    {
        return Task::find((int) $id);
    }

    public function getTaskList()
    {
        return Task::orderBy('id', 'asc')
            ->select(['id',"user", "title", 'email', 'content', 'status', 'created_at', 'updated_at'])
            ->get();
    }

    public function updateTask($data)
    {
        $task = Task::find((int) $data["id"]);
        unset($data["id"]);
        $data["updated_at"] = Date("Y-m-d H:i:s");
        $task->update($data);
    }

    public function taskExist($id)
    {
        $task = Task::find((int) $id);
        return $task !== null;
    }

    public function changeTaskStatus($id)
    {
        $task = Task::find((int) $id);
        $task->status = $task->status == "closed" ? "open" : "closed";
        $task->save();
        return $task->status;
    }
}