<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    public function testTruncate(): void
    {
        $title = 'Морозов Петр Степанович';

        $truncater1 = new Truncater();

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Морозов Петр Степ...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 17]));

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Морозов Петр Степ***";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 17, 'separator' => '***']));

        $expected = "Морозов Петр ...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => -6]));

        $truncater2 = new Truncater(['length' => 17, 'separator' => '!!!']);

        $expected = "Морозов Петр Степ!!!";
        $this->assertSame($expected, $truncater2->truncate($title));
    }
}
