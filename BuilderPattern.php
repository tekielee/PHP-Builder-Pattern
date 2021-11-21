<?php
class Wrapper {
	function __construct() {}
	
	public function pack(): string {
		return 'Wrapper';
	}
}

class Bottle {
	function __constructor() {}
	
	public function pack(): string {
		return 'Bottle';
	}
	
}

abstract class Burger {
	function __construct() {}
	
	public function packing(): object {
		return new Wrapper();
	}
	
	abstract public function price(): float;
}

abstract class ColdDrink {
	function __construct() {}
	
	public function packing(): object {
		return new Bottle();
	}
	
	abstract public function price(): float;
}

class VegBurger extends Burger {
	function __construct() {
		parent::__construct();
	}
	
	public function price(): float {
		return 25.0;
	}
	
	public function name(): string {
		return 'Veg Burger';
	}
}

class ChickenBurger extends Burger {
	function __construct() {
		parent::__construct();
	}
	
	public function price(): float {
		return 50.5;
	}
	
	public function name(): string {
		return 'Chicken Burger';
	}
}

class Coke extends ColdDrink {
	function __construct() {
		parent::__construct();
	}
	
	public function price(): float {
		return 30.0;
	}
	
	public function name(): string {
		return 'Coke';
	}
}

class Pepsi extends ColdDrink {
	function __construct() {
		parent::__construct();
	}
	
	public function price(): float {
		return 35.0;
	}
	
	public function name(): string {
		return 'Pepsi';
	}
}

class Meal {
	function __construct() {
		$this->items = [];
	}
	
	public function addItem(object $item) {
		array_push($this->items, $item);
	}
	
	public function getCost(): float {
		$cost = 0.0;
		
		for($i = 0; $i < sizeof($this->items); $i++) {
			$cost += $this->items[$i]->price();
		}
		
		return $cost;
	}
	
	public function showItems(): void {
		for($i = 0; $i < sizeof($this->items); $i++) {
			echo 'Item : ' . $this->items[$i]->name() . ', Packing : ' . $this->items[$i]->packing()->pack() . ', Price : ' . $this->items[$i]->price() . '<br/>';
		}
	}
}

class MealBuilder {
	function __construct() {}
	
	public function prepareVegMeal() {
		$meal = new Meal();
		$meal->addItem(new VegBurger());
		$meal->addItem(new Coke());
		
		return $meal;
	}
	
	public function prepareNonVegMeal() {
		$meal = new Meal();
		$meal->addItem(new ChickenBurger());
		$meal->addItem(new Pepsi());
		
		return $meal;
	}
}

$mealBuilder = new MealBuilder();
$vegMeal = $mealBuilder->prepareVegMeal();
echo 'Veg Meal<br/>';
$vegMeal->showItems();
echo 'Total cost: ' . $vegMeal->getCost() . '<br/>';

$nonVegMeal = $mealBuilder->prepareNonVegMeal();
echo 'Non-Veg Meal<br/>';
$nonVegMeal->showItems();
echo 'Total cost: ' . $nonVegMeal->getCost();
?>