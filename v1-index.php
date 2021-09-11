<?php

/********************CLASS/PROPERTIES/METHODS************************************ */
class User
{
    //define property
    public $name;
    private $status;

    //methods'
    public function sayHello()
    {
        return $this->name . "hello";
    }
}

// $user = new User();
// $user->name = "Dary";
// echo $user->name;
// echo '<br>';
// echo $user->sayHello();


/********************INHERITANCE************************************ */

class Person
{
    public $firstname;
    public $emailaddress;

    public function welcomeMessage()
    {
        return "Have a great shift";
    }
}

class Manager extends Person
{
    public $level;
}

class Employee extends Person
{
}

// $testPerson = new Person();
// $testPerson->firstname = "chavindu";
// $testPerson->emailaddress = "chavindu@gmail.com";
// echo $testPerson->firstname . " " . $testPerson->emailaddress;
// echo '<br>';
// $manager = new Manager();
// $manager->firstname = "john";
// $manager->emailaddress = "john@gmail.com";
// $manager->level = "Super-admin";
// echo $manager->firstname . " " . $manager->emailaddress . "" . $manager->level;
// echo '<br>';
// echo $manager->welcomeMessage();


/********************CONSTRUCTORS  & DECONSTRUCTORS************************************ */

class Example
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        // echo "this is a constrcutor";
        $this->name = $name;
        $this->age = $age;
    }
    public function __destruct()
    {
        echo "deconstructoer works";
    }
    public function myAge()
    {
        return "my age is" . $this->age;
    }
}

// $test = new Example("testy", 35);
// echo "my name is " . $test->name;
// echo '<br>';
// echo $test->myAge();
// echo '<br>';


/********************GETTERS & SETTERS************************************ */

class Test
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    // public function getName()
    // {
    //     return $this->name;
    // }
    // public function setName($name)
    // {
    //     $this->name = $name;
    // }
    // public function getAge()
    // {
    //     return $this->age;
    // }
    // public function setAge($age)
    // {
    //     $this->age = $age;
    // }

    //magic method
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }
}

// $test = new Test('test', 25);
// // echo $test->getName();
// $test->__set('name', 'chavindubug');
// echo $test->__get('name');


/********************STATIC PROPERTIES AND METHODS************************************ */

class CheckStatic
{
    public static $nextId = 0;
    public $myId;
    private static $property = 'hahahah';

    public static function printId($id)
    {
        return $id;
    }
    public static function printProp()
    {
        return "User Id is:" . self::$property;
    }
}

// echo CheckStatic::printId(12);
// echo CheckStatic::$nextId;
// echo CheckStatic::printProp();


/********************ABSTRACT CLASSES & METHODS************************************ */

//SYNTX
abstract class ParentClass
{
    abstract public function someMethod1();
    abstract public function someMethod2($name, $color);
    abstract public function someMethod3(): string;
}

//EXAMPLE :
// Parent class
abstract class Car
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    abstract public function intro(): string;
}
//PUBLIC PROPERTY AND CONSTRUCT IS BEING ACCESSED BY CHILD CLASSES THROUGH INHERITANCE / TO ACEESS ABSTRACT FUNCTION CHILD CLASSES MUST
//INITITATE THE FUNCTION INTRO() THAT RETURNS A STRING

// Child classes
class Audi extends Car
{
    public function intro(): string
    {
        return "Choose German quality! I'm an $this->name!";
    }
}

class Volvo extends Car
{
    public function intro(): string
    {
        return "Proud to be Swedish! I'm a $this->name!";
    }
}

class Citroen extends Car
{
    public function intro(): string
    {
        return "French extravagance! I'm a $this->name!";
    }
}

// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citroen = new citroen("Citroen");
echo $citroen->intro();
