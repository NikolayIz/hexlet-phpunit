<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Utils\reverseString;

// Класс UtilsTest наследует класс TestCase
// Имя класса совпадает с именем файла
class UtilsTest extends TestCase
{
    // Метод (функция), определенный внутри класса,
    // Должен начинаться со слова test
    // Ключевое слово public нужно, чтобы PHPUnit мог вызвать этот тест снаружи
    public function getFixtureFullPath($fixtureName)
    {
        $parts = [__DIR__, 'fixtures', $fixtureName];
        return realpath(implode('/', $parts));
    }
    
    public function testReverse(): void
    {
        // Сначала идет ожидаемое значение (expected)
        // И только потом актуальное (actual)
        $this->assertEquals('', reverseString(''));
        $this->assertEquals('olleh', reverseString('hello'));

        $pathToOriginal = $this->getFixtureFullPath('original.txt');
        $pathToExpected = $this->getFixtureFullPath('expected.txt');

        $original = file_get_contents($pathToOriginal);
        $originalReverse = reverseString($original);

        $this->assertStringEqualsFile($pathToExpected, $originalReverse);
    }
}