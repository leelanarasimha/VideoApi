<?php
namespace Leela\Traits;

trait VideoApiTrait {
    public function performCurlRequest($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function setFieldsForDailymotion() {
        $fields = array(
            'id','title','description', 'thumbnail_120_url', 'thumbnail_180_url',
            'duration', 'created_time', 'views_total', 'comments_total', 'owner'
        );
        return $fields;
    }
}