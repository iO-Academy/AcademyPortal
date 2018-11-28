<?php

namespace Portal\ViewHelpers;

class EventListViewHelper
{
    public static function outputEventList($events) {
        foreach ($events as $event) {
            $return =  '<div class= '. "event" . '>' .
            '<div class=' . "top" . '>' .
                '<div class=' . "upper" . '>' .
                    '<div class=' . "infoBox" . '>' .
                        '<span><strong>Event Name</strong></span>' .
                        '<span>' . $event['eventName'] . '</span>' .
                    '</div>' .
                    '<div class=' . "infoBox" . '>' .
                        '<span><strong>Type</strong></span>' .
                        '<span >' . $event['type']  . '</span>' .
                    '</div>
                    <div class=' . "infoBox" . '>
                        <span><strong>Date</strong></span>' .
                        '<span >' . $event['date'] . '</span>' .
                    '</div>
                </div>
                <div class=' . "mid" . '>
                    <div class=' . "infoBox-mid" . '>
                        <span><strong>Start Time</strong></span>' .
                '<span >' . $event['startTime'] . '</span>' .
                    '</div>
                    <div class= ' . "infoBox-mid" . '>
                        <span><strong>End Time</strong></span>' .
                '<span >' . $event['endTime'] . '</span>' .
                    '</div>
                </div>
            </div>
            <div class=' . "arrowBox" . '>
                <span>&#x21E9;</span>
            </div>
            <div class=' . "lower" . '>
                <div class=' . "infoBox-low" . '>
                    <span><strong>Location</strong></span>
                <div>' . $event['location'] . '</div>
                </div>
                <div class=' . "infoBox-low" . '>
                    <span><strong>Notes</strong></span>
                    <div>' . $event['notes'] . '</div>
                </div>
            </div>

        </div>';
            $arr[] = $return;
        }
        return $arr;
    }
}