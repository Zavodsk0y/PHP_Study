<?php

// Дополните метод sayHello(), чтобы котики после того, как назвали своё имя, говорили о том, какого они цвета.

// Сделайте свойство color приватным и добавьте в конструктор ещё один аргумент, через который при создании котика будет задаваться его цвет.

// Сделайте геттер, который будет позволять получить свойство color.

// Подумайте, стоит ли давать возможность менять котикам цвета после их создания? nope. Но сеттер я сделаю
// Если вам хватило совести сказать да - добавьте ещё и сеттер для этого свойства. Это вам в наказание - хорошие люди котов не перекрашивают.

// Создайте теперь белого Снежка и рыжего Барсика и попросите их рассказать о себе.

class Cat
{
    private $name;
    private $color;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello()
    {
        echo 'Привет! Меня зовут ' . $this->name . '.' . PHP_EOL;
        echo "Мой цвет - " . $this->color . '.' . PHP_EOL . "<br>";
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }
};

$cat1 = new Cat('Снежок', 'белый');
$cat2 = new Cat('Барсик', 'рыжий');

$cat1->sayHello();
$cat2->sayHello();