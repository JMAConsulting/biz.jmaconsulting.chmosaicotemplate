<?php

class CRM_Chmosaicotemplate_TemplateWrapper implements API_Wrapper {

  public function fromApiInput($apiRequest) {
    return $apiRequest;
  }

  public function toApiOutput($apiRequest, $result) {
    foreach ($result['values'] as $key => $res) {
      if (isset($res['metadata'])) {
        if ($res['title'] == 'Basic - Email With Gallery') {
          $metadata = json_decode($res['metadata'], TRUE);
          $metadata['thumbnail'] = '/vendor/civicrm/canadahelps/biz.jmaconsulting.chmosaicotemplate/chtemplate/thumbnails/Basic%20-%20Email%20With%20Gallery.jpg';
          $result['values'][$key]['metadata'] = json_encode($metadata);
        }
      }
    }
    return $result;
  }

}     
