<?= $this->assign('title' , 'Calendrier D1'); ?>
<div class="container" id="days">
  <?php echo $this->Session->flash(); ?>
  <h1><i class="fa fa-list-ul" aria-hidden="true"></i> <?= $this->fetch('title'); ?></h1>
  <p>Saison <?php if(empty($days)){ echo "2018 - 2019"; }else{echo $days[0]['Season']['years'];} ?></p>
    <form class="selectDayCalendar">
    <label for="selectDaySlide">Choisissez une journée</label>
    <select id="selectDaySlide">    
      <?php
      $dayItem = 1;
      $daysSelect = $days;
      foreach ($daysSelect as $key => $value) {
      if($dayItem == 1){
      ?>
        <optgroup label="Premier tour">
        <option data-orbit-link="day-slide-<?php echo $value['Day']['id']; ?>" value="<?php echo $value['Day']['id']; ?>">Journée <?php echo $value['Day']['number']; ?> - <?php echo date_format(new \DateTime($value['Day']['date']),"d/m/Y"); ?></option>
      <?php
      }elseif($dayItem == 10){
      ?>
        </optgroup>
        <optgroup label="Deuxième tour">
        <option data-orbit-link="day-slide-<?php echo $value['Day']['id']; ?>" value="<?php echo $value['Day']['id']; ?>">Journée <?php echo $value['Day']['number']; ?> - <?php echo date_format(new \DateTime($value['Day']['date']),"d/m/Y"); ?></option>        
      <?php
      }elseif($dayItem == 19){
      ?>
        </optgroup>
        <optgroup label="Troisième tour">
        <option data-orbit-link="day-slide-<?php echo $value['Day']['id']; ?>" value="<?php echo $value['Day']['id']; ?>">Journée <?php echo $value['Day']['number']; ?> - <?php echo date_format(new \DateTime($value['Day']['date']),"d/m/Y"); ?></option> 
      <?php
      }elseif($dayItem == 28){
      ?>
        </optgroup>
        <optgroup label="Quatrième tour">         
        <option data-orbit-link="day-slide-<?php echo $value['Day']['id']; ?>" value="<?php echo $value['Day']['id']; ?>">Journée <?php echo $value['Day']['number']; ?> - <?php echo date_format(new \DateTime($value['Day']['date']),"d/m/Y"); ?></option>                
      <?php
      }else{
      ?>
        <option data-orbit-link="day-slide-<?php echo $value['Day']['id']; ?>" value="<?php echo $value['Day']['id']; ?>">Journée <?php echo $value['Day']['number']; ?> - <?php echo date_format(new \DateTime($value['Day']['date']),"d/m/Y"); ?></option>
      <?php
      }
      $dayItem += 1;      
      }
      ?>
      </optgroup>   
    </select>
  </form>
  <hr>  
  <?php
    if(!empty($days)){
  ?>
  <div class="slider-days">    
    <div class="day-container">
      <div>
        <div class="slider-nav-custom">
        <?php
          if(!$prev){
        ?>

        <?php
          }else{
        ?>
          <span class="prev-slide nav-slide" title="Journée précédente - <?php echo date_format(new \DateTime($prevDay['Day']['date']),"d/m/Y"); ?>" data-id-day="<?php echo $prevDay['Day']['id']; ?>"><span class="ifa left"><i class="fa fa-chevron-left" aria-hidden="true"></i></span><span class="ifa-text left">Journée <?php echo $prevDay['Day']['number']; ?></span></span>
        <?php
          }
        ?> 
        <?php
          if(!$next){
        ?>
        
        <?php
          }else{
        ?>
           <span class="next-slide nav-slide" title="Journée suivante - <?php echo date_format(new \DateTime($nextDay['Day']['date']),"d/m/Y"); ?>" data-id-day="<?php echo $nextDay['Day']['id']; ?>" ><span class="ifa right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span><span class="ifa-text right">Journée <?php echo $nextDay['Day']['id']; ?></span></span>
        <?php
          }
        ?>        
        </div>
      </div>
        <div class="day-result" id="day_<?php echo $days[0]['Day']['id']; ?>">           
          <div class="table">
            <table class="table-result-item">
              <thead>
                <tr>
                  <td colspan="5" class="last-day-head">Journée <?php echo $dayIndex['Day']['number']; ?> - <?php echo date_format(new \DateTime($dayIndex['Day']['date']),"d/m/Y"); ?></td>
                </tr>
              </thead>               
              <tbody>
              <?php
                foreach ($dayIndex['Game'] as $v) {
                  if(empty($v['Team1']) && empty($v['Team2'])){
                    /* SI PAS DE MATHCS */
                  }else{
              ?>
              <tr>
                <td colspan="5">
                <?php
                    if($v['statut'] == 1){
                      $jour = date_format(new \DateTime($v['time']),"N"); 
                      switch ($jour) {
                        case '1':
                          $date = "Lu ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '2':
                          $date = "Ma ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '3':
                          $date = "Me ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '4':
                          $date = "Je ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '5':
                          $date = "Ve ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '6':
                          $date = "Sa ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '7':
                          $date = "Di ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;                  
                        default:                    
                          break;
                      }        
                      echo "<strong class='green'>Reporté (".$date.")</strong>";
                    }elseif($v['statut'] == 2){
                      echo "<strong>Forfait</strong>";
                    }elseif($v['statut'] == 3){
                      echo "<strong class='orange'><i class='fa hourglass fa-hourglass-start'></i>En attente de report</strong>";
                    }elseif($v['statut'] == 4){
                      echo " ";
                    }else{
                      $jour = date_format(new \DateTime($v['time']),"N"); 
                      switch ($jour) {
                        case '1':
                          $date = "Lu ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '2':
                          $date = "Ma ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '3':
                          $date = "Me ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '4':
                          $date = "Je ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '5':
                          $date = "Ve ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '6':
                          $date = "Sa ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;
                        case '7':
                          $date = "Di ".date_format(new \DateTime($v['time']),"d/m/Y à H:i");
                          break;                  
                        default:                    
                          break;
                      }               
                      echo $date;
                    }
                ?>
                </td>
              </tr>
              <tr class="raw-result">
               <td class="logo">
               <?php
                    if(empty($v['Team1'])){
                      echo ' ';
                    }else{
                      ?>
                      <a href="<?php echo $this->Html->url(array(
                          "controller" => "teams",
                          "action" => "team",
                          "id" => $v["Team1"]["id"],
                          "slug" => $v["Team1"]["slug"]
                      )); ?>" title="Informations">
                        <?php
                        echo $this->Html->image($v['Team1']['logo_mini'], array('alt' => $v['Team1']['name']));
                      ?>
                    </a>
            <?php 
                  }
                ?>        
               </td>
               <td class="name-team">
                  <?php
                    if(empty($v['Team1'])){
                      echo ' ';
                    }else{
                  ?>
                    <a href="<?php echo $this->Html->url(array(
                        "controller" => "teams",
                        "action" => "team",
                        "id" => $v["Team1"]["id"],
                        "slug" => $v["Team1"]["slug"]
                    )); ?>" title="Informations">
                    <?php echo $v['Team1']['name']; ?>
                    </a>
                  <?php 
                    }               
                  ?>
                </td>
                <td class="game-time">
                  <strong><?php if($v['score_team_home'] != null && $v['score_team_away'] != null){
                    echo $v['score_team_home']."</strong> - <strong>".$v['score_team_away'];
                  }elseif($v['statut'] == 4){
                    echo "<strong>Bye</strong>";  
                  }else{
                    echo date_format(new \DateTime($v['time']),"H:i");
                  } ?>
                    
                  </strong>
                </td>
                <td class="name-team">
                  <?php
                    if(empty($v['Team2'])){
                      echo ' ';
                    }else{
                  ?>
                    <a href="<?php echo $this->Html->url(array(
                        "controller" => "teams",
                        "action" => "team",
                        "id" => $v["Team2"]["id"],
                        "slug" => $v["Team2"]["slug"]
                    )); ?>" title="Informations">
                    <?php echo $v['Team2']['name']; ?>
                    </a>
                  <?php 
                    }               
                  ?>
                </td>
                <td class="logo">
                  <?php
                      if(empty($v['Team2'])){
                        echo ' ';
                      }else{
                      ?>
                    <a href="<?php echo $this->Html->url(array(
                            "controller" => "teams",
                            "action" => "team",
                            "id" => $v["Team2"]["id"],
                            "slug" => $v["Team2"]["slug"]
                        )); ?>" title="Informations">
                        <?php
                        echo $this->Html->image($v['Team2']['logo_mini'], array('alt' => $v['Team2']['name']));
                      ?>              
                    </a>
                  <?php
                    }
                  ?>   
                </td>                 
              </tr>
              <?php
                  }
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php
          if($this->Session->read('Auth.User.role') == "admin"){ //&& $value['Day']['status_save'] != TRUE
          ?>
          <a class="button tiny" href="<?php echo $this->Html->url(array(
                "controller" => "days",
                "action" => "updateday",
                "id" => $dayIndex['Day']['id']
            )); ?>">
            <i class="fa fa-edit"></i> Modifier</a>
          <a class="button tiny" href="<?php echo $this->Html->url(array(
                "controller" => "days",
                "action" => "setresultsperday",
                "id" => $dayIndex['Day']['id']
            )); ?>">
            <i class="fa fa-plus"></i> Ajouter les scores
          </a>
          <?php
          }
        ?>      
      </div>
    </div>  
    <?php
      }
    ?>   
</div>
<?php
/*foreach ($days as $value) {
  foreach ($value['Game'] as $v) {
    var_dump($v['time']);
  }
}*/
//debug($days);
?>
