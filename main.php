<?php

// echo "処理のはじまりはじまり～！\n\n";

// ファイルのロード
require_once('./lib/Loader.php');
require_once('./lib/Utility.php');

// オートロード
$loader = new Loader();
// classesフォルダの中身をロード対象ディレクトリとして登録
$loader->regDirectory(__DIR__ . '/classes');
$loader->regDirectory(__DIR__ . '/classes/constants'); 
$loader->register();



// インスタンス化
$members = array();
$members[] = Brave::getInstance(CharacterName::KAIBA);
$members[] = new WhiteMage(CharacterName::ANZU);
$members[] = new BlackMage(CharacterName::YUGI);

$enemies = array();
$enemies[] = new Enemy(EnemyName::MARIC, 1800);
$enemies[] = new Enemy(EnemyName::BACRA, 1500);
$enemies[] = new Enemy(EnemyName::PEGASUS, 1300);


$turn = 1;
$isFinishFlg = false;

$messageObj = new Message;

while (!$isFinishFlg) {
  echo "▼▼▼▼▼▼▼▼▼▼▼▼ $turn ターン目 ▼▼▼▼▼▼▼▼▼▼▼▼\n\n";

  // ======================= 現在のHPの表示 =======================
  // 仲間の表示
  $messageObj->displayStatusMessage($members);
  echo "\n";
  // 敵の表示
  $messageObj->displayStatusMessage($enemies);
  echo "\n";


  // ======================= 攻撃 =======================
  // 仲間の攻撃
  $messageObj->displayAttackMessage($members, $enemies);
  echo "\n";
  // 敵の攻撃
  $messageObj->displayAttackMessage($enemies, $members);
  echo "\n";

  // 戦闘終了条件のチェック 仲間全員のHPが0 または、敵全員のHPが0
  $isFinishFlg = isFinish($members);
  if ($isFinishFlg) {
      $message = "YOU LOSE....\n\n";
      break;
  }

  $isFinishFlg = isFinish($enemies);
  if ($isFinishFlg) {
      $message = "YOU WIN!!!\n\n";
      break;
  }

  $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";

echo $message;

// 仲間の表示
$messageObj->displayStatusMessage($members);
echo "\n";
// 敵の表示
$messageObj->displayStatusMessage($enemies);


// var_dump($tiida);