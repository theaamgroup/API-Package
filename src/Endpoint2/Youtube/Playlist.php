<?php

namespace AAM\Api\Endpoint\Youtube;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Playlist extends Auth
{
    protected $data = [];

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
     * Sets the channel descriptor for the request.
     * @param string $channel_descriptor The channel ID or username
     */
    public function setChannelDescriptor(string $channel_descriptor): void
    {
        $this->data['channel_descriptor'] = $channel_descriptor;
    }

    /**
     * Sets the playlist ID for the request.
     * @param string $playlist_id The playlist ID
     */
    public function setPlaylistId(string $playlist_id): void
    {
        $this->data['playlist_id'] = $playlist_id;
    }

    /**
     * Sets the limit for the request.
     * @param int $limit The number of results to return
     */
    public function setLimit(int $limit): void
    {
        $this->data['limit'] = $limit;
    }

    /**
     * Fetches playlist ID for given channel descriptor.
     * @return array Response from the Playlist endpoint.
     */
    public function getPlaylist(): array
    {
        $req = new Request();
        return $req->call('GET', 'youtube/playlist', array_filter($this->data), $this->getAuthHeader());
    }

    /**
     * Fetches a list of playlist items.
     * @return array Response from the Playlist endpoint.
     */
    public function getPlaylistItems(): array
    {
        $req = new Request();
        return $req->call('GET', 'youtube/playlist/items', array_filter($this->data), $this->getAuthHeader());
    }
}
