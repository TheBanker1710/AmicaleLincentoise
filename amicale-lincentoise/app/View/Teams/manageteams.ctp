<?= $this->assign('title' , 'Gestion des équipes en D1'); ?>
<div class="container" id="equipes">
  <h1><i class="fa fa-cog"></i> <?= $this->fetch('title'); ?></h1>
  <hr>
  <?php echo $this->Session->flash(); ?>
  <h2>Liste des équipes</h2>
  <div class="table">
    <table>
      <thead>
        <tr>
          <th width="60">#</th>
          <th width="60">Id</th>
          <th width="60"><strong>Logo</th>
          <th width="60"><strong>Nom</th>
          <th width="60"><strong>Division</th>
          <th width="60"><strong>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php      
      if(empty($teams)){
      ?>
        <tr><td colspan="5">Il n'y a pas d'équipes à afficher.</td></tr>
      <?php
      }
      else{
        $cpt=1;
      foreach ($teams as $key => $value) {
      ?>

        <tr>
          <td><?php echo $cpt; ?></td>
          <td><?php echo $value['Team']['id']; ?></td>
          <td><?php echo $this->Html->image($value['Team']['logo_mini'], array('alt' => $value['Team']['name']));?></td>
          <td>
            <strong>
              <a href="<?php echo $this->Html->url(array(
                    "controller" => "teams",
                    "action" => "information",
                    "id" =>$value["Team"]["id"],
                    "slug" =>$value["Team"]["slug"]
                )); ?>" title="Informations">
                <?php echo $value['Team']['name']; ?>
              </a>
            </strong>
          </td>
          <td><?php echo $value['Team']['id_division']; ?></td>
          <td>
            <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "information",
                  "id" =>$value["Team"]["id"],
                  "slug" =>$value["Team"]["slug"]
              )); ?>" title="Informations">
              <i class="fa fa-info-circle"></i>
            </a>
            <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "editteam",
                  "id" => $value["Team"]["id"],
                  "slug" => $value["Team"]["slug"]
              )); ?>" title="Modifier">
              <i class="fa fa-pencil-square-o"></i>
            </a>           
            <a href="<?php echo $this->Html->url(array(
                  "controller" => "teams",
                  "action" => "deleteteam",
                  "id" => $value["Team"]["id"],
                  "slug" => $value["Team"]["slug"]
              )); ?>" title="Supprimer" class="red">
              <i class="fa fa-times"></i>
            </a>
          </td>
        </tr>
      <?php
        $cpt++;
        }
      }
      ?>
      </tbody>
    </table> 
  </div>
  <?php
    if($this->Session->read('Auth.User.role') == "admin"){ //&& $value['Day']['status_save'] != TRUE
    ?>   
    <a class="button tiny" href="<?php echo $this->Html->url(array(
          "controller" => "teams",
          "action" => "addteam"          
      )); ?>">
      <i class="fa fa-plus"></i> Ajouter une équipe
    </a>
    <?php
    }
  ?>       
</div>
<?php
//debug($teams);
?>
