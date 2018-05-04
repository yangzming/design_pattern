<?php
/**
 * Created by WHEREIN.
 * 建造者模式
 * 使用场景: 1、需要生成的对象具有复杂的内部结构。 2、需要生成的对象内部属性本身相互依赖。
 * User: yzm
 * Date: 2018/3/30
 * Time: 10:07
 */

/*
 * 食物条目接口
 */
interface Item {
    // 名称
    public function name();
    // 套餐
    public function packing();
    // 价格
    public function price();
}
interface Packing {
    public function pack();
}

/*
 * 实现Packing的接口
 */
class Wrapper implements Packing {
    public function pack() {
        // TODO: Implement pack() method.
    }
}
class Bottle implements Packing {
    public function pack() {
        // TODO: Implement pack() method.
    }
}

/*
 * 创建汉堡抽象类继承Item接口
 */
abstract class Burger implements Item {
    /*
     * 汉堡套餐
     */
    public function packing() {
        return new Wrapper();
    }
    abstract public function price();
}
abstract class ColdDrink implements Item {
    /*
     * 饮料套餐
     */
    public function packing() {
        return new Bottle();
    }
    abstract public function price();
}

/*
 * 创建扩展了Burger和ColdDrink的实现类
 */
class VegBurger extends Burger {
    public function price() {
        return 25;
    }
    public function name() {
        return '蔬菜汉堡';
    }
}
class ChickenBurger extends Burger {
    public function price() {
        return 50;
    }
    public function name() {
        return '鸡肉汉堡';
    }
}
class Coke extends ColdDrink {
    public function price() {
        return 10;
    }
    public function name() {
        return '可口可乐';
    }
}
class Pepsi extends ColdDrink {
    public function price() {
        return 15;
    }
    public function name() {
        return '百事可乐';
    }
}

class Meal {
    private $meal_list = array();

    /*
     * 加入购物清单
     */
    public function addItem($item) {
        $this->meal_list[] = $item;
    }

    /*
     * 结算清单
     */
    public function getCost() {
        $price = 0;
        if (!empty($this->meal_list)) {
            foreach ($this->meal_list as $value) {
                $price += $value.price();
            }
        }
        return $price;
    }
    /*
     * 展示清单
     */
    public function showItems() {
        if (!empty($this->meal_list)) {
            foreach ($this->meal_list as $v) {
                return $v;
            }
        }
    }
}

/*
 *
 */
class MealBuilder {
    public function prepareVegMeal() {
        $Meal = new Meal();
        $VegBurger = new VegBurger();
        $Coke = new Coke();
        $Meal->addItem($VegBurger);
        $Meal->addItem($Coke);
        return $Meal;
    }
    public function prepareNonVegMeal() {
        $Meal = new Meal();
        $ChickenBurger = new ChickenBurger();
        $Pepsi = new Pepsi();
        $Meal->addItem($ChickenBurger);
        $Meal->addItem($Pepsi);
        return $Meal;
    }
}

// test
$M = new MealBuilder();
$VegMeal = $M->prepareVegMeal();
$NoVegMeal = $M->prepareNonVegMeal();
var_dump($VegMeal);

