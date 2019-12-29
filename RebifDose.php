<?php

namespace Rebif;

use Carbon\Carbon;

class RebifDose {

  private $options = [
    "left booty",
    "right booty",
    "left leg",
    "right leg",
  ];

  private $frequency = [
    3, 2, 2,
  ];

  private $startDate;
  private $optionsIndex = 0;
  private $dayFound = false;

  public function __construct(Carbon $startDate) {
    $this->startDate = $startDate;
  }

  public function nextDose() {

    $today = Carbon::today();

    while(!$this->dayFound) {

        foreach($this->frequency as $k => $f) {

            $this->startDate->addDays($f);
            $this->nextOptionsIndex();

            if($this->startDate->greaterThanOrEqualTo($today)) {
              $this->dayFound = true;
              $string = "Next dose of rebif is due on {$this->startDate->englishDayOfWeek} ({$this->startDate->toFormattedDateString()}).
                        <br>Put it in your {$this->options[$this->optionsIndex]}.";
              return $string;
            }

        }

    }

  }

  private function nextOptionsIndex() {

    $this->optionsIndex++;
    if($this->optionsIndex >= count($this->options)) {
      $this->optionsIndex = 0;
    }

  }

}

?>
