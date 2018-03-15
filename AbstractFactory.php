<?php
/**
 * Created by WHEREIN.
 * 抽象工厂模式
 * 使用场景： 1、QQ 换皮肤，一整套一起换。 2、生成不同操作系统的程序。
 * User: yzm
 * Date: 2018/3/12
 * Time: 17:34
 */

/*
 * 创建一个形状接口
 */
interface Shape {
    public function draw();
//    public function size();
}

/*
 * 创建实现接口的实体类。
 */
class Rectangle implements Shape {
    public function draw() {
        echo 'Rectange::draw() method';
    }
    public function size() {
        echo 'Rectange::size() method';
    }
}
class Square implements Shape {
    public function draw() {
        echo 'Square::draw() method';
    }
    public function size() {
        // TODO: Implement size() method.
    }
}
class Circle implements Shape {
    public function draw() {
        echo 'Circle::draw() method';
    }
    public function size() {
        // TODO: Implement size() method.
    }
}

/*
 * 为颜色创建一个接口
 */
interface Color {
    // 填充颜色
    public function fill();
}

/*
 * 创建实现接口的实体类.
 */
class Red implements Color {
    public function fill() {
        echo 'Red::fill() method';
    }
}
class Green implements Color {
    public function fill() {
        echo 'Green::fill() method';
    }
}
class Blue implements Color {
    public function fill() {
        echo 'Blue::fill() method';
    }
}

/*
 * 为 Color 和 Shape 对象创建抽象类来获取工厂
 */
abstract class AbstractFactory {
    abstract protected function getShape($shape);
    abstract protected function getColor($color);
}

/*
 * 创建扩展了 AbstractFactory 的工厂类，基于给定的信息生成实体类的对象
 */
class ShapeFactory extends AbstractFactory {
    public function getShape($shape) {
        if (empty($shape)) {
            exit('Class is empty');
        }
        $shape = lcfirst(strtolower($shape));
        if (class_exists($shape)) {
            $Shape = new $shape();
            return $Shape->draw();
//            return new $Shape();
        } else {
            exit('Class: ' . $shape . ' is not exist');
        }
    }

    public function getColor($color) {
        // TODO: Implement getColor() method.
    }
}
class ColorFactory extends AbstractFactory {
    public function getShape($shape) {
        // TODO: Implement getShape() method.
    }

    public function getColor($color) {
        if (empty($color)) {
            exit('Class is empty');
        }
        $color = lcfirst(strtolower($color));
        if (class_exists($color)) {
            $Color = new $color();
            return $Color->fill();
//            return new $Color();
        } else {
            exit('Class: ' . $color . ' is not exist');
        }
    }
}

/*
 * 通过传递形状或颜色信息来获取工厂
 */
class FactoryProducter {
    public static function getFactory($choice) {
        $choice = lcfirst(strtolower($choice));
        switch ($choice) {
            case 'shape':
                return new ShapeFactory();
                break;
            case 'color':
                return new ColorFactory();
                break;
            default:
                exit('sorry,'.$choice.' is not exist');
        }
    }
}

// test
$F = new FactoryProducter();
$F->getFactory('shape')->getShape('circle');
$F->getFactory('color')->getColor('red');
//$F->getFactory('shape')->getShape('square')->draw();


