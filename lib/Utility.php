<?php

// 終了条件の判定
function isFinish($objects) {
  // HPが0以下の数
  $deathCnt = 0;
  foreach ($objects as $object) {
    // １人でもHPが０を超えていたらfalseを返す
    if($object->getHitPoint() > 0) {
      return false;
    }
    $deathCnt++;
  }
  // 仲間の数が死亡数(HPが０以下の数)と同じであればtrueを返す
  if ($deathCnt === count($objects)) {
    return true;
  }
}