<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/28/18
 * Time: 12:49 PM
 */

class ToDo
{

    private $id;
    private $name;
    private $task_status;
    private $orderID;
    private $color;


    /**
     * ToDo constructor.
     */
    public function __construct($name="",$id=0,$task_status="",$orderID="",$color="")
    {
        $this->id = $id;
        $this->name = $name;
        $this->task_status = $task_status;
        $this->orderID = $orderID;
        $this->color = $color;

    }

    public function create($row)
    {
        $this->name = $row["name"];        
        $this->id = $row["id"];
        $this->task_status = $row["task_status"];
        $this->orderID = $row["orderID"];
        $this->color = $row["color"];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @param mixed $id
     */
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $id
     */
    public function getorderID()
    {
        return $this->orderID;
    }
    public function setorderID($orderID)
    {
        $this->orderID = $orderID;
    }
    /**
     * @param mixed $task_status
     */
    public function gettask_status()
    {
        return $this->task_status;
    }
    public function settask_status($task_status)
    {
        $this->task_status = $task_status;
    }

    
}