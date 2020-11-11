<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use App\Services\TaskService;
use App\Validators\CreateTaskValidator;
use App\Validators\UpdateTaskValidator;

class TaskController extends Controller {
    
    public $taskService;

    public function __construct()
    {
        $this->taskService = new taskService();
    }

    public function index(Request $request)
    {   
        return $this->render("index", [
            "tasks" => $this->taskService->getTaskList(),
        ]);
    }
    
    public function create()
    {   
        $this->render("create");
    }

    public function store(Request $request)
    {
        $data = [
            "user" => $request->get("user"),
            "email" => $request->get("email"),
            "title" => $request->get("title"),
            "content" => $request->get("content")
        ];

        $validator = new CreateTaskValidator;
        $errors = $validator->_validate($data);

        if($errors === true) {
            $this->taskService->createTask($data);
            $_SESSION['messages']['success'] = "Задача добавлена";
        } else {
            $_SESSION['messages'] = $errors->toArray();
            return $this->redirect("../task/create");
        }

        return $this->redirect("../index");
    }

    public function edit(Request $request)
    {   
        if(!$this->taskService->taskExist($request->query->get("id"))) {
            throw new \Exception("Task not found");
        }

        $this->render("update", [
            "task" => $this->taskService->findTask($request->query->get("id"))
        ]);
    }

    public function update(Request $request)
    {   
        if(!$this->taskService->taskExist($request->query->get("id"))) {
            throw new \Exception("Task not found");
        }

        $data = [
            "id" => $request->query->get("id"),
            "user" => $request->get("user"),
            "email" => $request->get("email"),
            "title" => $request->get("title"),
            "content" => $request->get("content")
        ];

        $validator = new UpdateTaskValidator;
        $errors = $validator->_validate($data);

        if($errors === true) {
            $this->taskService->updateTask($data);
        } else {
            $_SESSION['messages'] = $errors->toArray();
            return $this->redirect("../task/edit?id=" . $data['id']);
        }

        return $this->redirect("../index");
    }

    public function changeStatus(Request $request)
    {   
        $status = $this->taskService->changeTaskStatus($request->query->get("id"));

        echo json_encode(["status" => $status]);
        return;
    }


}