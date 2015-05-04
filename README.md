# VideoApi

API for the video websites such as youtube, Vimeo and dailymotion

Uses Strategy Design Pattern

Begin by installing this package through Composer. Edit your project's `composer.json` file to require`.

	"require": {
	"leela/VideoApi": "0.1"
	}
	
Next, update Composer from the Terminal:

    composer update
    
That's it! You're all set to go.

## Usage for youtube video details
    <?php
    $youtubeapi = new \Leela\VideoApi(new \Leela\Services\YouTubeService());
    $youtubeapi->getVideoDetails('x2on26a');
    
## Usage for Vimeo video details
    <?php
    $vimeoapi = new \Leela\VideoApi(new \Leela\Services\VimeoService());
    $vimeoapi->getVideoDetails('x2on26a');
    
## Usage for Daily Motion video details
    <?php
    $dailymotionapi = new \Leela\VideoApi(new \Leela\Services\DailyMotionService());
    $dailymotionapi->getVideoDetails('x2on26a');
    
    
## Methods

    1) getVideoDetails($videoId);

    $videoId - Video Id of the youtube, Vimeo or the daily motion
    
    Returns array of video details
    array(
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
    
    2)  getPlayer($videoId, $width, $height)
        $videoId  - Required (Video id of the youtube, Vimeo or the dailymotion)
        $width - Optional (width of the player)
        $height - Optional  (height of the player)

Returns the html data of the player

## Contributor
Leela Narasimha Reddy - leela@leelag.com

## Issues & Suggestions
Please report any bugs or feature requests here: https://github.com/leelanarasimha/VideoApi/issues
    

