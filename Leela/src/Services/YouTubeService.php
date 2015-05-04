<?php
namespace Leela\Services;

use Leela\Contracts\VideoApiInterface;
use Leela\Traits\VideoApiTrait;

class YouTubeService implements VideoApiInterface
{
    use VideoApiTrait;
    public function getVideoDetails($videoId)
    {
        $url = "http://gdata.youtube.com/feeds/api/videos/$videoId?v=2&alt=jsonc";
        $result = $this->performCurlRequest($url);
        $json = json_decode($result);
        return $this->formatDetails($json->data);
    }

    private function formatDetails($data)
    {
        return array(
            'id' => $data->id,
            'title' => $data->title,
            'description' => $data->description,
            'thumbnail_small' => $data->thumbnail->sqDefault,
            'thumbnail_large' => $data->thumbnail->hqDefault,
            'duration' => $data->duration,
            'upload_date' => $data->uploaded,
            'like_count' => isset($data->likeCount) ? $data->likeCount : 0,
            'view_count' => isset($data->viewCount) ? $data->viewCount : 0,
            'comment_count' => isset($data->commentCount) ? $data->commentCount : 0,
            'uploader' => $data->uploader
        );
    }

    public function getPlayer($videoId, $width = 420, $height = 315) {
        $html_data = '<iframe width="{$width}" height="{$height}" src="https://www.youtube.com/embed/{$videoId}" frameborder="0" allowfullscreen></iframe>';
        return $html_data;
    }
}