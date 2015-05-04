<?php
namespace Leela\Contracts;

interface VideoApiInterface {
    public function getVideoDetails($video_id);
    public function getPlayer($video_id, $width, $height);
}