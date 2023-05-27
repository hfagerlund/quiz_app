<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewsTest extends TestCase
{
    public function test_a_welcome_blade_view_can_be_rendered(): void
    {
        $view = $this->view('welcome');

        $view->assertSee('Laravel v10.10.0');
    }
}
