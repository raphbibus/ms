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

  public function __construct(Carbon $startDate) {
    $this->startDate = $startDate;
  }

  public function getOptions(): array {
    return $this->options;
  }

  public function getFrequency(): array {
    return $this->frequency;
  }

  public function getNextDoseDue(): string {

    $dayFound = false;
    $optionIndex = 0;
    $startDate = $this->startDate;
    $today = Carbon::today();

    while(!$dayFound) {

      for($i = 0; $i < count($this->frequency); $i++) {

        $optionIndex++;

        $startDate->addDays($this->frequency[$i]);

        if($startDate->greaterThanOrEqualTo($today)) {
          $dayFound = true;
          $string = "Next dose of rebif is due on {$startDate->englishDayOfWeek} ({$startDate->toFormattedDateString()}).
                    <br>Put it in your {$this->options[$optionIndex]}.";
          return $string;
        }

      }

      if($optionIndex == count($this->options)-1) {
        $optionIndex = 0;
      }

    }

  }

}

?>
