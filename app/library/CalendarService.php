<?php

namespace GolfLeague\Services;

use GolfLeague\Storage\Match\MatchRepository;

class CalendarService
{
    // Containing our matchRepository to make all our database calls to
    protected $matchRepo;

    /**
     * Loads our $matchRepo
     *
     * @param MatchRepository $matchRepo
     * @return CalendarService
     */
    public function __construct(MatchRepository $matchRepo)
    {
        $this->matchRepo = $matchRepo;
    }

    public function getByDate($startDate, $endDate)
    {
        $events = $this->matchRepo->getByDate($startDate, $endDate);
        //Decorate for javascript Calendar
        return $this->formatEvents($events);
    }

    public function formatEvents($events)
    {
        $events->toArray();
        foreach($events as $event){
            $event['title'] = 'Match ' . $event->course->name;
            $event['url'] = 'matches/' . $event->id . '?group=1';
        }
        return $events;
    }

}