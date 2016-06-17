<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Human{
    public $name;
    public $sex;
    public $data=array();
    //实例化对象时调用的函数
    public function __construct($name,$sex){   
        $this->name=$name;
        $this->sex=$sex;
    }
    public function __set($name,$value){
        $this->data[$name]=$value;
    }
    public function __get($name){
        return $this->data[$name];
    }
    public function __call($name,$argument){
        echo $name;
        var_dump($argument);
    }
    
    //销毁对象时，自动调用的函数
    public function __destruct(){  //析构函数
        echo $this->name."was dead!<br/>";
    }
}
$jack=new Human("jack","male");
$jack->age=12;  //给未定义的属性赋值的时候，调用__set函数  age=$name, 12=$value 并保存到data数组中
var_dump($jack->data); 
    //array (size=1)
    //  'age' => int 12  
                     //  在类的外部，取值的时候必须要是  对象->属性  

echo $jack->age;  //12     //从data数组中取出来 


$jack->reading("1","a");//未定义的方法   reading=$name; 1和a作为俩个元素保存到$argument中
//reading
//array (size=2)
//  0 => string '1' (length=1)
//  1 => string 'a' (length=1)

$Tom = new Human("Tom", "female");
var_dump($jack);
var_dump($Tom);






