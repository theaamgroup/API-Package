<?php

namespace AAM\Api\Endpoint\Youtube;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Video extends Auth
{
    protected $data = [];
    protected $video_ids = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Sets the AAM YouTube project key for the request.
     * @param string $project_key The AAM YouTube project key
     */
    public function setProjectKey(string $project_key): void
    {
        $this->data['project_key'] = $project_key;
    }

    /**
     * Adds a video ID to the list of videos IDs for the request.
     * @param string $video_id The video ID
     */
    public function addVideoId(string $video_id): void
    {
        $this->video_ids[] = $video_id;
    }

    /**
     * Fetches information about a video.
     * @return array Response from the Video endpoint.
     */
    public function getVideo(): array
    {
        $this->data['video_id'] = implode(',', $this->video_ids);
        $req = new Request();
        return $req->call('GET', 'youtube/video', array_filter($this->data), $this->getAuthHeader());
    }

    /**
     * Extracts a video ID from a YouTube URL
     * @param string $url The YouTube URL to extract the ID from
     */
    public static function extractVideoId(string $url): string
    {
        $regex = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/"
            . "(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";

        if (preg_match($regex, $url, $matches) == 1) {
            return $matches[1];
        }

        return '';
    }
}
