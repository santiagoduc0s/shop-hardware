<?php

namespace Tests\Feature\Livewire\Pages;

use App\Http\Livewire\Pages\HomePage;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /** @test */
    public function home_page_contains_home_page_component()
    {
        $this->get('/')->assertDontSeeLivewire(HomePage::class);
    }
}
