<?php

class BlackMage extends Human {

  // プロパティ
  const MAX_HITPOINT = 4000;
  private $hitPoint = 4000;
  private $attackPoint = 2000;
  // 魔法攻撃力
  private $intelligence = 2500;

  public function __construct($name) {
    parent::__construct($name, $this->hitPoint, $this->attackPoint, $this->intelligence);
  }


  public function doAttack($enemies) {
    // 自分のHPが0以上か、敵のHPが0以上かなどをチェックするメソッドを用意。
    if (!$this->isEnableAttack($enemies)) {
      return false;
    }
    // ターゲットの決定
    $enemy = $this->selectTarget($enemies);

    if (rand(1,2) === 1) {
      echo "『".$this->getName()."』のスキルが発動した！\n";
      echo "『ブラック・マジック』！！\n";
      echo $enemy->getName()."に".$this->intelligence * 1.5 ."のダメージ！\n";
      $enemy->tookDamage($this->intelligence * 1.5);
    } else {
      parent::doAttack($enemies);
    }
    return true;
  }
}
