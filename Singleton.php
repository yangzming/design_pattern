<?php
/**
 * Created by WHEREIN.
 * 使用场景： 1、要求生产唯一序列号。 2、WEB 中的计数器，不用每次刷新都在数据库里加一次，用单例先缓存起来。 3、创建的一个对象需要消耗的资源过多，比如 I/O 与数据库的连接等。
 * User: yzm
 * Date: 2018/3/15
 * Time: 14:57
 */

class SingletonObject {
    private static $_instance;
    private $name = array();

    private function __construct() { }

    private function __clone() {
        // TODO: Implement __clone() method.
        echo 'I am clone';
    }

    /*
     * instanceof
     * 实例是否某个特定的类型
     * 实例是否从某个特定的类型继承
     * 实例或者他的任何祖先类是否实现了特定的接口
     */
    public static function getInstance() {
        // 判断系统是否已经有这个单例，如果有则返回，如果没有则创建。
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function setname($name) {
        $this->name[] = $name;
    }
    public function getname() {
        return $this->name;
    }
}

// test
$S = SingletonObject::getInstance();
$S->setname('wherein');
$S->setname(23);
var_dump($S->getname());