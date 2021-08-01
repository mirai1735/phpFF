<?php

class Enemy extends Lives {
  // 最大HPの定義
  const MAX_HITPOINT = 8000;

  public function __construct($name, $attackPoint) {
    $hitPoint = 8000;
    $intelligence = 0;
    parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
  }
}