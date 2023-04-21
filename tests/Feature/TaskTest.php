<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;
    
    public function testGet(): void
    {
        $task = Task::factory()->count(10)->create();

        $response = $this->getJson('api/tasks');

        $response->assertStatus(200);
    }
    public function testPost(): void
    {
        $data = [
            'title'=>'testtitle'
        ];
        $response = $this->postJson('api/tasks',$data);

        $response->assertStatus(201);
    }
    public function testUpdate(): void
    {
        $task = Task::factory()->create();
        
        $task->title = 'titlechange';
     
        $response = $this->patchJson('api/tasks/'.$task->id,$task->toArray());

        $response->assertOk();
    }
    public function testDestroy(): void
    {
        $task = Task::factory()->create();
   
        $response = $this->deleteJson('api/tasks/'.$task->id);

        $response->assertOk();
    }
}