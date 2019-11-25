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
  private $internalDate;

  public function __construct(Carbon $startDate) {
    $this->startDate = $startDate;
    $this->internalDate = $startDate;
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
    $today = Carbon::now();

    while(!$dayFound) {

      for($i = 0; $i < count($this->frequency); $i++) {

        $optionIndex++;
        $this->internalDate->addDays($this->frequency[$i]);

        if($this->internalDate->greaterThanOrEqualTo($today)) {
          $dayFound = true;
          $string = "Next dose of rebif is due on {$this->internalDate->englishDayOfWeek} ({$this->internalDate->toFormattedDateString()}). Put it in your {$this->options[$optionIndex]}.";
          $this->internalDate = $this->startDate;
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
