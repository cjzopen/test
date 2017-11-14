<?php
$global_db = "sqlite:/sites/global/events.db";
try {
  $db = new PDO($global_db);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Database connection failed: ' . $e->getMessage();
  exit;
}
$year = 2017;
$data = array();
$query = "SELECT * FROM news WHERE date LIKE '%{$year}%' ORDER BY date DESC";
$rs = $db->query($query)->fetchAll();
foreach ($rs as $row) {
$row['photo'] = '/img/events.jpg';
        if (!empty($row['redirect'])) {
            $row['href'] = $row['redirect'];
            // $row['blank'] = ' rel="external"';
        } elseif (!empty($row['news_name'])) {
            $row['href'] = '/events/'.$row['news_name'];
        } else {
            $row['href'] = '/events/'.$row['id'];
        }
        if (!empty($row['content'])) {
            // $pattern = '/rel="photo\\[pp_gal\\]" href="(.*)">/';
            $pattern = '/<a class="frame".*>\s.*?<img.*?\s?.*?src=\"(.*?)\"/';
            if (preg_match($pattern, $row['content'], $matches)) {
                if (substr($matches[1], 0, 23) === 'https://www.ares.com.tw') {
                    $row['photo'] = $matches[1];
                } else if (substr($matches[1], 0, 22) === 'http://www.ares.com.tw') {
                    $row['photo'] = $matches[1];
                } else {
                    $row['photo'] = 'https://www.ares.com.tw'.$matches[1];
                }
            }

            $lead = mb_substr($row['content'], mb_strpos($row['content'], '<p>')+3);
            if (mb_substr($lead, 0, 8) === '<strong>') {
                $lead = mb_substr($lead, mb_strpos($lead, '<p>')+3);
            }
            $row['lead'] = strip_tags(mb_substr(trim(mb_strstr($lead, '</p>', true)), 0, 100,'UTF-8')).'...';
        }else{
            $row['lead'] = $row['title'];
        }
        if (!empty($row['redirect'])){
            if(strpos($row['href'], 'ares.com.tw')){
                $meta_content = @get_meta_tags($row['href']);
                if(!empty($meta_content['description'])){
                    $row['lead'] = mb_substr(trim($meta_content['description']), 0, 100,'UTF-8').'...';
                }

                $row['html'] = @file_get_contents($row['href']);
                $row['url'] = @parse_url($row['href']);
                $pattern = '/data-src="(.*)"/';
                // $row['imgx'] = $row['url']['scheme'].'://'.$row['url']['host'].$row['url']['path'];
                if (preg_match($pattern, $row['html'], $matches)) {
                    if (substr($matches[1], 0, 5) === 'https') {
                        $row['photo'] = $matches[1];
                    }
                }
            }
        }
  $arr = array(
    'title' => strip_tags($row['title']),
    'photo' => $row['photo'],
    'date' => $row['date'],
    'href' => $row['href'],
    'description' => strip_tags($row['lead'])
  );
  array_push($data, $arr);

}
$db=null;
$rs=null;
echo json_encode($data);
?>