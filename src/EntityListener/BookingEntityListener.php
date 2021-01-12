<?php

namespace App\EntityListener;

use App\Entity\Booking;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class BookingEntityListener
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Booking $booking, LifecycleEventArgs $event)
    {
        $booking->computeSlug($this->slugger);
    }

    public function preUpdate(Booking $booking, LifecycleEventArgs $event)
    {
        $booking->computeSlug($this->slugger);
    }
}
