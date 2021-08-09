<?php

class ToDoController
{
    public $view;
    public $db;
    public $app;
    public $flash;
    public $data=array();
    public function __construct(\Slim\Views\Twig $view, PDO $db, \Slim\Flash\Messages $flash)
    {
     $this->view = $view;
     $this->db = $db;
     $this->flash = $flash;
 }
 
 public function home($request, $response, $args)
 {
     $todos = $this->getTasks();
     $this->addData("todos", $todos);
     $this->view->render($response,'main.twig',$this->getData());
     return $response;
 }

 public function add($request, $response, $args)
 {
    if($request->isPost()){
        $postValues = $request->getParsedBody();
        $name = $postValue= isset($_POST['name']) ? $_POST['name'] : '';
        $this->createTask($name,false,true);
        $this->addFlashMessage("success","Task Created");
        return $response->withRedirect('/',301);
    }
}

public function update($request, $response,$args)
{
    $post_order  = $request->getParsedBody();
    $post_order = $post_order["post_order_ids"];

    if(count($post_order)>0){
        for($order_no= 0; $order_no < count($post_order); $order_no++)
        {
            $this->updateTask($post_order[$order_no],$order_no);
        }
    }
    return $response->withJson([$post_order]);
}

public function color($request, $response,$args)
{
    $post_order  = $request->getParsedBody();
    $id = $post_order["id"];
    $color = $post_order["color"];
    $this->updatecolor($id,$color);
    return $response->withJson([$post_order]);
}

public function Inline($request, $response,$args)
{
    $post_order  = $request->getParsedBody();
    $id = $post_order["id"];
    $value = $post_order["value"];
    $column = $post_order["column"];
    $this->InlineUpdate($id,$value,$column);
    return $response->withJson([$post_order]);
}

public function delete($request, $response, $args)
{
 
    if($request->isGet()) {
        if(isset($args["id"])){
            $this->deleteTask($args["id"]);
            return $response->withRedirect('/',301);
        }
    }
}

private function addData($key, $value)
{
    $this->data[$key] = $value;
}

private function getData()
{
    return $this->data;
}

private function getTasks()
{
    $query = $this->db->query('SELECT * FROM listitems order by orderID');
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $tasks = array();
    foreach ($results as $row){
        $tdo = new ToDo();
        $tasks[] = $tdo->create($row);
    }
    return $tasks;
}
private function createTask($name, $details, $author)
{
    $query= $this->db->prepare("INSERT INTO listitems(name)
      VALUES(:name)");
    $query->execute([
     "name" => $name
 ]);
}

private function updateTask($id,$orderNo)
{
    $query= $this->db->prepare("UPDATE listitems SET orderID=:orderno WHERE id = :id");
        //  $query->execute();
    $query->execute([
        "orderno" => $orderNo,
        "id" => $id
    ]);
}

private function updatecolor($id,$color)
{
    $query= $this->db->prepare("UPDATE listitems SET color=:color WHERE id= :id");
    $query->execute([
        "color" => $color,
        "id" => $id
    ]);
}

private function InlineUpdate($id,$value,$column)
{
    $query= $this->db->prepare("UPDATE listitems SET name=:value WHERE id= :id");
    $query->execute([
        "value" => $value,
        "id" => $id
    ]);
}

private function deleteTask($id)
{
    $query = $this->db->prepare("DELETE FROM listitems WHERE id=". $id);
    $query->execute([
        "id" => $id
    ]);
}

private function addFlashMessage($key, $message)
{
    $this->flash->addMessage($key, $message);
}

private function getFlashMessage($key)
{
    return $this->flash->getMessage($key);
}

}
