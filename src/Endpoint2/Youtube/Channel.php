<?php

namespace AAM\Api\Endpoint\Youtube;

class Channel
{
    /**
     * Returns the YouTube URL for a given channel descriptor.
     * @param string $channel_descriptor The channel ID or username
     */
    public static function getChannelLink(string $channel_descriptor): string
    {
        $link = substr($channel_descriptor, 0, 2) === 'UC' ? 'channel' : 'user';
        return "https://youtube.com/$link/$channel_descriptor";
    }
}
