<?php namespace Tests;

trait ApiTestTrait
{
    private $response;
    public $is_read = false ;
    public function assertApiResponse(Array $actualData)
    {
        // info($this->response->getContent());
        $this->assertApiSuccess();
        $response = json_decode($this->response->getContent(), true);
        
        $responseData = $response['data'];

        $this->assertNotEmpty($responseData['id']);
        $this->assertModelData($actualData, $responseData);
    }

    public function assertApiSuccess()
    {
        $this->response->assertStatus(200);
        $this->response->assertJson(['success' => true]);
    }

    public function assertModelData(Array $actualData, Array $expectedData)
    {
        foreach ($actualData as $key => $value) {
            if (in_array($key, ['created_at', 'updated_at'])) {
                continue;
            }
             
            if ($key == "password" && !$this->is_read )
              { 
                  
                   $this->assertTrue(\Hash::check( $actualData[$key] , $expectedData[$key] ));
                
                }

            else $this->assertEquals($actualData[$key], $expectedData[$key]);
        }
    }
}
