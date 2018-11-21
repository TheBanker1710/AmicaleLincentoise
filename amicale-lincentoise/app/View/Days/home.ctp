<?= $this->assign('title' , 'Accueil'); ?>
<div class="container" id="home">
	<?php echo $this->Session->flash(); ?>
	<h1><i class="fa fa-home" aria-hidden="true"></i> <?= $this->fetch('title'); ?></h1>
	<h2>Saison <?php if(empty($days)){ echo "2018 - 2019"; }else{echo $days[0]['Season']['years'];} ?></h2>	
	<hr>
	<h3>Résultats de la dernière journée</h3>	
	  <div class="table">
	    <table class="table-result-item">			         
	    	<?php	    		
	      		if(empty($lastDay)){
	    	?>
				<thead>
				 	<tr>
				 		<td colspan="5">Il n'y a pas de matchs à afficher.</td>
				 	</tr>
				</thead>
			<?php	
	      		}else{
	      			?>
				<thead>
					<tr>				 		
				 		<td colspan="5" class="last-day-head">Journée <?php echo $lastDay['Day']['number']; ?> - <?php echo date_format(new \DateTime($lastDay['Day']['date']),"d/m/Y"); ?></td>	
				 	</tr>				 	
				</thead>
	      	<?php
		        	foreach ($lastDay['Game'] as $v) {
		        	if(empty($v['Team1']) && empty($v['Team2'])){
		        		/* SI PAS DE MATHCS */
		        	}else{
	      ?>
	      <tbody>
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
	    	}
	      ?>
	      </tbody>
	    </table>
	  </div>
	  <?php
	  	if(!empty($lastDay)){
          if($this->Session->read('Auth.User.role') == "admin"){ //&& $value['Day']['status_save'] != TRUE
          ?>
          <a class="button tiny" href="<?php echo $this->Html->url(array(
                "controller" => "days",
                "action" => "updateday",
                "id" => $lastDay['Day']['id']
            )); ?>">
            <i class="fa fa-edit"></i> Modifier</a>
          <a class="button tiny" href="<?php echo $this->Html->url(array(
                "controller" => "days",
                "action" => "setresultsperday",
                "id" => $lastDay['Day']['id']
            )); ?>">
            <i class="fa fa-plus"></i> Ajouter les scores
          </a>
          <?php
          }
      	}	
        ?>      
  	<hr>
	<h3>Prochaine journée</h3>	
	  <div class="table">
	    <table class="table-result-item">      
	    	<?php	    		
	      		if(empty($nextDay)){
	      	?>
				 <thead>
				 	<tr>
				 		<td colspan="5">Il n'y a pas de matchs à afficher.</td>
				 	</tr>
				 </thead>
			<?php	
	      		}else{
	      	?>
				<thead>
					<tr>				 		
				 		<td colspan="5" class="next-day-head">Journée <?php echo $nextDay['Day']['number']; ?> - <?php echo date_format(new \DateTime($nextDay['Day']['date']),"d/m/Y"); ?></td>		
				 	</tr>
				 	
				</thead>
	      	<?php
		        	foreach ($nextDay['Game'] as $v) {

		        	if(empty($v['Team1']) && empty($v['Team2'])){
		        		/* SI PAS DE MATHCS */
		        	}else{
	      ?>	      
	      <tbody>	      
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
	    	}
	      ?>
	      </tbody>
	    </table>
	  </div>
	  <?php
	  	if(empty(!$nextDay)){
          if($this->Session->read('Auth.User.role') == "admin"){ //&& $value['Day']['status_save'] != TRUE
          ?>
          <a class="button tiny" href="<?php echo $this->Html->url(array(
                "controller" => "days",
                "action" => "updateday",
                "id" => $nextDay['Day']['id']
            )); ?>">
            <i class="fa fa-edit"></i> Modifier</a>
          <a class="button tiny" href="<?php echo $this->Html->url(array(
                "controller" => "days",
                "action" => "setresultsperday",
                "id" => $nextDay['Day']['id']
            )); ?>">
            <i class="fa fa-plus"></i> Ajouter les scores
          </a>
          <?php
          }
      	}
        ?>     
  	<hr>
</div>
<?php
	//debug($days);

	/*$dt = new DateTime();
	echo $dt->format('Y-m-d');
	$d = explode("-",$dt->format('Y-m-d'));
	echo "<br/>".$d[0]."<br/>";
	echo $d[1]."<br/>";
	echo $d[2]."<br/>";

	debug($nextDay);*/
	//$t = time();
	//echo $t;
?>