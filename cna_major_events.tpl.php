<?php //print "<div class='scheduleInfoArr' style='display:none'><pre>";print_r($scheduleInfo);echo "</pre></div>"; ?>
<?php global $base_url;$imgPath = drupal_get_path('module', 'cna_major_events');$noSchedule = TRUE; ?>
<?php if(isset($scheduleInfo['eventTitle'])){ ?>
  <div class="row">
    <div class="large-12">
      <div class="page-head-desc">
        <h1><?php print $scheduleInfo['eventTitle']; ?></h1>
        <ul>
          <li><a href="<?php print $base_url; ?>/conference-pricing">PRICING</a></li>
          <li><a href="<?php print $base_url; ?>/sponsors-and-exhibitors">SPONSORS &amp; EXHIBITORS</a></li>
          <li class="active"><a href="#">SCHEDULE</a></li>
        </ul>
      </div>
    </div>
  </div>
<?php } ?>

<?php 
if(isset($scheduleInfo['no_result'])){
  print '<div class="row"><div class="large-12"><h1>'.$scheduleInfo['no_result'].'</h1></div></div>';
}else{ 
  $day = date('l d, M', strtotime($scheduleInfo['day']));
  ?>
  <div class="row">
    <div class="large-12">
      <ul class="session-tags">
        <li class="beginner"> Beginner </li>
        <li class="intermediate"> Intermediate </li>
        <li class="advanced"> Advanced </li>
      </ul>
    </div>
  </div>
  <div class="session-date">
    <div class="row">
      <div class="large-12">
        <h2>
          <?php if(isset($scheduleInfo['previousday'])){
            ?>
            <span class="prev-date"><a href="<?php print $scheduleInfo['previousday']; ?>"><img src="/<?php print $imgPath ?>/images/right-tri.png"><img class="hover-img" src="/<?php print $imgPath ?>/images/right-yellow.png"> previous day </a></span>
            <?php   
          } ?>
          
          DAY <?php print $scheduleInfo['dayCounter']; ?> | <text> <?php print $day; ?> </text> 
          <?php if(isset($scheduleInfo['nextday'])){ ?>
                  <span class="next-date"><a href="<?php print $scheduleInfo['nextday']; ?>">next day <img src="/<?php print $imgPath ?>/images/right-tri.png"><img class="hover-img" src="/<?php print $imgPath ?>/images/right-yellow.png"></a></span></h2>  
          <?php } ?>      
      </div>
    </div>
  </div>
  <?php 
  if(isset($scheduleInfo['timeslot'])){
    foreach ($scheduleInfo['timeslot'] as $timekey => $timeval) {
      //echo "<pre>";print_r($scheduleInfo['sessions'][$timeval['id']]);echo "</pre>";

      //print timeslot description if it doesn't contain any sessions
      if(isset($scheduleInfo['sessions'][$timeval['id']])){
        $noSchedule = FALSE;
      ?>
       <div class="single-timeslot">
          <div class="session-table">
            <div class="timeslot-title">
              <div class="timeslot-title-in"><h4>SESSION <?php print $timeval['slotCounter']; ?> <span><?php print $timeval['start_time']; ?> to <?php print $timeval['end_time']; ?></span></h4></div>
            </div>
            <div class="table-scroll">
              <table>
                <?php 
                if(isset($scheduleInfo['track'])){?>
                  <thead>
                    <tr class="session-tracks">
                  <?php 
                  foreach ($scheduleInfo['track'] as $trackey => $trackval) {
                    print '<th width="153">'.$trackval['track_name'].'</th>';
                  }
                  ?>
                    </tr>
                  </thead>
                  <?php 
                } ?>              
                  
                <tbody>
                  <?php
                    print '<tr>';
                    $session_i = 0;
                      foreach ($scheduleInfo['track'] as $trackey => $trackval) {
                        print '<td width="153">';
                        if(isset($scheduleInfo['sessions'][$timeval['id']][$trackval['id']])){
                          if(isset($scheduleInfo['sessions'][$timeval['id']][$trackval['id']])){
                            foreach ($scheduleInfo['sessions'][$timeval['id']][$trackval['id']] as $sessionkey => $sessionval) {
                              if(isset($sessionval['id'])){
                                ?>
                                <a href="javascript:;" class="session-card fancybox" data="<?php print 'sch_'.$trackval['id'].'_'.$timeval['id'].'_'.$sessionval['id']; ?>" rel="group">
                                  <div class="card-info">
                                    <h5>
                                      <?php if(strlen($sessionval['title']) > 60):print substr($sessionval['title'], 0 , 60).'...'; else : print $sessionval['title'];endif; ?>
                                    </h5>
                                    <?php if(isset($sessionval['session_speaker'])){
                                      // conditions to display speaker only in 2 lines
                                      foreach ($sessionval['session_speaker'] as $key => $value) {
                                        if(count($sessionval['session_speaker']) > 1){
                                          // if more than one speakers
                                          if(strlen($value) >= 17 && $key == 0){
                                            print '<p>'.substr($value, 0 , 17).'...</p>'; 
                                            break; // if first speaker name is long string, then break the loop
                                          }elseif(strlen($value) > 13 && strlen($value) < 17 && $key == 0){
                                            print '<p>'.$value.'</p>';
                                            break;
                                          }elseif(strlen($value) > 13 && $key == 1){
                                            print '<p>'.substr($value, 0 , 13).'...</p>';
                                          }elseif(strlen($value) <= 13){
                                            print '<p>'.$value.'</p>'; 
                                          }else{
                                            print '<p>'.$value.'</p>';
                                          }

                                          if($key == 1){
                                            break;
                                          }
                                        }else{
                                          // if only one speaker
                                          if(strlen($value) > 17){
                                            print '<p>'.substr($value, 0 , 17).'...</p>'; 
                                          }else{
                                            print '<p>'.$value.'</p>'; 
                                          }
                                        }
                                      }
                                    } ?>
                                    
                                  </div>
                                  <?php if(isset($sessionval['session_tag'])){?>
                                      <span class="<?php print $sessionval['session_tag']; ?>"><?php print $sessionval['session_tag']; ?></span>
                                    <?php } ?>  
                                </a>
                                 <!-- Session Fancybox starts here -->
                                  <div id="<?php print 'sch_'.$trackval['id'].'_'.$timeval['id'].'_'.$sessionval['id']; ?>" class="card-detail-popup" style="display:none;">
                                    <h3>DAY 1 | <span><?php print $day; ?> | <?php print $timeval['start_time']; ?> to <?php print $timeval['end_time']; ?></span></h3>
                                    <h4><?php print $sessionval['title']; ?></h4>
                                    <?php if(isset($sessionval['session_speaker'])){
                                      foreach ($sessionval['session_speaker'] as $key => $value) {
                                        print '<h4 class="speaker">'.$value.'</h4>';    
                                      }
                                    } ?>
                                    <?php if(isset($sessionval['session_description'])){
                                      print '<p>'.$sessionval['session_description'].'</p>';
                                    } ?>  
                                  <button class="float-right purple-btn intermediate" data-fancybox-close="" title="close">close</button>
                                </div>
                                  <!-- Session Fancybox ends here -->
                                <?php 
                              }
                            }
                          }
                        }
                        print '</td>';
                      }
                    print '</tr>';
                    
                   ?>
                 
                </tbody>
              </table>
            </div>
          </div>
       </div>
    
      <?php
      }elseif(isset($timeval['timeslot_description']) && $timeval['timeslot_description'] != ""){ // print the Timeslot table
        $noSchedule = FALSE;
        //if(isset($timeval['timeslot_description']) && $timeval['timeslot_description'] != ""){ 
        $timeslot_content = $timeval['timeslot_description'];
        //}else{
        //   No result 
        //   $timeslot_content = 'No Session has been scheduled for current Timeslot';
        // }
        if(isset($timeslot_content)){ ?>
          <div class="session-time yellow-bg">
            <table class="mb-block">
              <thead>
                <tr>
                  <th width="200"><?php print $timeval['start_time']; ?> to <?php print $timeval['end_time']; ?></th>
                  <?php if(isset($timeslot_content)){
                    ?>
                      <th><h3><?php print $timeslot_content; ?><h3></th>
                    <?php 
                  } ?>
                </tr>
              </thead>
            </table>
          </div>
          <?php 
        }
      }
    }
  }

  if($noSchedule){
    print '<div class="row"><div class="large-12"><h1>Sorry, No Session is Scheduled for this Day</h1></div></div>';
  }
  ?>
  <div class="session-date">
    <div class="row">
      <div class="large-12">
        <h2>
          <?php if(isset($scheduleInfo['previousday'])){
            ?>
            <span class="prev-date"><a href="<?php print $scheduleInfo['previousday']; ?>"><img src="/<?php print $imgPath ?>/images/right-tri.png"><img class="hover-img" src="/<?php print $imgPath ?>/images/right-yellow.png"> previous day </a></span>
            <?php   
          } ?>
          
          DAY <?php print $scheduleInfo['dayCounter']; ?> | <text> <?php print $day; ?> </text> 
          <?php if(isset($scheduleInfo['nextday'])){ ?>
                  <span class="next-date"><a href="<?php print $scheduleInfo['nextday']; ?>">next day <img src="/<?php print $imgPath ?>/images/right-tri.png"><img class="hover-img" src="/<?php print $imgPath ?>/images/right-yellow.png"></a></span></h2>  
          <?php } ?>      
      </div>
    </div>
  </div>
  <?php
}
?>

  
