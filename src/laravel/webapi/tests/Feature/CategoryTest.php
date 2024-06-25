<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
        $this->assertEquals('今月のお薦め',              $response['data'][0]['title'] );
        $this->assertEquals('ネット注文特別価格メニュー', $response['data'][1]['title'] );
        $this->assertEquals('限定メニュー',              $response['data'][2]['title'] );

        $this->assertEquals(1, $response['data'][0]['sortid'] );
        $this->assertEquals(2, $response['data'][1]['sortid'] );
        $this->assertEquals(3, $response['data'][2]['sortid'] );
    }

    public function test_get_by_id() {
        $response = $this->get('/api/categories/2');
        $response->assertStatus(200);
        $this->assertEquals('限定メニュー', $response['data']['title'] );
        $this->assertEquals(3, $response['data']['sortid'] );
   }
    public function test_get_by_slug() {
        $response = $this->get('/api/categories/special2/slug');
        $response->assertStatus(200);
        $this->assertEquals('ネット注文特別価格メニュー', $response['data']['title'] );
    }
}
