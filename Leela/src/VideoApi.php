<?php
namespace Leela;

use Leela\Contracts\VideoApiInterface;

class VideoApi {
    public function __construct(VideoApiInterface $videoApiInterface) {
        $this->videoApiType = $videoApiInterface;
    }

    public function getVideoDetails($video_id) {
        return $this->videoApiType->getVideoDetails($video_id);
    }
}