<?php
namespace Leela\Services;

use Leela\Contracts\VideoApiInterface;
use Leela\Traits\VideoApiTrait;

class DailyMotionService implements VideoApiInterface
{
    use VideoApiTrait;


    public function getVideoDetails($video_id)
    {
        $fieldsDefined = implode(',', $this->setFieldsForDailymotion());
        $url = "https://api.dailymotion.com/video/$video_id?fields=" . $fieldsDefined;
        $result = $this->performCurlRequest($url);
        if ($result) {
            return $this->formatDetails(json_decode($result));
        }
    }

    private function formatDetails($data)
    {
        return array(
            'id' => $data->id,
            'title' => $data->title,
            'description' => $data->description,
            'thumbnail_small' => $data->thumbnail_120_url,
            'thumbnail_large' => $data->thumbnail_180_url,
            'duration' => $data->duration,
            'upload_date' => $data->created_time,
            'like_count' => isset($data->likeCount) ? $data->likeCount : 0,
            'view_count' => isset($data->views_total) ? $data->views_total : 0,
            'comment_count' => isset($data->comments_total) ? $data->comments_total : 0,
            'uploader' => $data->owner
        );
    }

    public function getPlayer($videoId, $width = 420, $height = 315) {
        $html_data = '<iframe frameborder="0" width="{$width}" height="{$height}" src="//www.dailymotion.com/embed/video/{$videoId}" allowfullscreen></iframe>';
        return $html_data;
    }
}