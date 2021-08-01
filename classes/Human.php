<?php 

class Human extends Lives {
  // 最大HPの定義
  const MAX_HITPOINT = 4000;

  public function __construct($name, $hitPoint = 100, $attackPoint = 20, $intelligence = 0) {
    parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
  }
}