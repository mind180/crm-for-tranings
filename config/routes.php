
<?php
  return array(
    //'news/([a-z]+)/([0-9]+)' =>  'news/view/$1/$2',
    'login' => 'user/login',
    'registration' => 'user/registration',
    'news' =>  'news/index',
    //'manage/trainings' => 'manage/trainings',
    'manage/([a-z]+)' => 'manage/indexer/$1',
    'manage' => 'manage/home',
    'test' => 'test/test',
  );
?>
