<?php
header("Content-type:text/html;charset=utf-8");
/* 
 * Copyright(c)2015 All rights reserved.
 * @Licenced  http://www.w3.org
 * @Author  LiuTian<1538731090@qq.com> liutian_jiayi
 * @Create on 2016-5-13 10:32:17
 * @Version 1.0
 */
/**
 * 类的特性-封装：私有属性的检测
 */
class Human {

	public $name;
	public $sex;
	private $age;  //私有属性
	private $addr;  //私有属性
	private $data = array();	//存储未定义属性的数组
	public function __construct($name, $sex, $age, $addr) {
		$this->name = $name;
		$this->sex = $sex;
		$this->age = $age;
		$this->addr = $addr;
	}

	public function walking() {
		
	}
	
	/**
	 * 在类的外部检测一个私有属性时 自动调用的魔术方法 
	 * @param string $name		要检测的私有属性
	 * @return bool				存在则返回true 否则返回false
	 */
	public function __isset($name) {
//		return isset($this->$name);			//在类的内部可以检测出私有属性是否存在
		echo "我就不告诉你存不存在{$name}属性";
		
	}
        
        public function __unset($name){
            unset ($this->$name);
        }
}
//实例化对象
$jack = new Human("Jack", "female", 130, "Boston,USA");
//检测对象的公有属性 使用isset()或者empty()
echo isset($jack->name) ? "存在name属性<br />" : "不存在name属性<br />";
echo !empty($jack->sex) ? "存在sex属性<br />" : "不存在sex属性<br />";
echo isset($jack->demo) ? "存在demo属性<br />" : "不存在demo属性<br />";
//外部检测一个私有属性 由于封装不可访问 检测时总是返回false 可以通过定义魔术方法 自定义处理
echo isset($jack->age) ? "存在age属性<br />" : "不存在age属性<br />";

//先输出调用的函数结果
var_dump($jack);
unset($jack->age);
var_dump($jack);