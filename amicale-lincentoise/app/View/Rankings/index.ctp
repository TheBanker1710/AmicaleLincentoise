<?= $this->assign('title' , 'Classements D1'); ?>
<div class="container" id="ranking">
  <h1><i class="fa fa-list-ol"></i> <?= $this->fetch('title'); ?></h1>
  <hr>
  <h2>Phase classique</h2>
  <div class="table">
    <table>
      <thead>
        <tr>
          <th>Pos.</th>
          <th>Logo</th>          
          <th>Équipe</th>
          <th>Pts</th>
          <th>#</th>
          <th>G</th>
          <th>N</th>
          <th>P</th>
          <th>BP</th>
          <th>BC</th>
          <th>Diff.</th>          
        </tr>
      </thead>
      <tbody>
      <?php      
      if(empty($rankings)){
      ?>
      <tr><td colspan="11">Il n'y aucun classement à afficher.</td></tr>
      <?php
      }else{
      $cpt = 1;
      foreach ($rankings as $key => $value) {
      ?>
        <tr>
          <td><?php echo $cpt; ?></td>
          <td class="logo">
            <a href="<?php echo $this->Html->url(array(
                    "controller" => "teams",
                    "action" => "team",
                    "id" => $value["Team"]["id"],
                    "slug" => $value["Team"]["slug"]
                )); ?>" title="Informations">
                  <?php
                  echo $this->Html->image($value['Team']['logo_mini'], array('alt' => $value['Team']['name']));
                ?>
            </a>
          </td>
          <td class="name">
            <strong>              
               <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $value["Team"]["id"],
                  "slug" => $value["Team"]["slug"]
              )); ?>" title="Informations">
              <?php echo $value['Team']['name']; ?>
              </a>              
            </strong>
          </td>
          <td><strong><?php echo $value['Ranking']['points']; ?></strong></td>
          <td><?php echo $value['Ranking']['played']; ?></td>
          <td><?php echo $value['Ranking']['win']; ?></td>
          <td><?php echo $value['Ranking']['draw']; ?></td>
          <td><?php echo $value['Ranking']['lost']; ?></td>
          <td><?php echo $value['Ranking']['goal_done']; ?></td>
          <td><?php echo $value['Ranking']['goal_against']; ?></td>
          <td><?php echo $value['Ranking']['goal_difference']; ?></td>          
        </tr>
      <?php
          $cpt+=1;
        }
      }
      ?>
      <tbody>
    </table>
  </div>
  <?php 
    if(empty($rankings) || ($rankings[0]['Ranking']['played'] == 0 && $rankings[1]['Ranking']['played'] == 0)){

    }else{
    ?> 
  <hr>
  <h2><i class="fa fa-line-chart"></i> Statistiques</h2>
  <div class="stats">
    <div class="large-12 columns">
      <h3><i class="fa fa-futbol-o"></i> Attaque</h3>
      <div class="large-6 columns stats-case">
        <div class="green"><i class="fa fa-thumbs-o-up"></i> Meilleure</div>  
        <div>
          <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $bestAttack['Team']["id"],
                  "slug" => $bestAttack['Team']["slug"]
              )); ?>" title="Informations">
                <?php
                echo $this->Html->image($bestAttack['Team']['logo'], array('alt' => $bestAttack['Team']['name']));
              ?>
            </a>
        </div>
        <div>
          <strong>
            <a href="<?php echo $this->Html->url(array(
                "controller" => "teams",
                "action" => "team",
                "id" => $bestAttack['Team']["id"],
                "slug" => $bestAttack['Team']["slug"]
            )); ?>" title="Informations">
            <?php echo $bestAttack['Team']['name']; ?>
            </a>
          </strong>
        </div>
        <div>          
          <?php 
          if($bestAttack['Ranking']['played'] != 0){
            if($bestAttack['Ranking']['goal_done'] <= 1){
            ?>  
              <strong><?php echo $bestAttack['Ranking']['goal_done']; ?></strong> but marqué.
            <?php
            }else{
            ?>
              <strong><?php echo $bestAttack['Ranking']['goal_done']; ?></strong> buts marqués.
            <?php
            }
          }
          ?>
        </div>
        <div>
          <?php 
          if($bestAttack['Ranking']['played'] != 0){
            if(floor($bestAttack['Ranking']['goal_done']/$bestAttack['Ranking']['played']) <= 1){
            ?>  
              <strong><?php echo(floor($bestAttack['Ranking']['goal_done']/$bestAttack['Ranking']['played'])); ?></strong> but/match.
            <?php
            }else{
            ?>
              <strong><?php echo(floor($bestAttack['Ranking']['goal_done']/$bestAttack['Ranking']['played'])); ?></strong> buts/match.
            <?php
            }
          }
          ?>          
        </div>
      </div>
      <div class="large-6 columns stats-case">   
        <div class="red"><i class="fa fa-thumbs-o-down"></i> Plus mauvaise</div> 
        <div>
          <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $worstAttack['Team']["id"],
                  "slug" => $worstAttack['Team']["slug"]
              )); ?>" title="Informations">
                <?php
                echo $this->Html->image($worstAttack['Team']['logo'], array('alt' => $worstAttack['Team']['name']));
              ?>
            </a>
        </div>
        <div>
          <strong>
            <a href="<?php echo $this->Html->url(array(
                "controller" => "teams",
                "action" => "team",
                "id" => $worstAttack['Team']["id"],
                "slug" => $worstAttack['Team']["slug"]
            )); ?>" title="Informations">
            <?php echo $worstAttack['Team']['name']; ?>
            </a>
          </strong>
        </div>
        <div>          
          <?php 
          if($worstAttack['Ranking']['played'] != 0){
            if($worstAttack['Ranking']['goal_done'] <= 1){
            ?>  
              <strong><?php echo $worstAttack['Ranking']['goal_done']; ?></strong> but marqué.
            <?php
            }else{
            ?>
              <strong><?php echo $worstAttack['Ranking']['goal_done']; ?></strong> buts marqués.
            <?php
            }
          }
          ?>
        </div>
        <div>
          <?php 
          if($worstAttack['Ranking']['played'] != 0){
            if(floor($worstAttack['Ranking']['goal_done']/$bestAttack['Ranking']['played']) <= 1){
            ?>  
              <strong><?php echo(floor($worstAttack['Ranking']['goal_done']/$worstAttack['Ranking']['played'])); ?></strong> but/match.
            <?php
            }else{
            ?>
              <strong><?php echo(floor($worstAttack['Ranking']['goal_done']/$worstAttack['Ranking']['played'])); ?></strong> buts/match.
            <?php
            }
          }
          ?>          
        </div>
      </div>
    </div>
    <div class="large-12 columns">
      <h3><i class="fa fa-hand-paper-o"></i> Défense</h3>
      <div class="large-6 columns stats-case">   
        <div  class="green"><i class="fa fa-thumbs-o-up"></i> Meilleure</div>
        <div>
          <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $bestDefense['Team']["id"],
                  "slug" => $bestDefense['Team']["slug"]
              )); ?>" title="Informations">
                <?php
                echo $this->Html->image($bestDefense['Team']['logo'], array('alt' => $bestDefense['Team']['name']));
              ?>
            </a>
        </div>
        <div>
          <strong>
            <a href="<?php echo $this->Html->url(array(
                "controller" => "teams",
                "action" => "team",
                "id" => $bestDefense['Team']["id"],
                "slug" => $bestDefense['Team']["slug"]
            )); ?>" title="Informations">
            <?php echo $bestDefense['Team']['name']; ?>
            </a>
          </strong>
        </div>
        <div>          
          <?php
          if($bestDefense['Ranking']['played'] != 0){
            if($bestDefense['Ranking']['goal_done'] <= 1){
            ?>  
              <strong><?php echo $bestDefense['Ranking']['goal_against']; ?></strong> but encaissé.
            <?php
            }else{
            ?>
              <strong><?php echo $bestDefense['Ranking']['goal_against']; ?></strong> buts encaissés.
            <?php
            }
          }
          ?>
        </div>
        <div>
          <?php 
          if($bestDefense['Ranking']['played'] != 0){
            if(floor($bestDefense['Ranking']['goal_against']/$bestDefense['Ranking']['played']) <= 1){
            ?>  
              <strong><?php echo(floor($bestDefense['Ranking']['goal_against']/$bestDefense['Ranking']['played'])); ?></strong> but/match.
            <?php
            }else{
            ?>
              <strong><?php echo(floor($bestDefense['Ranking']['goal_against']/$bestDefense['Ranking']['played'])); ?></strong> buts/match.
            <?php
            }
          }
          ?>          
        </div>
      </div>
      <div class="large-6 columns stats-case">  
        <div class="red"><i class="fa fa-thumbs-o-down"></i> Plus mauvaise</div>  
        <div>
          <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $worstDefense['Team']["id"],
                  "slug" => $worstDefense['Team']["slug"]
              )); ?>" title="Informations">
                <?php
                echo $this->Html->image($worstDefense['Team']['logo'], array('alt' => $worstDefense['Team']['name']));
              ?>
            </a>
        </div>
        <div>
          <strong>
            <a href="<?php echo $this->Html->url(array(
                "controller" => "teams",
                "action" => "team",
                "id" => $worstDefense['Team']["id"],
                "slug" => $worstDefense['Team']["slug"]
            )); ?>" title="Informations">
            <?php echo $worstDefense['Team']['name']; ?>
            </a>
          </strong>
        </div>
        <div>          
          <?php 
          if($worstDefense['Ranking']['played'] != 0){
            if($worstDefense['Ranking']['goal_done'] <= 1){
            ?>  
              <strong><?php echo $worstDefense['Ranking']['goal_against']; ?></strong> but encaissé.
            <?php
            }else{
            ?>
              <strong><?php echo $worstDefense['Ranking']['goal_against']; ?></strong> buts encaissés.
            <?php
            }
          }
          ?>
        </div>
        <div>
          <?php 
          if($worstDefense['Ranking']['played'] != 0){
            if(floor($worstDefense['Ranking']['goal_against']/$worstDefense['Ranking']['played']) <= 1){
            ?>  
              <strong><?php echo(floor($worstDefense['Ranking']['goal_against']/$worstDefense['Ranking']['played'])); ?></strong> but/match.
            <?php
            }else{
            ?>
              <strong><?php echo(floor($worstDefense['Ranking']['goal_against']/$worstDefense['Ranking']['played'])); ?></strong> buts/match.
            <?php
            }
          }
          ?>          
        </div>
      </div>
    </div>
    <div class="large-12 columns">
      <h3><i class="fa fa-area-chart"></i> Autres</h3>
      <div class="large-4 columns stats-case">   
        <div  class="green"><i class="fa fa-arrow-up"></i> Plus de victoire(s)</div>
        <div>
          <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $bestVictory['Team']["id"],
                  "slug" => $bestVictory['Team']["slug"]
              )); ?>" title="Informations">
                <?php
                echo $this->Html->image($bestVictory['Team']['logo'], array('alt' => $bestVictory['Team']['name']));
              ?>
            </a>
        </div>
        <div>
          <strong>
            <a href="<?php echo $this->Html->url(array(
                "controller" => "teams",
                "action" => "team",
                "id" => $bestVictory['Team']["id"],
                "slug" => $bestVictory['Team']["slug"]
            )); ?>" title="Informations">
            <?php echo $bestVictory['Team']['name']; ?>
            </a>
          </strong>
        </div>
        <div>          
          <?php 
          if($bestVictory['Ranking']['goal_done'] <= 1){
          ?>  
            <strong><?php echo $bestVictory['Ranking']['win']; ?></strong> victoire.
          <?php
          }else{
          ?>
            <strong><?php echo $bestVictory['Ranking']['win']; ?></strong> victoires.
          <?php
          }
          ?>
        </div>       
      </div>
      <div class="large-4 columns stats-case">  
        <div class="orange"><i class="fa fa-arrows-h"></i> Plus de nul(s)</div>  
        <div>
          <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $bestDraw['Team']["id"],
                  "slug" => $bestDraw['Team']["slug"]
              )); ?>" title="Informations">
                <?php
                echo $this->Html->image($bestDraw['Team']['logo'], array('alt' => $bestDraw['Team']['name']));
              ?>
            </a>
        </div>
        <div>
          <strong>
            <a href="<?php echo $this->Html->url(array(
                "controller" => "teams",
                "action" => "team",
                "id" => $bestDraw['Team']["id"],
                "slug" => $bestDraw['Team']["slug"]
            )); ?>" title="Informations">
            <?php echo $bestDraw['Team']['name']; ?>
            </a>
          </strong>
        </div>
        <div>          
          <?php 
          if($bestDraw['Ranking']['goal_done'] <= 1){
          ?>  
            <strong><?php echo $bestDraw['Ranking']['draw']; ?></strong> nul.
          <?php
          }else{
          ?>
            <strong><?php echo $bestDraw['Ranking']['draw']; ?></strong> nuls.
          <?php
          }
          ?>
        </div>        
      </div>
      <div class="large-4 columns stats-case">  
        <div class="red"><i class="fa fa-arrow-down"></i> Plus de défaite(s)</div>  
        <div>
          <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $bestLost['Team']["id"],
                  "slug" => $bestLost['Team']["slug"]
              )); ?>" title="Informations">
                <?php
                echo $this->Html->image($bestLost['Team']['logo'], array('alt' => $bestLost['Team']['name']));
              ?>
            </a>
        </div>
        <div>
          <strong>
            <a href="<?php echo $this->Html->url(array(
                "controller" => "teams",
                "action" => "team",
                "id" => $bestLost['Team']["id"],
                "slug" => $bestLost['Team']["slug"]
            )); ?>" title="Informations">
            <?php echo $bestLost['Team']['name']; ?>
            </a>
          </strong>
        </div>
        <div>          
          <?php 
          if($bestLost['Ranking']['goal_done'] <= 1){
          ?>  
            <strong><?php echo $bestLost['Ranking']['lost']; ?></strong> défaite.
          <?php
          }else{
          ?>
            <strong><?php echo $bestLost['Ranking']['lost']; ?></strong> défaites.
          <?php
          }
          ?>
        </div>        
      </div>
    </div>
    <div class="large-12 columns">
      <h3><i class="fa fa-hand-rock-o" aria-hidden="true"></i> Plus large victoire</h3>
      <div><strong>Journée <?php echo $biggestVictory['Game']['id_day']; ?></strong></div>
      <div>
      <?php
        $jour = date_format(new \DateTime($biggestVictory['Game']['time']),"N"); 
                switch ($jour) {
                  case '1':
                    $date = "Lu ".date_format(new \DateTime($biggestVictory['Game']['time']),"d/m/Y à H:i");
                    break;
                  case '2':
                    $date = "Ma ".date_format(new \DateTime($biggestVictory['Game']['time']),"d/m/Y à H:i");
                    break;
                  case '3':
                    $date = "Me ".date_format(new \DateTime($biggestVictory['Game']['time']),"d/m/Y à H:i");
                    break;
                  case '4':
                    $date = "Je ".date_format(new \DateTime($biggestVictory['Game']['time']),"d/m/Y à H:i");
                    break;
                  case '5':
                    $date = "Ve ".date_format(new \DateTime($biggestVictory['Game']['time']),"d/m/Y à H:i");
                    break;
                  case '6':
                    $date = "Sa ".date_format(new \DateTime($biggestVictory['Game']['time']),"d/m/Y à H:i");
                    break;
                  case '4':
                    $date = "Di ".date_format(new \DateTime($biggestVictory['Game']['time']),"d/m/Y à H:i");
                    break;                  
                  default:                    
                    break;
                }  
                echo $date;        
      ?>
      </div>
      <div class="large-4 columns stats-case">
        <div>
          <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $biggestVictory['Team1']["id"],
                  "slug" => $biggestVictory['Team1']["slug"]
              )); ?>" title="Informations">
                <?php
                echo $this->Html->image($biggestVictory['Team1']['logo'], array('alt' => $biggestVictory['Team1']['name']));
              ?>
            </a>
          </div>
        <div>
          <strong>
            <a href="<?php echo $this->Html->url(array(
                "controller" => "teams",
                "action" => "team",
                "id" => $biggestVictory['Team1']["id"],
                "slug" => $biggestVictory['Team1']["slug"]
            )); ?>" title="Informations">
            <?php echo $biggestVictory['Team1']['name']; ?>
            </a>
          </strong>
        </div>
      </div> 
      <div class="large-4 columns stats-case">        
          <div class="score-stats">
            <strong><?php echo $biggestVictory['Game']['score_team_home']; ?> - <?php echo $biggestVictory['Game']['score_team_away']; ?></strong>
          </div>        
      </div>  
      <div class="large-4 columns stats-case">
        <div>
          <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "team",
                  "id" => $biggestVictory['Team2']["id"],
                  "slug" => $biggestVictory['Team2']["slug"]
              )); ?>" title="Informations">
                <?php
                echo $this->Html->image($biggestVictory['Team2']['logo'], array('alt' => $biggestVictory['Team2']['name']));
              ?>
            </a>
          </div>
        <div>
          <strong>
            <a href="<?php echo $this->Html->url(array(
                "controller" => "teams",
                "action" => "team",
                "id" => $biggestVictory['Team2']["id"],
                "slug" => $biggestVictory['Team2']["slug"]
            )); ?>" title="Informations">
            <?php echo $biggestVictory['Team2']['name']; ?>
            </a>
          </strong>
        </div>
      </div>
    </div>
  </div>
  <?php
    }
  ?>
  
</div>

<?php

/*foreach ($playoff1 as $key => $value) {
  echo "<p>".$key."=>".$value."</p>";
}*/
//debug($playoff1);
//debug($rankings);
//debug($bestAttack);
//debug($worstAttack);
//debug($bestDefense);
//debug($worstDefense);
//debug($biggestVictory);
?>
