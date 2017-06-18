<? php

class Circle {

	public $lenght;
	public $breadth;

	function setRectangle($lenght, $breadth){
		$this->lenght = $lenght;
		$this->breadth = $breadth;
	}

	function area() {
		return $this->lenght * $this->breadth;
	}

	function perimeter(){
		return 2 * $this->lenght + 2 * $this->breadth;

	}
}

$a = new Circle ();
$a->setRectangle(5, 4);

echo $a->area() "\n";

echo $p->perimeter();



?>