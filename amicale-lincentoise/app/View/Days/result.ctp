<div>
  <div class="slider-nav-custom">
  <?php
    if(!$prev){
  ?>

  <?php
    }else{
  ?>
    <span class="prev-slide nav-slide" title="Journée précédente - <?php echo date_format(new \DateTime($prevResult['Day']['date']),"d/m/Y"); ?>" data-id-day="<?php echo $prevResult['Day']['id']; ?>"><span class="ifa left"><i class="fa fa-chevron-left" aria-hidden="true"></i></span><span class="ifa-text left">Journée <?php echo $prevResult['Day']['number']; ?></span></span>
  <?php
    }
  ?> 
  <?php
    if(!$next){
  ?>
  
  <?php
    }else{
  ?>
     <span class="next-slide nav-slide" title="Journée suivante - <?php echo date_format(new \DateTime($nextResult['Day']['date']),"d/m/Y"); ?>" data-id-day="<?php echo $nextResult['Day']['id']; ?>" ><span class="ifa right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span><span class="ifa-text right">Journée <?php echo $nextResult['Day']['id']; ?></span></span>
  <?php
    }
  ?>        
  </div>
</div>
<div class="day-result" id="day_<?php echo $result['Day']['id']; ?>">           
  <div class="table">
    <table class="table-result-item">
      <thead>
        <tr>
          <td colspan="5" class="last-day-head">Journée <?php echo $result['Day']['number']; ?> - <?php echo date_format(new \DateTime($result['Day']['date']),"d/m/Y"); ?></td>
        </tr>
      </thead>               
      <tbody>
      <?php
        foreach ($result['Game'] as $v) {
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
         <td class="game-score">
          <strong>
            <?php 
            if($v['statut'] == 4){
              echo "<strong>Bye</strong>";
            }else{
              echo $v['score_team_home']."</strong> - <strong>".$v['score_team_away'];
            }
            ?>
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
        "id" => $result['Day']['id']
    )); ?>">
    <i class="fa fa-edit"></i> Modifier</a>
  <a class="button tiny" href="<?php echo $this->Html->url(array(
        "controller" => "days",
        "action" => "setresultsperday",
        "id" => $result['Day']['id']
    )); ?>">
    <i class="fa fa-plus"></i> Ajouter les scores
  </a>
  <?php
  }
?>      

<?php
  //debug($day);
?>