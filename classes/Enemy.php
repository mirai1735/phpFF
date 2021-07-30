<?php

class Enemy {
  // 最大HPの定義
  const MAX_HITPOINT = 50;
  // 敵の名前
  public $name;
  // 現在のHP
  public $hitPoint = 50;
  // 攻撃力
  public $attackPoint = 10;

  public function doAttack($human) {
    echo "『".$this->name."』の攻撃！\n";
    echo "【".$human->name."】に".$this->attackPoint."のダメージ！\n";
    $human->tookDamage($this->attackPoint);
  }

  public function tookDamage($damage) {
    $this->hitPoint -= $damage;
    // HPが0未満にならないための処理
    if($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }
}