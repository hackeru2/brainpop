<?php 
  namespace App\Models\Traits;

trait ShowPasswordsTesting
{

  public function toArray()
  {
      // Only show passwords if running tests
     
          $this->setAttributeVisibility();
     
  
      return parent::toArray();
  }
  
      public function setAttributeVisibility()
      {
           if(env("APP_ENV") == "testing")
          $this->makeVisible(array_merge($this->fillable, $this->appends));
      }
  
      
  }
  
 
