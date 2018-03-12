<?php
/**
 * Created by WHEREIN.
 * 工厂模式
 * 使用场景: 1、日志记录器：记录可能记录到本地硬盘、系统事件、远程服务器等，用户可以选择记录日志到什么地方。2、数据库访问，当用户不知道最后系统采用哪一类数据库，以及数据库可能有变化时。 3、设计一个连接服务器的框架，需要三个协议，"POP3"、"IMAP"、"HTTP"，可以把这三个作为产品类，共同实现一个接口。
 * User: yzm
 * Date: 2018/3/12
 * Time: 16:11
 */

/*
 * 创建一个接口
 */
interface Shape {
     public function draw();
}

/*
 * 实现接口的矩形实体类
 */
class Rectangle implements Shape {
    public function draw() {
        echo 'Rectange::draw() method';
    }
}
/*
 * 实现接口的正方形实体类
 */
class Square implements Shape {
    public function draw() {
        echo 'Square::draw() method';
    }
}
/*
 * 添加圆形类
 */
class Circle implements Shape {
    public function draw() {
        echo 'Circle::draw() method';
    }
}

/*
 * 创建一个Shape的工厂类
 */
class ShapeFactory {
    public function getShape($shape_type) {
        if (empty($shape_type)) {
            exit('Class is empty');
        }
        $shape_type = lcfirst(strtolower($shape_type));
        if (class_exists($shape_type)) {
            $Shape = new $shape_type();
            return $Shape->draw();
        } else {
            exit('Class: ' . $shape_type . ' is not exist');
        }
    }
}

/*
 * 使用Shape工厂类
 */
class FactoryPatternDemo extends ShapeFactory {
    public static function index($new_shape) {
        $ShapeFactory = new ShapeFactory();
        $result = $ShapeFactory->getShape($new_shape);
        return $result;
    }
}

// test
FactoryPatternDemo::index('circle');