<?php //print "<div class='scheduleInfoArr' style='display:none'><pre>";print_r($scheduleInfo);echo "</pre></div>"; ?>
<?php $imgPath = drupal_get_path('module', 'cna_major_events'); ?>
<div class="row">
  <div class="large-12">
    <ul class="session-tags">
      <li class="beginner"> Beginner </li>
      <li class="intermediate"> Intermediate </li>
      <li class="advanced"> Advanced </li>
    </ul>
  </div>
</div>
<?php 
if(isset($scheduleInfo)){ 
  $day = date('l d, M', strtotime($scheduleInfo['day']));
  ?>
  <div class="session-date">
    <div class="row">
      <div class="large-12">
        <h2>
          <?php if(isset($scheduleInfo['previousday'])){
            ?>
            <span class="prev-date"><a href="<?php print $scheduleInfo['previousday']; ?>"><img src="/<?php print $imgPath ?>/images/right-tri.png"> previous day </a></span>
            <?php   
          } ?>
          
          DAY <?php print $scheduleInfo['dayCounter']; ?> | <text> <?php print $day; ?> </text> 
          <?php if(isset($scheduleInfo['nextday'])){ ?>
                  <span class="next-date"><a href="<?php print $scheduleInfo['nextday']; ?>">next day <img src="/<?php print $imgPath ?>/images/right-tri.png"></a></span></h2>  
          <?php } ?>      
      </div>
    </div>
  </div>
  <?php 
  if(isset($scheduleInfo['timeslot'])){
    foreach ($scheduleInfo['timeslot'] as $timekey => $timeval) {
      ?>
      <div class="session-time yellow-bg">
        <table class="mb-block">
          <thead>
            <tr>
              <th width="200"><?php print $timeval['start_time']; ?> to <?php print $timeval['end_time']; ?></th>
              <?php if(isset($timeval['timeslot_description'])){
                ?>
                  <th><h3><?php print $timeval['timeslot_description']; ?><h3></th>
                <?php 
              } ?>
            </tr>
          </thead>
        </table>
      </div>

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
                    print '<th>'.$trackval['track_name'].'</th>';
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
                        print '<td>';
                        if(isset($scheduleInfo['sessions'][$trackval['id']])){
                          if(isset($scheduleInfo['sessions'][$trackval['id']][$timeval['id']])){
                            foreach ($scheduleInfo['sessions'][$trackval['id']][$timeval['id']] as $sessionkey => $sessionval) {
                              if(isset($sessionval['id'])){
                                ?>
                                <a href="javascript:;" class="session-card fancybox" data="<?php print 'sch_'.$trackval['id'].'_'.$timeval['id'].'_'.$sessionval['id']; ?>" rel="group">
                                  <div class="card-info">
                                    <h5><?php print $sessionval['title']; ?></h5>
                                    <?php if(isset($sessionval['session_speaker'])){
                                      foreach ($sessionval['session_speaker'] as $key => $value) {
                                        print '<p>'.$value.'</p>';    
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
    }
  }
  ?>
  <div class="session-date">
    <div class="row">
      <div class="large-12">
        <h2>
          <?php if(isset($scheduleInfo['previousday'])){
            ?>
            <span class="prev-date"><a href="<?php print $scheduleInfo['previousday']; ?>"><img src="/<?php print $imgPath ?>/images/right-tri.png"> previous day </a></span>
            <?php   
          } ?>
          
          DAY <?php print $scheduleInfo['dayCounter']; ?> | <text> <?php print $day; ?> </text> 
          <?php if(isset($scheduleInfo['nextday'])){ ?>
                  <span class="next-date"><a href="<?php print $scheduleInfo['nextday']; ?>">next day <img src="/<?php print $imgPath ?>/images/right-tri.png"></a></span></h2>  
          <?php } ?>      
      </div>
    </div>
  </div>
  <?php
}
?>

  