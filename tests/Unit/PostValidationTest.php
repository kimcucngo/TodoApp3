<?php

namespace Tests\Unit;

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PostValidationTest extends TestCase
{
    /**
     * A basic test example.
     * @dataProvider data
     * @param $title 
     * @param $is_done
     * @param $expects
     */
    public function testPostValidation($title,$is_done,$expects): void
    {
        $object = new TaskRequest;
        $data = [
            'title'=>$title,
            'is_done'=>$is_done,
        ];
        $validator=Validator::make($data,$object->rules());

        $results=$validator->passes();
        
        $this->assertEquals($results,$expects);
    }
    public function data(){
        return [
            ['bhfj','0',false],
            ['','1',false],
            ['kdfjshg','1',true]
        ];
    }
}