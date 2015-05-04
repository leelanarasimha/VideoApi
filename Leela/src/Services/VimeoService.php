<?php
namespace Leela\Services;

use Leela\Contracts\VideoApiInterface;
use Leela\Traits\VideoApiTrait;

class VimeoService implements VideoApiInterface {

    use VideoApiTrait;
    public function getVideoDetails($video_id)
    {
        $url = "http://vimeo.com/api/v2/video/$video_id.json";
        $result = $this->performCurlRequest($url);
        $json = json_decode($result);
        return $this->formatDetails($json[0]);
    }

    private function formatDetails($data)
    {
        return array(
            'id'              => $data->id,
            'title'           => $data->title,
            'description'     => $data->description,
            'thumbnail_small' => $data->thumbnail_small,
            'thumbnail_large' => $data->thumbnail_large,
            'duration'        => $data->duration,
            'upload_date'     => $data->upload_date,
            'like_count'      => isset($data->stats_number_of_likes) ? $data->stats_number_of_likes : 0,
            'view_count'      => isset($data->stats_number_of_plays) ? $data->stats_number_of_plays : 0,
            'comment_count'   => isset($data->stats_number_of_comments) ? $data->stats_number_of_comments : 0,
            'uploader'        => $data->user_name
        );
    }

    public function getPlayer($videoId, $width = 420, $height = 315) {
        $html_data = '<iframe src="https://player.vimeo.com/video/{$videoId}" width="{$width}" height="{$height}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        return $html_data;
    }
}
